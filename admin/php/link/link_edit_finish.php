<?php
include("../connect.php");
$link_id=$_POST["link_id"];
$link_name=$_POST["link_name"];
$link_url=$_POST["link_url"];
//$news_addtime=date("Y-m-d h:i:s");



    
$sql_page = "UPDATE link SET link_name='{$link_name}', link_url='{$link_url}' WHERE link_id='{$link_id}'";


$sql_news_finish = mysqli_query($link,$sql_page);
echo "修改成功";

mysqli_close($link);
?>