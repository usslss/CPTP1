<?php
include_once("../connect.php");
//待加入对输入值的判断 和非中文的鉴定 重复文件的判断       数据库性死亡

$page_class=$_POST["page_class"]."_".$_POST["page_website"];


$sql = "DELETE FROM page WHERE page_class = {$page_class}";


$sqlfinish = mysqli_query($link,$sql);

mysqli_close($link);




?>