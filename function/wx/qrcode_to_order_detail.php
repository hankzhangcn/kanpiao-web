<?php
    include "../../component/header.php";
    include "../pub/conn.php";
    include "./token_to_openid.php";
    
    // 若是JWT形式
    // $qrcode=$_GET['qrcode'];
    // $order_id = token_to_openid($qrcode);

    $order_id=$_GET['qrcode'];




    $sql = "SELECT * FROM orders WHERE order_id = $order_id";
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
    // print_r($arr);
    echo json_encode($arr);
?>