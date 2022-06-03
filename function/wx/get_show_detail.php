<?php
    include "../../component/header.php";
    include "../pub/conn.php";


    $show_id = $_GET['show_id'];


    $sql = "select * from `show_item` where `show_id` = $show_id";
    $res = mysqli_query($conn, $sql);
    $arr = array(); 
    while($row=mysqli_fetch_array($res))
    {
      foreach ($row as $key => $value) {
        $row[$key] = htmlspecialchars_decode($value);
      }
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