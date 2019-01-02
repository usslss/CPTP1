<?php
include("../connect.php");

//$news_addtime=date("Y-m-d h:i:s");
$product_id=$_POST["product_id"];
$product_name=htmlspecialchars($_POST["product_name"]);
$product_show=htmlspecialchars($_POST["product_show"]);

if(isset($_POST["editorValue"])){
    $product_summary=$_POST["editorValue"];
}
else
{
    $product_summary=" ";
}

    
$sql_product = "UPDATE product SET product_name='{$product_name}', product_summary='{$product_summary}', product_show='{$product_show}' WHERE product_id='{$product_id}'";


$sql_news_finish = mysqli_query($link,$sql_product);
echo "修改成功";

mysqli_close($link);
?>