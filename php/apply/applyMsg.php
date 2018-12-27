<?php 
include_once("../connect.php");
include_once("../foodMsg.php");
$clickplace="PC留言页面";
$source=$website;

@$name = htmlspecialchars(trim($_POST['dataYourName']));
@$phone = htmlspecialchars(trim($_POST['dataYourTel']));
@$reason = htmlspecialchars(trim($_POST['dataContent']));



//各项数值判断

$checkphone=' /^1\d{10}$/';



if(empty($name)){
    echo "姓名不能为222空！";
    exit;
}

if(empty($phone)){
    echo "手机不能为空";
    exit;
}

if(preg_match($checkphone,$phone)){
} else{
    echo "手机格式错误！";
    exit;
}

foodMSG($name,$phone,$reason,2,$clickplace,$website,$version);


$sql=mysqli_query($link,"insert into msg(name,phone,question,source,clickplace)values('$name','$phone','$reason','$source','$clickplace')");
$result="提交成功";
mysqli_close($link);
echo $result;
?>