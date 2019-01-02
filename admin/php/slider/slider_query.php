<?php

include_once("../connect.php");




$page="1";
$list_show="10";
$result="";
$i="1";


if (isset($_GET["page"])){
    $page=$_GET["page"];
}

if (isset($_GET["limit"])){
    $list_show=$_GET["limit"];
}


if (isset($_GET["slider_class"])){
    $query_class=$_GET["slider_class"];
    if ($_GET["slider_class"]=="class名"){
        $query_class='%';
    }
} else{
    $query_class='%';
}


if (isset($_GET["slider_page"])){
    $query_page=$_GET["slider_page"];
    if ($_GET["slider_page"]=="page名"){
        $query_page='%';
    }
} else{
    $query_page='%';
}



$sqlmsg = "SELECT slider_id, slider_name, slider_class, slider_img_url_main, slider_show FROM slider WHERE slider_page LIKE '{$query_page}' AND slider_class LIKE '{$query_class}'";

//数量
$sqlsum = "SELECT count(*) FROM slider WHERE slider_page LIKE '{$query_page}' AND slider_class LIKE '{$query_class}'";
$a = mysqli_query($link,$sqlsum);
$xx = mysqli_fetch_row($a);
$sum = $xx[0];



$list_head=$list_show*($page-1);
$list_bottom=$list_show*$page;


$msglink = $link->query($sqlmsg);

if ($msglink->num_rows > 0) {
    // 输出数据
    while(($row = $msglink->fetch_assoc())!=false) {
        if(($i>$list_head)&($i<=$list_bottom)){
            $result="{$result}"."{\"slider_id\":\"".$row["slider_id"]."\",\"slider_name\":\"".$row["slider_name"]."\",".
                "\"slider_img_url_main\":\"".$row["slider_img_url_main"]."\",".
                "\"slider_class\":\"".$row["slider_class"]."\",".
                "\"slider_show\":\"".$row["slider_show"]."\"},";
        }
        $i=$i+1;
    }
} else {
    //空搜索处理空搜索处理空搜索处理空搜索处理空搜索处理空搜索处理空搜索处理空搜索处理空搜索处理空搜索处理空搜索处理空搜索处理空搜索处理
    echo "0 结果";
}
//关闭数据库链接
mysqli_close($link);
//去掉字符串最后一个逗号
$result=rtrim($result, ",");

echo '{"code":0,"msg":"","count":'.$sum.',"data":['.$result.']}';
?>