<?php
include("../connect.php");

//$news_addtime=date("Y-m-d h:i:s");
$store_id=$_POST["store_id"];
$store_name=htmlspecialchars($_POST["store_name"]);
$store_address=htmlspecialchars($_POST["store_address"]);

if(isset($_POST["editorValue"])){
    $store_summary=$_POST["editorValue"];
}
else
{
    $store_summary=" ";
}

    
$sql_store = "UPDATE store SET store_name='{$store_name}', store_summary='{$store_summary}', store_address='{$store_address}' WHERE store_id='{$store_id}'";


$sql_news_finish = mysqli_query($link,$sql_store);
echo "修改成功";

mysqli_close($link);
?>