<?php
        include "../../component/header.php";
        include "../pub/conn.php";
        
        include "../pub/jwt.php";
        include "../pub/get_sub.php";

        // 解码jwt
        $token = $_GET['token'];
        $order_id = $_GET['order_id'];
        if($token)
        {
                // $token = "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJrYW5waWFvIiwiaWF0IjoxNjUxNTgzMzIxLCJleHAiOjE2NTE1OTA1MjEsIm5iZiI6MTY1MTU4MzMyMSwic3ViIjoib3NmM3E1TWFILTY3Q3VIMTl5SVpvcmpUMmJ0RSIsImp0aSI6IjJhMzFlNzY3Mjg1MTZhM2IxNmUxM2NkOGU0Mzk5N2FmIn0.z914VubQRpgQ3CZ0FhdyKMIt73zaHgWZssGjy6bgApA";
                $openid = get_sub($token);


                $sql = "select `user_id` from `wx_user` where `openid` = '$openid'";
                $res = mysqli_query($conn, $sql);
                $row = mysqli_fetch_array($res);
                $user_id = $row["user_id"];


                // echo $openid;


                $sql = "select count(*) from `orders` where `order_user_id` = '".$user_id."' and `order_status` = 0";
                $res = mysqli_query($conn, $sql);
                $row = mysqli_fetch_array($res);
                if($row[0] == 0)
                        echo 0;
                else
                {

                        //      选出当前账号下，最近一场session的order编号
                        //      select `order_id` from `orders` where `order_user_id` = '   openid  ' and `order_status` = 0 order by `order_session_id` limit 1;
                        $sql = "select `order_id` from `orders` where `order_user_id` = '".$user_id."' and `order_status` = 0 order by `order_session_id` limit 1";
                        $res = mysqli_query($conn, $sql);
                        $row = mysqli_fetch_array($res);
                        
                        $order_id = $row["order_id"];
        }


        }
        

        // qrcode有效期5分钟
        // 使用订单号作为验证，生成二维码
        $payload=array('iss'=>'kanpiao','iat'=>time(),'exp'=>time()+300,'nbf'=>time(),'sub'=>$order_id,'jti'=>md5(uniqid('JWT').time()));;
        echo "https://api.nbhao.org/v1/qrcode/make?text=".$order_id;
        // Jwt::getToken($payload);
        

?>