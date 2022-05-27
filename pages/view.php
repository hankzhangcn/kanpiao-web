<!------权限验证、部门ID名称转换------->
<?php
    include "../function/web/authorization.php";
    include "../function/pub/conn.php";
    include "../component/bootstrap.php";
?>

<?php
// 判断当前的页数
    if($_GET['p'])
        $page = $_GET['p'];
    else
        $page = 1;
    $page_size = 10;
?>


<!-------html------->
<!DOCTYPE html>
<html lang="zh-cn">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="\component\css\common.css">
  <link rel="stylesheet" href="\component\css\shadow.css">
  <link rel="stylesheet" href="\component\css\table.css">
  <link rel="icon" href="https://s1.ax1x.com/2020/06/09/t5LIK0.png" type="image/x-icon" />
  <title>用户一览-TIMS</title>
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
                <p>管理员 <?php echo $admin_name;?>，您可以在本页面查看或管理所有在校教师的信息。</p></br>
                <p>『一览』仅显示部分信息，要查看详细信息，请单击教师姓名。</p>
                <p>要浏览教师列表，请向下滚动页面。</p>
                <p>要管理教师信息，请点击教师姓名。</p>
                <p>要登出系统，请返回仪表盘。</p>
            </div>
            <div class="workspace">
                <h1>用户一览</h1>

                <table class="glance table table-hover table-bordered" >
                    <tr>
                        <td>用户 ID</td>
                        <td>昵称</td>
                        <td>性别</td>
                        <td>电话</td>
                        <td>检票员标识</td>
                        <td>封禁标识</td>
                        <td>上次登录时间</td>
                        <td>创建时间</td>
                    </tr>
                    <?php
                        $sql="select * from wx_user ORDER BY id limit ".(($page-1)*$page_size).",".$page_size;
                        $rs=mysqli_query($conn,$sql);
                        while($row=mysqli_fetch_array($rs))
                        {
                    if($row['is_checker'])
                        echo "<tr class=\"table-success\">";
                    else if($row['is_banned'])
                        echo "<tr class=\"table-danger\">";
                    else
                        echo "<tr>";
                    ?>
                    
                    
                        <td>
                            <a href="menage.php?user_id=<?php echo $row['id']?>"><?php echo $row['id']?></a>
                        </td>
                        <td>
                            <a href="menage.php?user_id=<?php echo $row['id']?>"><?php echo $row['nickname']?></a>
                        </td>
                        <td>
                            <?php 
                                if($row['gender'])
                                    echo "男";
                                else
                                    echo "女";?>
                        </td>
                        <td>
                            <?php echo $row['mobile']?> 
                        </td>
                        <td>
                            <?php 
                                if($row['is_checker'])
                                    echo "<span class=\"badge badge-success\">是</span>";
                                else
                                    echo "否";?>
                        </td>
                        <td>
                            <?php 
                                if($row['is_banned'])
                                    echo "<span class=\"badge badge-danger\">被封禁</span>";
                                else
                                    echo "正常";?>
                        </td>
                        <td>
                            <?php echo $row['last_login']?>
                        </td>
                        <td>
                            <?php echo $row['create_time']?>
                        </td>
                    </tr>
                    <?php
                        }
                    ?>
                </table>
                <nav aria-label="Page navigation">
                    <ul class="pagination justify-content-center">
                        
                    <!-- 算出最大页面数 -->
                    <?php
                        $sql="select count(*) from wx_user";
                        $rs=mysqli_query($conn,$sql);
                        $row=mysqli_fetch_array($rs);
                        $max_page = ceil($row[0]/$page_size);
                        // 引入分页
                        include "../component/pagination.php";
                    ?>
                        </li>
                    </ul>
                    </nav>
                <p>以上。数据库载入完成，为您提供
                    <?php
                        $sql="select count(*) from wx_user";
                        $rs=mysqli_query($conn,$sql);
                        $row=mysqli_fetch_array($rs);
                        echo $row[0];
                    ?>
                    名教师的个人信息</p>
            </div>

            <div class="bottom">
                <h1>版权信息</h1>
                <p>© <?php echo date("Y");?> Hank.</p>
                <p>All Rights Reserved.</p>
                <p>Powered by PHP on PHPSTUDY</p>
            </div>
        </div>
    </main>
      <!--调试用，防止JS被缓存-->
    <!--<script type="text/javascript" src="../js/view.js?param=Math.random()"></script>-->
</body>
</html>
