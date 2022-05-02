<?php
$servername = "localhost";
$username = "kanpiao";
$password = "kanpiao";
$dbname = "kanpiao";
$port = "3306";
 
// 创建连接
$conn = mysqli_connect($servername, $username, $password, $dbname, $port);
 
// 检测连接
if ($conn->connect_error) {
    die("连接失败: " . $conn->connect_error);
} 
// echo "连接成功";

$conn->set_charset("utf8");
?>