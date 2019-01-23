<?php
include("../connect.php");

//$news_addtime=date("Y-m-d h:i:s");
$product_id=$_POST["product_id"];
$product_name=htmlspecialchars($_POST["product_name"]);
$product_class=htmlspecialchars($_POST["product_class"]);

if(isset($_POST["editorValue1"])){
    $product_all=$_POST["editorValue1"];
}
else
{
    $product_all=" ";
}

$sql_product = "UPDATE cptp_product SET product_name='{$product_name}', product_all='{$product_all}', product_class='{$product_class}' WHERE product_id='{$product_id}'";

$sql_news_finish = mysqli_query($link,$sql_product);
echo "修改成功";

mysqli_close($link);
?>