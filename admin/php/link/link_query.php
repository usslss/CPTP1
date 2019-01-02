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


if (isset($_GET["website"])){
    $query_website=$_GET["website"];
    if ($_GET["website"]=="网站名"){
        $query_website='%';
    }
} else{
    $query_website='%';
}



$sqllink = "SELECT * FROM link WHERE link_website LIKE '{$query_website}' ";

//数量
$sqlsum = "SELECT count(*) FROM link WHERE link_website LIKE '{$query_website}'";
$a = mysqli_query($link,$sqlsum);
$xx = mysqli_fetch_row($a);
$sum = $xx[0];



$list_head=$list_show*($page-1);
$list_bottom=$list_show*$page;


$linklink = $link->query($sqllink);

if ($linklink->num_rows > 0) {
    // 输出数据
    while(($row = $linklink->fetch_assoc())!=false) {
        if(($i>$list_head)&($i<=$list_bottom)){
            $result="{$result}"."{\"link_id\":\"".$row["link_id"]."\",\"link_name\":\"".trim($row["link_name"])."\",".
                "\"link_url\":\"".trim($row["link_url"])."\",".
                "\"link_website\":\"".trim($row["link_website"])."\"},";
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