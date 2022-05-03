<?php
    include "../../component/header.php";
    include "../../component/conn.php";
    include "../pub/jwt.php";

    $appid = "yourappid";
    $secret = "yoursecret";
    $js_code = $_GET['code'];

    $url = "https://api.weixin.qq.com/sns/jscode2session?appid=".$appid."&secret=".$secret."&js_code=".$js_code."&grant_type=authorization_code";
    $str = file_get_contents($url);
    $json = json_decode($str);
    $arr = get_object_vars($json);
    $openid = $arr['openid']; //这是openid
    $session_key = $arr['session_key']; //这是session_key

    // 将openid存入数据库
    $sql = "select * from `wx_user` where `openid` = '".$openid."'";
    $res = mysqli_query($conn, $sql);
    // 是否存在该用户
    $number = mysqli_num_rows($res);
    if(!$number){
        // 不存在，建立用户行
        $sql = "insert into `wx_user`(openid) values('".$openid."')";
        $res = mysqli_query($conn, $sql);
    }
    // 存在，则更新其信息
    else{
        
    }

    // 写login表,新获取了token
    $sql = "insert into `login`(`platform`,`user_id`,`login_date`,`is_new_login`) values('0','".$openid."','".date("Y-m-d H:i:s")."',1)";
    $res = mysqli_query($conn, $sql);
    
    // 回调前端token
    $payload=array('iss'=>'kanpiao','iat'=>time(),'exp'=>time()+7200,'nbf'=>time(),'sub'=>$openid,'jti'=>md5(uniqid('JWT').time()));;
    $token=Jwt::getToken($payload);
    echo $token;


?>