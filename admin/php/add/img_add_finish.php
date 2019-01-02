<?php
include("../connect.php");


$img_source=$website;



$img_class=$_POST["img_class"];

@$img_text=htmlspecialchars($_POST["img_text"]);






if($_FILES["file"]["error"])
{
    echo $_FILES["file"]["error"];
    
}
else
{
    //没有出错
    //加限制条件
    //判断上传文件类型为png或jpg且大小不超过1024000B
    if(($_FILES["file"]["type"]=="image/png"||$_FILES["file"]["type"]=="image/jpeg")&&$_FILES["file"]["size"]<1024000)
    {
        //防止文件名重复
        $string = $_FILES["file"]["name"];
        $array = explode('.',$string);    
        $filename_gbk =date('ymd_His', time())."_".rand(1000, 9999).".".$array[1];
        $file_url = "../../../upload/".$filename_gbk;
        $img_url = "upload/".$filename_gbk;
        //转码，把utf-8转成gb2312,返回转换后的字符串， 或者在失败时返回 FALSE。
        $filename =iconv("UTF-8","gb2312",$file_url);
        //检查文件或目录是否存在
        if(file_exists($filename))
        {
            echo"该文件已存在";
            
        }
        else
        {
            //保存文件,   move_uploaded_file 将上传的文件移动到新位置
            move_uploaded_file($_FILES["file"]["tmp_name"],$filename);//将临时地址移动到指定地址
        }
    }
    else
    {
        echo"文件类型不对";
        exit;
        
    }
}




if(isset($file_url))
{
    $sql_img = "INSERT INTO img (img_name, img_url, img_text, img_class ,img_source) VALUES('{$filename_gbk}', '{$img_url}', '{$img_text}', '{$img_class}', '{$img_source}')";
    $sql_img_finish = mysqli_query($link,$sql_img);
   
}
else{   
    echo "请选择一个图片文件";
    exit;
}



echo "上传图片成功";




  
  mysqli_close($link);
?>