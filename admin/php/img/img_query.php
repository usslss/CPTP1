<?php

include_once "../connect.php";

$page = "1";
$list_show = "10";
$result = "";
$i = "1";

if (isset($_GET["page"])) {
    $page = $_GET["page"];
}

if (isset($_GET["limit"])) {
    $list_show = $_GET["limit"];
}

$query_page = $_GET["img_page"];
$query_class = $_GET["img_class"];
$query_info=$query_page."_".$query_class;


$sqlmsg = "SELECT * FROM cptp_img WHERE class='{$query_info}' AND website='{$website}'";

//数量
$sqlsum = "SELECT count(*) FROM cptp_img WHERE class='{$query_page}_{$query_class}' AND website='{$website}'";


if($query_info=="all_all"){
    $sqlmsg = "SELECT * FROM cptp_img WHERE website='{$website}'";
    $sqlsum = "SELECT count(*) FROM cptp_img WHERE website='{$website}'";
}


$a = mysqli_query($link, $sqlsum);
$xx = mysqli_fetch_row($a);
$sum = $xx[0];

$list_head = $list_show * ($page - 1);
$list_bottom = $list_show * $page;

$msglink = $link->query($sqlmsg);

if ($msglink->num_rows > 0) {
    // 输出数据
    while (($row = $msglink->fetch_assoc()) != false) {
        if (($i > $list_head) & ($i <= $list_bottom)) {
            $result = "{$result}" . "{\"id\":\"" . $row["id"] . "\",\"name\":\"" . $row["name"] . "\"," .

                "\"wap_url\":\"" . $row["wap_url"] . "\"," .

                "\"class\":\"" . $row["class"] . "\"," .
                "\"url\":\"" . $row["url"] . "\"},";
        }
        $i = $i + 1;
    }
} else {
    //空搜索处理空搜索处理空搜索处理空搜索处理空搜索处理空搜索处理空搜索处理空搜索处理空搜索处理空搜索处理空搜索处理空搜索处理空搜索处理
    echo "0 结果";
}
//关闭数据库链接
mysqli_close($link);
//去掉字符串最后一个逗号
$result = rtrim($result, ",");

echo '{"code":0,"msg":"","count":' . $sum . ',"data":[' . $result . ']}';