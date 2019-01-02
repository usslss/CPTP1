<?php
include("../connect.php");

//$news_addtime=date("Y-m-d h:i:s");
$slider_id=$_POST["slider_id"];
$slider_name=htmlspecialchars($_POST["slider_name"]);
$slider_show=htmlspecialchars($_POST["slider_show"]);

    
$sql_slider = "UPDATE slider SET slider_name='{$slider_name}', slider_show='{$slider_show}' WHERE slider_id='{$slider_id}'";


$sql_news_finish = mysqli_query($link,$sql_slider);
echo "修改成功";

mysqli_close($link);
?>