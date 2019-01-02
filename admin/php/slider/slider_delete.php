<?php
include_once("../connect.php");
//待加入对输入值的判断 和非中文的鉴定 重复文件的判断       数据库性死亡

$slider_id=$_POST["slider_id"];


$sql = "DELETE FROM slider WHERE slider_id = {$slider_id}";


$sqlfinish = mysqli_query($link,$sql);

mysqli_close($link);




?>