<?php
$str="images/qaq/190123_190004_5430.jpg";

$arr1=explode("/", $str);
$fileNameAll=$arr1[count($arr1)-1];
$arr2=explode(".", $fileNameAll);
$file_name_before=$arr2[0];
$file_type_before=$arr2[1];
echo $file_name_before."   ".$file_type_before;
?>