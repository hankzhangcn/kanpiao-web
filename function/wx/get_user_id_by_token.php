<?php
// 回报小程序user_id
    include "../../component/header.php";
    include "../pub/conn.php";

    include "../pub/jwt.php";
    include "../pub/get_sub.php";

    // $token = $_GET['token'];
    // $token = "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJrYW5waWFvIiwiaWF0IjoxNjU0MjU1Njg4LCJleHAiOjE2NTQyNjI4ODgsIm5iZiI6MTY1NDI1NTY4OCwic3ViIjoid3d3LmFkbWluLmNvbSIsImp0aSI6IjVjYTU5NmJiYWFkNWI4MWYwOGYyNWUxNmVjMTkyYjFiIn0.6FReifi7MXGgAlRtuYlOwnjS00rp0OwUr0nI_5R9NPI";
    // echo $getPayload=Jwt::verifyToken($token);
    // return $getPayload['sub'];



    $getPayload_test=Jwt::verifyToken($token);
  echo "<br><br>";
  var_dump($getPayload_test);
  echo "<br><br>";

?>