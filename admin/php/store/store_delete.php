<?php
include_once("../connect.php");
//待加入对输入值的判断 和非中文的鉴定 重复文件的判断       数据库性死亡

$store_id=$_POST["store_id"];


$sql = "DELETE FROM store WHERE store_id = {$store_id}";


$sqlfinish = mysqli_query($link,$sql);

mysqli_close($link);




?>