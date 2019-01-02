<?php
include("../connect.php");

//$news_addtime=date("Y-m-d h:i:s");

$store_name=htmlspecialchars($_POST["store_name"]);
$store_address=htmlspecialchars($_POST["store_address"]);
$store_website=htmlspecialchars($_POST["store_website"]);
if(isset($_POST["editorValue"])){
    $store_summary=$_POST["editorValue"];
}
else
{
    $store_summary=" ";
}

    
$sql_store = "INSERT INTO store (store_name, store_address, store_summary, store_website) VALUES ('{$store_name}', '{$store_address}', '{$store_summary}', '{$store_website}')";


$sqlfinish = mysqli_query($link,$sql_store);
echo "添加成功";

mysqli_close($link);
?>