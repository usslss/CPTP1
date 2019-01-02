<?php

include_once("../connect.php");
$result="";

$sqlQuery = "SELECT * FROM cptp_info";

$querylink = $link->query($sqlQuery);

if ($querylink->num_rows > 0) {
    // 输出数据
    while(($row = $querylink->fetch_assoc())!=false) {
        
            $result="{$result}"."{\"id\":".$row["id"].",\"website\":\"".$row["website"]."\",".
                "\"tel\":\"".htmlspecialchars($row["tel"])."\",".
                "\"email\":\"".$row["email"]."\",".
                "\"address\":\"".$row["address"]."\",".
                "\"copyright\":\"".$row["copyright"]."\",".
                "\"mitbeian\":\"".$row["mitbeian"]."\",".
                "\"joinSum\":\"".$row["jmsum"]."\",".
                "\"address\":\"".$row["address"]."\",".
                "\"53kfStatus\":\"".$row["53kf_status"]."\"},";

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