<?php

include_once("../connect.php");
$result="";

$sqlQuery = "SELECT * FROM cptp_nav WHERE website='{$website}'";

$querylink = $link->query($sqlQuery);

if ($querylink->num_rows > 0) {
    // 输出数据
    while(($row = $querylink->fetch_assoc())!=false) {
        
            $result="{$result}"."{\"id\":".$row["id"].",\"name\":\"".$row["name"]."\",".
                "\"page\":\"".htmlspecialchars($row["page"])."\",".
                "\"url\":\"".$row["url"]."\"},";

    }
} else {
    //空搜索处理
    echo "0 结果";
}
//关闭数据库链接
mysqli_close($link);
//去掉字符串最后一个逗号
$result=rtrim($result, ",");

echo '{"code":0,"msg":"","count":'.'1'.',"data":['.$result.']}';
?>