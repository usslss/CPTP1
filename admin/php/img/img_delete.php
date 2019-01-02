<?php
include_once("../connect.php");
//待加入对输入值的判断 和非中文的鉴定 重复文件的判断       数据库性死亡

$img_id=$_POST["img_id"];
$img_url=$_POST["img_url"];
$img_delete_url="../../../".$img_url;
$sql = "DELETE FROM img WHERE img_id = {$img_id}";


$sqlfinish = mysqli_query($link,$sql);

mysqli_close($link);


//文件性死亡

$delete = unlink($img_delete_url);


?>