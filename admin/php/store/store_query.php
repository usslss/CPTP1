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




$sqlstore = "SELECT * FROM store";


//数量
$sqlsum = "SELECT count(*) FROM store";
$a = mysqli_query($link,$sqlsum);
$xx = mysqli_fetch_row($a);
$sum = $xx[0];

$list_head=$list_show*($page-1);
$list_bottom=$list_show*$page;


$storelink = $link->query($sqlstore);

if ($storelink->num_rows > 0) {
    // 输出数据
    while(($row = $storelink->fetch_assoc())!=false) {
        if(($i>$list_head)&($i<=$list_bottom)){
            $result="{$result}"."{\"store_id\":".$row["store_id"].",\"store_name\":\"".$row["store_name"]."\",".
                "\"store_summary\":\"".htmlspecialchars($row["store_summary"])."\",".                
                "\"store_address\":\"".$row["store_address"]."\",".
                "\"store_show\":\"".$row["store_show"]."\",".
                "\"store_wap_img_url\":\"".$row["store_wap_img_url"]."\",".
                "\"store_addtime\":\"".$row["store_addtime"]."\",".
                "\"sex\":\""."女"."\",".
                "\"store_img_url\":\"".$row["store_img_url"]."\"},";
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