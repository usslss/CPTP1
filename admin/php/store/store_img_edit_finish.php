<?php
include("../connect.php");

$store_id=$_POST["store_id"];

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
        $file_pc_url = "../../../images/store/".$filename_pc_gbk;
        $img_pc_url = "images/store/".$filename_pc_gbk;
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

//移动端的图片的上传
if($_FILES["file_wap"]["error"])
{
  //  echo $_FILES["file_wap"]["error"];

}
else
{
    //没有出错
    //加限制条件        到底改不改名字   到底改不改名字   到底改不改名字   到底改不改名字   到底改不改名字   到底改不改名字   到底改不改名字   到底改不改名字   到底改不改名字   到底改不改名字
    //判断上传文件类型为png或jpg且大小不超过1024000B
    if(($_FILES["file_wap"]["type"]=="image/png"||$_FILES["file_wap"]["type"]=="image/jpeg")&&$_FILES["file_wap"]["size"]<1024000)
    {
        //防止文件名重复
        $string = $_FILES["file_wap"]["name"];
        $array = explode('.',$string);
        $filename_wap_random=rand(1000, 9999);
        if(isset($filename_pc_random)){
            if($filename_wap_random==$filename_pc_random){
                $filename_wap_random=$filename_wap_random+1;
            }
        }
        $filename_wap_gbk =date('ymd_His', time())."_".$filename_wap_random.".".$array[1];
        $file_wap_url = "../../../wap/images/store/".$filename_wap_gbk;
        $img_wap_url = "wap/images/store/".$filename_wap_gbk;
        //转码，把utf-8转成gb2312,返回转换后的字符串， 或者在失败时返回 FALSE。
        $filename_wap =iconv("UTF-8","gb2312",$file_wap_url);
        //检查文件或目录是否存在
        if(file_exists($filename_wap))
        {
            echo"该文件已存在";
            
        }
        else
        {
            //保存文件,   move_uploaded_file 将上传的文件移动到新位置
            move_uploaded_file($_FILES["file_wap"]["tmp_name"],$filename_wap);//将临时地址移动到指定地址
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
    $sql_pc = "UPDATE store SET store_img_url='{$img_pc_url}' WHERE store_id='{$store_id}'";
    $sqlfinish = mysqli_query($link,$sql_pc);
}

if(isset($file_wap_url))
{
    $sql_wap = "UPDATE store SET store_wap_img_url='{$img_wap_url}' WHERE store_id='{$store_id}'";
    $sqlfinish = mysqli_query($link,$sql_wap);
}








echo "修改图片成功";






mysqli_close($link);
?>