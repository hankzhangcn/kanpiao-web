<?php
        include "../../component/header.php";
        include "../../component/conn.php";
        // include "../pub/jwt.php";
        include  "./token_to_openid.php";

        // 解码jwt
        $token = $_GET['token'];
        $openid = token_to_openid($token);

        //      选出当前账号下，最近一场session的order编号
        $sql = "select `order_session_id` from `order` where `order_user_id` = '".$openid."' and `order_status` = 0 order by `order_session_id` limit 1";
        $res = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($res);

        $order_session_id = $row["order_session_id"];
        // $order_session_id = 1;


        $sql = "select * from `show_item` where `show_id` = (select `show_id` from `show_session` where `session_id` = ".$order_session_id.")";
        $res = mysqli_query($conn, $sql);
        $arr = array(); 
        while($row=mysqli_fetch_array($res))
        {
            $count=count($row);
            for($i=0;$i<$count;$i++){ 
                unset($row[$i]);//删除冗余数据 
              } 
              array_push($arr,$row); 
        }
        // var_dump($arr);
        echo json_encode($arr);

        

        // 压入数组


?>