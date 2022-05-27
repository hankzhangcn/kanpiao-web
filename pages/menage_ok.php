<!------权限验证、部门ID名称转换------->
<?php
    include "../function/web/authorization.php";
    include "../function/pub/conn.php";
    include "../component/bootstrap.php";



    $id=$_POST['id'];
    // $openid=$_POST["openid"];
    $nickname=$_POST["nickname"];
    // $avatarurl=$_POST["avatarurl"];
    $gender=$_POST["gender"];
    // $country=$_POST["country"];
    // $province=$_POST["province"];
    // $city=$_POST["city"];
    // $language=$_POST["language"];
    $mobile=$_POST["mobile"];
    $is_checker=$_POST["is_checker"];
    // $last_login=$_POST["last_login"];
    // $create_time=$_POST["create_time"];
    $is_banned= $_POST["is_banned"];
    

    $sql = "UPDATE wx_user 
            SET nickname = '".$nickname.
            "', mobile = '".$mobile.
            "', gender = ".$gender.            
            ", is_checker = ".$is_checker.
            ", is_banned = ".$is_banned.
            " WHERE id = ".$id;
    $result = mysqli_query($conn,$sql);
    if(! $result )
    {
        echo $sql;
        die('本错误来自数据库提示：' . mysqli_error($conn).' 。已撤销所有操作，请手动后退');
    }
else{
?>
                <!DOCTYPE html>
                <html lang="zh-cn">
                <head>
                <meta charset="UTF-8">
                <link rel="stylesheet" href="\component\css\common.css">
                <link rel="icon" href="https://s1.ax1x.com/2020/06/09/t5LIK0.png" type="image/x-icon" />
                <script src="https://s3.pstatp.com/cdn/expire-1-M/jquery/3.4.0/jquery.min.js"></script>
                <title>用户信息修改成功-TIMS</title>
                </head>
                <body>
                    <main>
                        <!-- 顶栏 -->
                        <?php include "../component/topbar.php"?>
                        <!-- 目录 -->
                        <?php include "../component/menu.php"?>
                        <div class="contentflow">
                            <div class="noticepad">
                                <h1></h1>
                                <a>管理员 <?php echo $_SESSION['u_id'];?>，您可以在本页面修改这位教师的信息。</a></br>
                                <a>要登出系统，请返回仪表盘。</a></br>
                            </div>

                            <div class="workspace">
                            <?php
                                /*if($_REQUEST['delete'])
                                {
                            ?>
                                    <h1><?php echo "$t_name"?> 老师的信息已经删除</></br></br>
                                    <a href="../pages/dashboard.php">
                                        <input type="button" value="返回" >
                                    </a>
                            <?php
                                } else {*/
                            ?>
                                    
                                    <h1><?php echo "$nickname"?> 用户的信息已经完善</h1></br></br>
                                    <a href="./menage.php?user_id=<?php echo $id;?>">
                                        <input type="button" class="btn btn-success" value="返回" >
                                    </a>
                            <?php
                                //}
                            ?>
                            </div>

                            <div class="bottom">
                                <h1>版权信息</h1></br></br>
                                <a>© <?php echo date("Y");?> Hank.</a></br>
                                <a>All Rights Reserved.</a></br>
                                <a>Powered by PHP on PHPSTUDY</a>
                            </div>
                        </div>
                    </main>
                    <!--调试用，防止JS被缓存-->
                    <!--<script type="text/javascript" src="../js/menage.js?param=Math.random()"></script>-->
                </body>
                </html>
    
<?php
}
$conn->close();

?>
