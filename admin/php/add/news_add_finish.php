<?php
include("../connect.php");

$img_source=$website;
$news_source=$website;


$news_title=htmlspecialchars($_POST["news_title"]);
$news_summary=htmlspecialchars($_POST["news_summary"]);
$news_class=$_POST["news_class"];

if(isset($_POST["editorValue"])){
    $news_all=$_POST["editorValue"];
}
else{
$news_all=" ";
}


$news_click="0";

$img_class="news";





if($_FILES["file"]["error"])
{
    echo $_FILES["file"]["error"];
   
}
else
{
    //没有出错
    //加限制条件        到底改不改名字   到底改不改名字   到底改不改名字   到底改不改名字   到底改不改名字   到底改不改名字   到底改不改名字   到底改不改名字   到底改不改名字   到底改不改名字
    //判断上传文件类型为png或jpg且大小不超过1024000B
    if(($_FILES["file"]["type"]=="image/png"||$_FILES["file"]["type"]=="image/jpeg")&&$_FILES["file"]["size"]<1024000)
    {
        //防止文件名重复
        $string = $_FILES["file"]["name"];
        $array = explode('.',$string);
        $filename_pc_random=rand(1000, 9999);
        $filename_pc_gbk =date('ymd_His', time())."_".$filename_pc_random.".".$array[1];
        $file_pc_url = "../../../images/news/".$filename_pc_gbk;
        $img_pc_url = "images/news/".$filename_pc_gbk;
        //转码，把utf-8转成gb2312,返回转换后的字符串， 或者在失败时返回 FALSE。
        $filename_pc =iconv("UTF-8","gb2312",$file_pc_url);
        //检查文件或目录是否存在
        if(file_exists($filename_pc))
        {
            echo"该文件已存在";
        }
        else
        {
            //保存文件,   move_uploaded_file 将上传的文件移动到新位置
            move_uploaded_file($_FILES["file"]["tmp_name"],$filename_pc);//将临时地址移动到指定地址
        }
    }
    else
    {
        echo"文件类型不对";
        exit;
    }
}






if (isset($file_pc_url)){
    $sql_img = "INSERT INTO img (img_name, img_url, img_class ,img_source) VALUES('{$filename_pc_gbk}', '{$img_pc_url}', '{$img_class}', '{$img_source}')";
    $sql_news = "INSERT INTO news (news_title, news_summary, news_img_url, news_all, news_source, news_click, news_class) VALUES('{$news_title}', '{$news_summary}', '{$img_pc_url}', '{$news_all}', '{$news_source}', '{$news_click}', '{$news_class}')";
    $sqlfinish_img = mysqli_query($link,$sql_img);
    $sqlfinish = mysqli_query($link,$sql_news);
}
else {
    $sql_news = "INSERT INTO news (news_title, news_summary, news_all, news_source, news_click, news_class) VALUES('{$news_title}', '{$news_summary}', '{$news_all}', '{$news_source}', '{$news_click}', '{$news_class}')";
    $sqlfinish = mysqli_query($link,$sql_news);
}
    










echo "添加新闻成功";

  
mysqli_close($link);
?>