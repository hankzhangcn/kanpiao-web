<div class="funclist-pad">
    <a href="dashboard.php">
        <input type="button" class="yibiaopan" value="工作台">
    </a>
    <a href="view.php">
        <input type="button" class="view" value="用户一览">
    </a>
    <a href="login_view.php">
        <input type="button" class="add" value="用户登录记录">
    </a>
    <div class="crossline"></div>
    <a href="changepw.php">
        <input type="button" class="changepw" value="修改密码">
    </a>";
<?php
        if($is_service == 0)
        {
?>
            <div class="crossline">演出</div>
            <a href="show_view.php">
                <input type="button" class="changepw" value="演出一览">
            </a>
            <a href="changepw.php">
                <input type="button" class="changepw" value="演出检索">
            </a>
            <div class="crossline">客服管理</div>
            <a href="user_view.php"><input type="button" value="客服一览"> </a>
            <a href="adduser.php"><input type="button" value="新增客服"> </a>
<?php
}
?>
</div>