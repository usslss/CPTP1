<?php
include_once("../connect.php");
//待加入对输入值的判断 和非中文的鉴定 重复文件的判断 

$id=$_POST["id"];

//删除文件
$sql = "SELECT * FROM img WHERE id='{$id}'";
$sqlfinish = mysqli_query($link, $sql);

while ($row = mysqli_fetch_array($sqlfinish)) {
    $delete_img_url = '../../../' . $row["url"];
    $delete_wap_img_url = '../../../wap/' . $row["wap_url"];
}
unlink($delete_img_url);
unlink($delete_wap_img_url);
//删除数据库数据

$sql = "DELETE FROM img WHERE id = {$id}";

$sqlfinish = mysqli_query($link,$sql);

mysqli_close($link);

?>