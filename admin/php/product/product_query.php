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




$sqlproduct = "SELECT * FROM product";


//数量
$sqlsum = "SELECT count(*) FROM product";
$a = mysqli_query($link,$sqlsum);
$xx = mysqli_fetch_row($a);
$sum = $xx[0];

$list_head=$list_show*($page-1);
$list_bottom=$list_show*$page;


$productlink = $link->query($sqlproduct);

if ($productlink->num_rows > 0) {
    // 输出数据
    while(($row = $productlink->fetch_assoc())!=false) {
        if(($i>$list_head)&($i<=$list_bottom)){
            $result="{$result}"."{\"product_id\":".$row["product_id"].",\"product_name\":\"".$row["product_name"]."\",".
                "\"product_summary\":\"".htmlspecialchars($row["product_summary"])."\",".
                "\"product_img_url\":\"".$row["product_img_url"]."\",".
                "\"product_show\":\"".$row["product_show"]."\",".
                "\"product_wap_img_url\":\"".$row["product_wap_img_url"]."\"},";
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