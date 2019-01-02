<?php
include("../connect.php");

$link_name=htmlspecialchars($_POST["link_name"]);
$link_url=htmlspecialchars($_POST["link_url"]);
//$link_website=htmlspecialchars($_POST["link_website"]);

$sql_news = "INSERT INTO link (link_name, link_url, link_website) VALUES('{$link_name}', '{$link_url}', '{$website}')";
$sqlfinish = mysqli_query($link,$sql_news); 

echo "添加友情链接成功";
 
mysqli_close($link);
?>