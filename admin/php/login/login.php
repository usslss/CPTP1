<?php 
session_start();
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>后台登录</title>
	<meta name="renderer" content="webkit|ie-comp|ie-stand">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,user-scalable=yes, minimum-scale=0.4, initial-scale=0.8,target-densitydpi=low-dpi" />
    <meta http-equiv="Cache-Control" content="no-siteapp" />

    <link rel="shortcut icon" href="../../favicon.ico" type="image/x-icon" />
    <link rel="stylesheet" href="../../css/font.css">
	<link rel="stylesheet" href="../../css/xadmin.css">
    <script type="text/javascript" src="https://cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>
    <script src="./lib/layui/layui.js" charset="utf-8"></script>
    <script type="text/javascript" src="../../js/xadmin.js"></script>

</head>
<body class="login-bg">
    
    <div class="login layui-anim layui-anim-up">
        <div class="message">后台管理登录</div>
        <div id="darkbannerwrap"></div>
        
        <form method="post" action="" class="layui-form" >

<?php
//登录
include('../connect.php');
$username = htmlspecialchars($_POST['username']);
$username = mysqli_real_escape_string($link,$username);
$password = htmlspecialchars($_POST['password']);
$password = mysqli_real_escape_string($link,$password);
//$password = MD5($_POST['password']);






//包含数据库连接文件

//检测用户名及密码是否正确
$check_query = mysqli_query($link,"select userid from admin where username='$username' and password='$password' limit 1");

if((($result = mysqli_fetch_array($check_query))!=false)){
    //登录成功

    $_SESSION['username'] = $username;
    $_SESSION['userid'] = $result['userid'];
    echo ' 欢迎',$username,'！进入 <a href="../../index.php">后台管理系统</a><br />';
    echo '点击此处 <a href="logout.php">注销</a> 登录！<br />';
    exit;
} else {
    echo "登录失败!";
    echo '点击此处 <a href="../../login.html">重新</a> 登录！<br />';
    exit;
}

?>



        </form>
    </div>

    <script>
   

    </script>

    
    <!-- 底部结束 -->
    <script>
    //百度统计可去掉
    var _hmt = _hmt || [];
    (function() {
      var hm = document.createElement("script");
      hm.src = "https://hm.baidu.com/hm.js?b393d153aeb26b46e9431fabaf0f6190";
      var s = document.getElementsByTagName("script")[0]; 
      s.parentNode.insertBefore(hm, s);
    })();
    </script>
</body>
</html>