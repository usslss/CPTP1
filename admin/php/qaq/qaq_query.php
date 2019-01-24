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


$sqlmsg = "SELECT * FROM cptp_others WHERE website='{$website}' AND class='qaq'";


//数量
$sqlsum = "SELECT count(*) FROM cptp_others WHERE website='{$website}' AND class='qaq'";
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
            $result="{$result}"."{\"id\":".$row["id"].",\"title\":\"".$row["title"]."\",".
                "\"summary\":\"".$row["summary"]."\",".
               "\"click\":\"".$row["click"]."\",".
               "\"addtime\":\"".$row["addtime"]."\",".             
                "\"img_url\":\"".$row["img_url"]."\"},";
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