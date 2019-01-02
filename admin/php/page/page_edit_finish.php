<?php
include("../connect.php");
$page_class=$_POST["page_class"].'_'.$_POST["page_website"];
$page_title=htmlspecialchars($_POST["page_title"]);
$page_keywords=htmlspecialchars($_POST["page_keywords"]);
$page_description=htmlspecialchars($_POST["page_description"]);
//$news_addtime=date("Y-m-d h:i:s");



    
$sql_page = "UPDATE page SET page_class='{$page_class}', page_title='{$page_title}', page_keywords='{$page_keywords}', page_description='{$page_description}' WHERE page_class='{$page_class}'";


$sql_news_finish = mysqli_query($link,$sql_page);
echo "修改成功";

mysqli_close($link);
?>