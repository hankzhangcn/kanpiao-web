<?php
// 本功能实则取sub，虽然从sub取值不太规范，但╮(^_^)╭无所谓啦
    include "../../component/header.php";
    include "../pub/conn.php";
    include "../pub/jwt.php";


        $token_test = "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJrYW5waWFvIiwiaWF0IjoxNjU0MDk4NDkzLCJleHAiOjE2NTQxMDU2OTMsIm5iZiI6MTY1NDA5ODQ5Mywic3ViIjoib3NmM3E1TWFILTY3Q3VIMTl5SVpvcmpUMmJ0RSIsImp0aSI6IjEwMWFlY2IwMDBmZTM0MWZmZTVhMGM1Yjc5NzM5ZTgyIn0.gITSrfDAuJLBfISEXgXvnFyi40cvBwVtlvsb5c1LTZY";
        $getPayload=Jwt::verifyToken($token_test);
        var_dump($getPayload);


?>