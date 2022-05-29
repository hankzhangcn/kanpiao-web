<?php
    include "../../component/header.php";
    include "../pub/conn.php";
    include "../pub/jwt.php";

    $token = $_GET['token'];
    $getPayload=Jwt::verifyToken($token);
    if($getPayload)
    {
        $sql = "insert into login(`platform`,`user_id`,`login_date`,`is_new_login`) values('0','".$getPayload['sub']."','".date("Y-m-d H:i:s")."',0)";
        $res = mysqli_query($conn, $sql);
        echo 'true';
    }
    else
    {
        echo 'false';
    }


?>