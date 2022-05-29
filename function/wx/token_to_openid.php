<?php
// 本功能实则取sub，虽然从sub取值不太规范，但╮(^_^)╭无所谓啦
    include "../../component/header.php";
    include "../pub/conn.php";
    include "../pub/jwt.php";


    function token_to_openid($token)
    {
        $getPayload=Jwt::verifyToken($token);
        return $getPayload['sub'];
    }

?>