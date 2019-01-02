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


$sqlmsg = "SELECT * FROM cptp_news WHERE news_website='{$website}'";


//数量
$sqlsum = "SELECT count(*) FROM cptp_news WHERE news_website='{$website}'";
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
            $result="{$result}"."{\"news_id\":".$row["news_id"].",\"news_title\":\"".$row["news_title"]."\",".
                "\"news_summary\":\"".$row["news_summary"]."\",".
               "\"news_click\":\"".$row["news_click"]."\",".
                "\"news_class\":\"".$row["news_class"]."\",".
                "\"news_source\":\"".$row["news_source"]."\",".
               "\"news_addtime\":\"".$row["news_addtime"]."\",".             
                "\"news_img_url\":\"".$row["news_img_url"]."\"},";
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