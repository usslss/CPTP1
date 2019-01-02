<?php
include_once("../connect.php");
//待加入对输入值的判断 和非中文的鉴定 重复文件的判断

$product_id=$_GET["product_id"];

$sql = "SELECT * FROM product WHERE product_id='{$product_id}'";
$sqlfinish = mysqli_query($link,$sql);

while($row=mysqli_fetch_array($sqlfinish)){
    $product_name=$row["product_name"];
    $product_summary=$row["product_summary"];
    $product_show=$row["product_show"];    
}
//统计数据库中已经存在的option选项
$sqlShow = "SELECT DISTINCT product_show FROM product ";
$sqlfinish2 = mysqli_query($link,$sqlShow);

while($row=mysqli_fetch_array($sqlfinish2)){
    $existoptionArr[]=$row["product_show"];
}

$existSum=count($existoptionArr);
//以下变量代表可用选项个数  (0,1,2)=3  (0,1,2,3,4)=5
$optionSum=5;

for($i=0;$i<$optionSum;$i++){
    
    $optionArr[$i]["selectValue"]=$i;
    
    //把已存在的非0的选项统统设为禁用
    for($j=0;$j<$existSum;$j++)
    {
        if(($optionArr[$i]["selectValue"])==($existoptionArr[$j])){
            $optionArr[$i]["selectClass"]="disabled";
        }
        
    }
    $optionArr[0]["selectClass"]="";
    

   
    //设置已选择项
    if (($optionArr[$i]["selectValue"])==$product_show){
        $optionArr[$i]["selectClass"]="selected";
   
    }

    
    $optionArr[$i]["selectOption"]=$optionArr[$i]["selectValue"];
    
    //值为0的显示为 不显示
    if (($optionArr[$i]["selectOption"])==0){
        $optionArr[$i]["selectOption"]="不显示";
    }
    
}


mysqli_close($link);
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>layui</title>
  <meta name="renderer" content="webkit">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <link rel="stylesheet" href="//res.layui.com/layui/dist/css/layui.css"  media="all">
      <link rel="stylesheet" href="../../css/font.css">
    <link rel="stylesheet" href="../../css/xadmin.css">
    <style>
    /* 解决下拉菜单被ueditor遮挡的问题     */ 
        .layui-form-select dl {
            z-index: 9999;
        }
    </style>
    <script type="text/javascript" src="https://cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>
    <script type="text/javascript" src="../../lib/layui/layui.js" charset="utf-8"></script>
    <script type="text/javascript" src="../../js/xadmin.js"></script>
    <script type="text/javascript" charset="utf-8" src="../../ueditor/ueditor.config.js"></script>
    <script type="text/javascript" charset="utf-8" src="../../ueditor/ueditor.all.min.js"> </script>
    <!--建议手动加在语言，避免在ie下有时因为加载语言失败导致编辑器加载失败-->
    <!--这里加载的语言文件会覆盖你在配置项目里添加的语言类型，比如你在配置项目里配置的是英文，这里加载的中文，那最后就是中文-->
    <script type="text/javascript" charset="utf-8" src="../../ueditor/lang/zh-cn/zh-cn.js"></script>
    <!-- 注意：如果你直接复制所有代码到本地，上述css路径需要改成你本地的 -->
  
<script type="text/javascript">
       
$(document).ready(function(){

    var editorOption = {
            //这里可以选择自己需要的工具按钮名称,此处仅选择如下五个
    		toolbars: [
    		    ['fullscreen', 'source', 'undo', 'redo','|','fontfamily','fontsize','forecolor','bold', 'italic', 'underline', 'fontborder', 'strikethrough',  'removeformat', 'formatmatch', 'autotypeset', 'pasteplain'],
    		    
    		],
            //focus时自动清空初始化时的内容
            autoClearinitialContent: false,
             //关闭elementPath
             elementPathEnabled: true
        };
 
    var strrr='<?php echo $product_summary?>';
    var editor_a = new baidu.editor.ui.Editor(editorOption);
    editor_a.render('editor');
    editor_a.ready(function() {
        editor_a.setContent(strrr);  //赋值给UEditor
    });
    

    
});     
    </script>
  
  
</head>
<body>
          
          
  

<div class="x-body">
 <form action="product_edit_finish.php" method="post" enctype="multipart/form-data">
                
                <table class="layui-table" >
                    <tbody >
                    <input type="hidden" value="<?php echo $product_id;?>" name="product_id"></input>
                    <tr>
                            <th width="120" colspan="1">产品名称</th>
                            <td colspan="1" ><div class="layui-input-inline">
                  
                  <input type="text" style="width:300px" name="product_name" required="" lay-verify="required"
                  autocomplete="off" class="layui-input" value="<?php echo $product_name;?>">
              </div>
            			  <td colspan="1">显示顺序</td>
            			  <td colspan="1">
<div class="layui-form">
<div class="layui-inline" style="width:100px">            			  
<select name="product_show" lay-verify=""">

  
  
<?php			

for ($i=0;$i<$optionSum;$i++){    
echo <<< EOT
<option value="{$optionArr[$i]["selectValue"]}" {$optionArr[$i]["selectClass"]}>{$optionArr[$i]["selectOption"]}</option>
EOT;
    

}
?>   
  
</select> 


</div>
</div>

						  </td>
                       

                  <tr>
                            <th width="120" colspan="1" valign="top">产品简介</th>
                            <td colspan="3"> <script id="editor" type="text/plain" style="width:600px;height:150px;"></script>

                  </td>
                  </tr>                            
                        
                    </tbody>
                </table>
                 
                 <input class="layui-btn" type="submit" name="传值" value="编辑" />

 
       

</form>




</div>          
          
          
          
          
          
          
          
          
          








</body>
</html>