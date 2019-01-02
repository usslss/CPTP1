<?php 
/*
$b="";
foreach($_REQUEST as $k=>$v){
    $b.=$k."***".$v."<br>";
}
$myfile = fopen("newfile.txt", "a") or die("Unable to open file!");  //w  重写  a追加
//$txt = $empId."\n".$loginName."\n".$empName."\n".$loginPwd."\n".$tel."\n";
fwrite($myfile, $b);
fclose($myfile);
*/
include_once("../connect.php");


$sqlsum = "SELECT count(*) FROM img";
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



if (isset($_GET["page"])){
    $page=$_GET["page"];
}

if (isset($_GET["limit"])){
    $list_show=$_GET["limit"];    
}

if (isset($_GET["chuanzhiming"])){
    $chuanzhiming=$_GET["chuanzhiming"];
}   

$sqlmsg = "SELECT img_id, img_name, img_url, img_text ,img_class, img_source, img_direction ,addtime FROM img";
    
if($chuanzhiming==1){
$sqlfinal="SELECT id, name ,email, gender, phone ,question,msgcheckbox,clickplace,source,addtime FROM msg1 WHERE gender='男'";
$sqlmsg = $sqlfinal;

$sqlsum = "SELECT count(id) FROM msg1 where gender='男'";
$a = mysqli_query($link,$sqlsum);
$b = mysqli_fetch_row($a);
$sum = $b[0];
}

if($chuanzhiming==2){
$sqlfinal="SELECT id, name ,email, gender, phone ,question,msgcheckbox,clickplace,source,addtime FROM msg1 WHERE gender='女'";
$sqlmsg = $sqlfinal;


$sqlsum = "SELECT count(id) FROM msg1 where gender='女'";
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
        if(($i>$list_head)&($i<=$list_bottom)){                
        $result="{$result}"."{\"img_id\":".$row["img_id"].",\"img_name\":\"".$row["img_name"]."\",".
        "\"img_url\":\"".$row["img_url"]."\",".
        "\"img_text\":\"".$row["img_text"]."\",".
        "\"img_class\":\"".$row["img_class"]."\",".
        "\"img_source\":\"".$row["img_source"]."\",".
        "\"img_direction\":\"".$row["img_direction"]."\",".
        "\"addtime\":\"".$row["addtime"]."\"},";
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