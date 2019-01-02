<?php
include_once("connect.php");


$sqlsum = "SELECT count(*) FROM msg";
$a = mysqli_query($link,$sqlsum);
$b = mysqli_fetch_row($a);
$sum = $b[0];

/*
 if (isset($_GET["search"])){
 $sum=$_GET["search"];
 }
 */
$page="1";
$list_show="10";
$result="";
$i="1";
$chuanzhiming="0";

//传值判断

if (isset($_POST["page"])){
    $page=$_POST["page"];
}

if (isset($_POST["limit"])){
    $list_show=$_POST["limit"];
}


//进行sql搜索语句的编织233



if (isset($_POST["chuanzhiming"])){
    $chuanzhiming=$_POST["chuanzhiming"];
}






$sqlmsg = "SELECT id, name ,email, gender, phone ,question,msgcheckbox,clickplace,source,addtime FROM msg";

if($chuanzhiming==1){
    $sqlfinal="SELECT id, name ,email, gender, phone ,question,msgcheckbox,clickplace,source,addtime FROM msg WHERE gender='男'";
    $sqlmsg = $sqlfinal;
    
    $sqlsum = "SELECT count(id) FROM msg where gender='男'";
    $a = mysqli_query($link,$sqlsum);
    $b = mysqli_fetch_row($a);
    $sum = $b[0];
}

if($chuanzhiming==2){
    $sqlfinal="SELECT id, name ,email, gender, phone ,question,msgcheckbox,clickplace,source,addtime FROM msg WHERE gender='女'";
    $sqlmsg = $sqlfinal;
    
    
    $sqlsum = "SELECT count(id) FROM msg where gender='女'";
    $a = mysqli_query($link,$sqlsum);
    $b = mysqli_fetch_row($a);
    $sum = $b[0];
    
    
}



$list_head=$list_show*($page-1);
$list_bottom=$list_show*$page;




$msglink = $link->query($sqlmsg);

if ($msglink->num_rows > 0) {
    // 输出数据
    while(($row = $msglink->fetch_assoc())!=false) {
        //$result="{$result}"."{\"id\":".$row["id"].",\"name\":\"".$row["name"]."\"},";
        if(($i>$list_head)&($i<=$list_bottom)){
            $result="{$result}"."{\"id\":".$row["id"].",\"name\":\"".$row["name"]."\",".
                "\"gender\":\"".$row["gender"]."\",".
                "\"phone\":\"".$row["phone"]."\",".
                "\"msg\":\"".$row["question"].' '.$row["msgcheckbox"]."\",".
                "\"addtime\":\"".$row["addtime"]."\",".
                "\"clickplace\":\"".$row["clickplace"]."\",".
                "\"source\":\"".$row["source"]."\",".
                "\"email\":\"".$row["email"]."\"},";
        }
        $i=$i+1;
        //echo "id: " . $row["id"]. " - Name: " . $row["name"]. "<br>";
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