<?php
$host="localhost";
$db_user="root";
$db_pass="";
$db_name="encha";
$timezone="Asia/Shanghai";

$website="恩茶";

$link=mysqli_connect($host,$db_user,$db_pass);//连接数据库主机
mysqli_select_db($link,$db_name);//选择数据库
mysqli_query($link,"SET names UTF8");//设置数据库编码格式


date_default_timezone_set($timezone); //北京时间

?>