<?php 


function foodMSG($name,$phone,$content,$gender,$clickplace,$website,$version){
    
    $host="hdm449548107.my3w.com";
    $db_user="hdm449548107";
    $db_pass="Miaoka1102";
    $db_name="hdm449548107_db";
    $timezone="Asia/Shanghai";
    
    
    $link=mysqli_connect($host,$db_user,$db_pass);//连接数据库主机
    mysqli_select_db($link,$db_name);//选择数据库
    mysqli_query($link,"SET names UTF8");//设置数据库编码格式
    
    date_default_timezone_set($timezone); //北京时间
    
    if($gender=="男" or $gender=='男士' or $gender=='先生'){
        $gender=1;
    }else if($gender=="女" or $gender=='女士' or $gender=='小姐'){
        $gender=0;
    }else {
        $gender=2;
    }
    
    
    
    $content=$website."_".$version."_".$clickplace."_".$content;
    
    $msg_time=date("y-m-d H:i:s" );
    $msg_ip = $_SERVER['REMOTE_ADDR'];
    
    $sql=mysqli_query($link,"insert into db_msg(msg_usernm,msg_usersex,msg_content,msg_userphone,msg_time,msg_ip)values('$name','$gender','$content','$phone','$msg_time','$msg_ip')");
    
    mysqli_close($link);
}


?>