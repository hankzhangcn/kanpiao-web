<?php
    include "../../component/header.php";
    include "../pub/conn.php";



    $session_id = $_GET['session_id'];
    $show_id = $_GET['show_id'];
    if($session_id)
    {
        // 获取show_id
        $sql = "select show_id from `show_session` where `session_id` = $session_id";
        $res = mysqli_query($conn, $sql);
        $row=mysqli_fetch_array($res);
        $show_id = $row['show_id'];
    }

    $sql = "select * from `show_session` where `show_id` = $show_id";
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

       


?>