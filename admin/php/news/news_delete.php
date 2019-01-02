<?php
include_once("../connect.php");
//待加入对输入值的判断 和非中文的鉴定 重复文件的判断       数据库性死亡

$news_id=$_POST["news_id"];


$sql = "DELETE FROM news WHERE news_id = {$news_id}";


$sqlfinish = mysqli_query($link,$sql);

mysqli_close($link);




?>