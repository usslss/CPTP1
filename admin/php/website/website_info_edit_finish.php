<?php
include("../connect.php");


$id=$_POST["id"];
$tel=$_POST["tel"];
$email=$_POST["email"];
$address=$_POST["address"];
$copyright=$_POST["copyright"];
$mitbeian=$_POST["mitbeian"];
$jmsum=$_POST["jmsum"];
$kf=$_POST["53kf"];

//echo $kf;

$sql_product = "UPDATE cptp_info SET tel='{$tel}', email='{$email}', email='{$email}', address='{$address}', copyright='{$copyright}', mitbeian='{$mitbeian}',jmsum='{$jmsum}',53kf='{$kf}' WHERE id='{$id}'";

$sql_news_finish = mysqli_query($link,$sql_product);
echo "网站信息修改成功";

mysqli_close($link);
?>
