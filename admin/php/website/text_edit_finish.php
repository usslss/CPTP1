<?php
include "../connect.php";
include "../imgcut.php";
$img_source = $website;
$id = $_POST["id"];
$type = $_POST["type"];
echo $type;

if (isset($_POST["editorValue1"])) {
    $text_all = $_POST["editorValue1"];
} else {
    $text_all = " ";
}

if($type=='pc'){
$sql_text = "UPDATE cptp_others SET text_all='{$text_all}' WHERE id='{$id}'";
}

if($type=='wap'){
$sql_text = "UPDATE cptp_others SET wap_text_all='{$text_all}' WHERE id='{$id}'";
}

$sql_text_finish = mysqli_query($link, $sql_text);
echo "修改文本成功";

mysqli_close($link);
