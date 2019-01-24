<?php
include("../connect.php");


$id=$_POST["id"];
$name=$_POST["name"];
$url=$_POST["url"];

//echo $kf;

$sql_product = "UPDATE cptp_nav SET name='{$name}', url='{$url}' WHERE id='{$id}'";

$sql_news_finish = mysqli_query($link,$sql_product);
echo "导航信息修改成功";

mysqli_close($link);
?>
