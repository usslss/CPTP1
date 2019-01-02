<?php
include("../connect.php");

$slider_id=$_POST["slider_id"];

//pc端图片上传
if($_FILES["file_pc"]["error"])
{
  //  echo $_FILES["file_pc"]["error"];

}
else
{
    //没有出错
    //加限制条件        到底改不改名字   到底改不改名字   到底改不改名字   到底改不改名字   到底改不改名字   到底改不改名字   到底改不改名字   到底改不改名字   到底改不改名字   到底改不改名字
    //判断上传文件类型为png或jpg且大小不超过1024000B
    if(($_FILES["file_pc"]["type"]=="image/png"||$_FILES["file_pc"]["type"]=="image/jpeg")&&$_FILES["file_pc"]["size"]<1024000)
    {
        //防止文件名重复
        $string = $_FILES["file_pc"]["name"];
        $array = explode('.',$string);
        $filename_pc_random=rand(1000, 9999);
        $filename_pc_gbk =date('ymd_His', time())."_".$filename_pc_random.".".$array[1];
        $file_pc_url = "../../../hlbs/images/slider/".$filename_pc_gbk;
        $img_pc_url = "images/slider/".$filename_pc_gbk;
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
            move_uploaded_file($_FILES["file_pc"]["tmp_name"],$filename_pc);//将临时地址移动到指定地址
        }
    }
    else
    {
        echo"文件类型不对";
        exit;
    }
}




if(isset($file_pc_url))
{   
    $sql_pc = "UPDATE slider SET slider_img_url_main='{$img_pc_url}' WHERE slider_id='{$slider_id}'";
    $sqlfinish = mysqli_query($link,$sql_pc);
}




echo "修改图片成功";





mysqli_close($link);
?>