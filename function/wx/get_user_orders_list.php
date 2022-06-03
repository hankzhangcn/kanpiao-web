<?php

    include "../../component/header.php";
    include "../pub/conn.php";

    include "../pub/jwt.php";
    include "../pub/get_sub.php";

    // 取token，变成openid
    $token = $_GET['token'];
    $openid = get_sub($token);
    // 从数据库找user_id
    $sql = "select user_id from `wx_user` where `openid` = '$openid'";
    $res = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($res);
    $user_id = $row[0];
    // 从数据库找用户订单列表
    $sql = "select * from `orders` where `order_user_id` = '$user_id'";
    $res = mysqli_query($conn, $sql);
    $arr = array(); 
    while($row=mysqli_fetch_array($res))
    {
        // 实体化
        foreach ($row as $key => $value) {
            $row[$key] = htmlspecialchars_decode($value);
        }
        $count=count($row);
        for($i=0;$i<$count;$i++){ 
            unset($row[$i]);//删除冗余数据 
          } 
          array_push($arr,$row); 
    }
    echo json_encode($arr);
?>