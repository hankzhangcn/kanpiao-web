<?php
        include "../../component/header.php";
        include "../pub/conn.php";
        // include "../pub/jwt.php";
        include  "./token_to_openid.php";


        $token = $_GET['qrcode'];
        // $token = "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJrYW5waWFvIiwiaWF0IjoxNjUxNTg1ODU0LCJleHAiOjE2NTE1ODYxNTQsIm5iZiI6MTY1MTU4NTg1NCwic3ViIjoiMSIsImp0aSI6ImRjNjI4YWNhOTkzMmEwOTVlOTM4YzMzNDY3OWRjMDY0In0.QvX7lwpFe7yd0xSPBMG4QqVvcFWNHFM1kjXtrxUGXUk";
        
        
        // 返回前端要处理的order_id
        $order_id = token_to_openid($token);
        // 此处应该返回订单的详细信息：演出、场次、座位
?>