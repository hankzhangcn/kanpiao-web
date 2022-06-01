<?php
        include "../../component/header.php";
        include "../pub/conn.php";
        // include "../pub/jwt.php";
        include  "./token_to_openid.php";

        // 解码jwt
        $token = $_GET['token'];
        // $token = "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJrYW5waWFvIiwiaWF0IjoxNjUxNTgzMzIxLCJleHAiOjE2NTE1OTA1MjEsIm5iZiI6MTY1MTU4MzMyMSwic3ViIjoib3NmM3E1TWFILTY3Q3VIMTl5SVpvcmpUMmJ0RSIsImp0aSI6IjJhMzFlNzY3Mjg1MTZhM2IxNmUxM2NkOGU0Mzk5N2FmIn0.z914VubQRpgQ3CZ0FhdyKMIt73zaHgWZssGjy6bgApA";
        $openid = token_to_openid($token);
        // echo $openid;

        //      选出当前账号下，最近一场session的order编号
        //      select `order_id` from `orders` where `order_user_id` = '   openid  ' and `order_status` = 0 order by `order_session_id` limit 1;
        $sql = "select `order_id` from `orders` where `order_user_id` = '".$openid."' and `order_status` = 0 order by `order_session_id` limit 1";
        $res = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($res);

        $order_id = $row["order_id"];


        // qrcode有效期5分钟
        // 使用订单号作为验证，生成二维码
        $payload=array('iss'=>'kanpiao','iat'=>time(),'exp'=>time()+300,'nbf'=>time(),'sub'=>$order_id,'jti'=>md5(uniqid('JWT').time()));;
        echo "https://api.nbhao.org/v1/qrcode/make?text=".Jwt::getToken($payload);


?>