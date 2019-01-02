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


if (isset($_GET["pagename"])){
    $query_name=$_GET["pagename"];
} else{
    $query_name='%';
}

if (isset($_GET["website"])){
    $query_website=$_GET["website"];
    if ($_GET["website"]=="网站名"){
        $query_website='%';
    }
} else{
    $query_website='%';
}



$sqlmsg = "SELECT page_class, page_title, page_keywords, page_description FROM page WHERE page_class LIKE '{$query_name}_{$query_website}' ";

//数量
$sqlsum = "SELECT count(*) FROM page WHERE page_class LIKE '{$query_name}_{$query_website}'";
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
            $cut=explode('_',$row["page_class"]);
            $result="{$result}"."{\"page_class\":\"".$cut[0]."\",\"page_title\":\"".$row["page_title"]."\",".
                "\"page_keywords\":\"".$row["page_keywords"]."\",".
                "\"page_description\":\"".$row["page_description"]."\",".
                "\"page_website\":\"".$cut[1]."\"},";
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