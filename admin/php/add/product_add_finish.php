<?php
include("../connect.php");

//$news_addtime=date("Y-m-d h:i:s");

$product_name=htmlspecialchars($_POST["product_name"]);
$product_website=htmlspecialchars($_POST["product_website"]);
if(isset($_POST["editorValue"])){
    $product_summary=$_POST["editorValue"];
}
else
{
    $product_summary=" ";
}

    
$sql_product = "INSERT INTO product (product_name, product_summary, product_website) VALUES ( '{$product_name}', '{$product_summary}', '{$product_website}')";


$sqlfinish = mysqli_query($link,$sql_product);
echo "添加成功";

mysqli_close($link);
?>