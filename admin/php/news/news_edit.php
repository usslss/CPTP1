<?php
include_once("../connect.php");
//待加入对输入值的判断 和非中文的鉴定 重复文件的判断


//获取关键词的页面和网站属性
$sql_getclass="SELECT news_class FROM news";

$result1=mysqli_query($link, $sql_getclass);


$i=0;
while ($row=mysqli_fetch_assoc($result1)){
    $quchong[$i]=$row["news_class"];
    $i++;
}

$i=0;
foreach (array_unique($quchong) as $id => $news_class) {
    $newsarr[$i]["news_class"] = $news_class;
    $i++;
}
$newsclass_sum=$i;

$news_id=$_GET['news_id'];

$sql = "SELECT * FROM news WHERE news_id='{$news_id}'";
$sqlfinish = mysqli_query($link,$sql);

while($row=mysqli_fetch_array($sqlfinish)){
    $news_title=$row["news_title"];
    $news_summary=$row["news_summary"];
    $news_img_url=$row["news_img_url"];
    $news_all=$row["news_all"];
    $news_click=$row["news_click"];
    $news_class=$row["news_class"];
    
}

//echo $news_class,$news_title;

mysqli_close($link);
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>news_edit</title>
  <meta name="renderer" content="webkit">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <link rel="stylesheet" href="//res.layui.com/layui/dist/css/layui.css"  media="all">
      <link rel="stylesheet" href="../../css/font.css">
    <link rel="stylesheet" href="../../css/xadmin.css">
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
        //js本地图片预览，兼容ie[6-9]、火狐、Chrome17+、Opera11+、Maxthon3
        function PreviewImage(fileObj, imgPreviewId, divPreviewId) {
            var allowExtention = ".jpg,.bmp,.gif,.png"; //允许上传文件的后缀名document.getElementById("hfAllowPicSuffix").value;
            var extention = fileObj.value.substring(fileObj.value.lastIndexOf(".") + 1).toLowerCase();
            var browserVersion = window.navigator.userAgent.toUpperCase();
            if (allowExtention.indexOf(extention) > -1) {
                if (fileObj.files) {//HTML5实现预览，兼容chrome、火狐7+等
                    if (window.FileReader) {
                        var reader = new FileReader();
                        reader.onload = function (e) {
                            document.getElementById(imgPreviewId).setAttribute("src", e.target.result);
                        }
                        reader.readAsDataURL(fileObj.files[0]);
                    } else if (browserVersion.indexOf("SAFARI") > -1) {
                        alert("不支持Safari6.0以下浏览器的图片预览!");
                    }
                } else if (browserVersion.indexOf("MSIE") > -1) {
                    if (browserVersion.indexOf("MSIE 6") > -1) {//ie6
                        document.getElementById(imgPreviewId).setAttribute("src", fileObj.value);
                    } else {//ie[7-9]
                        fileObj.select();
                        if (browserVersion.indexOf("MSIE 9") > -1)
                            fileObj.blur(); //不加上document.selection.createRange().text在ie9会拒绝访问
                        var newPreview = document.getElementById(divPreviewId + "New");
                        if (newPreview == null) {
                            newPreview = document.createElement("div");
                            newPreview.setAttribute("id", divPreviewId + "New");
                            newPreview.style.width = document.getElementById(imgPreviewId).width + "px";
                            newPreview.style.height = document.getElementById(imgPreviewId).height + "px";
                            newPreview.style.border = "solid 1px #d2e2e2";
                        }
                        newPreview.style.filter = "progid:DXImageTransform.Microsoft.AlphaImageLoader(sizingMethod='scale',src='" + document.selection.createRange().text + "')";
                        var tempDivPreview = document.getElementById(divPreviewId);
                        tempDivPreview.parentNode.insertBefore(newPreview, tempDivPreview);
                        tempDivPreview.style.display = "none";
                    }
                } else if (browserVersion.indexOf("FIREFOX") > -1) {//firefox
                    var firefoxVersion = parseFloat(browserVersion.toLowerCase().match(/firefox\/([\d.]+)/)[1]);
                    if (firefoxVersion < 7) {//firefox7以下版本
                        document.getElementById(imgPreviewId).setAttribute("src", fileObj.files[0].getAsDataURL());
                    } else {//firefox7.0+                    
                        document.getElementById(imgPreviewId).setAttribute("src", window.URL.createObjectURL(fileObj.files[0]));
                    }
                } else {
                    document.getElementById(imgPreviewId).setAttribute("src", fileObj.value);
                }
            } else {
                alert("仅支持" + allowExtention + "为后缀名的文件!");
                fileObj.value = ""; //清空选中文件
                if (browserVersion.indexOf("MSIE") > -1) {
                    fileObj.select();
                    document.selection.clear();
                }
                fileObj.outerHTML = fileObj.outerHTML;
            }
            return fileObj.value;    //返回路径
        }
</script>
<script type="text/javascript">
        $(document).ready(function(){
            
            $("#news_class").val("<?php echo $news_class;?>");/* 这句话设置select中value为x的项被选中,例如$("#slt").val(“本科”)就表示<option>本科</option>被选中*/
            
            var strrr=document.getElementById('tt2').value;
            var editor_a = new baidu.editor.ui.Editor();
            editor_a.render('editor');
            editor_a.ready(function() {
                editor_a.setContent(strrr);  //赋值给UEditor
            });
            

            
        });    
    </script>
  
  
</head>
<body>
          
          
  

<div class="x-body">
 <form action="news_edit_finish.php" method="post" enctype="multipart/form-data">
                
                <table class="layui-table" >
                    <tbody >
                    <input type="hidden" value="<?php echo $news_id;?>" name="news_id"></input>
                    <tr>
                            <th width="100" colspan="1">新闻标题</th>
                            <td colspan="1" ><div class="layui-input-inline">
                  <input type="text" style="width:400px" name="news_title" required="" lay-verify="required"
                  autocomplete="off" class="layui-input" value="<?php echo $news_title;?>">
                  <textarea id="tt2" style="display:none;"><?php echo $news_all;?></textarea>
              </div></td>
                         <td colspan="1"  width="50">点击数</td>
                  <td colspan="1"  width="100"><input type="text" style="" name="news_click" required="" lay-verify="required"
                  autocomplete="off" class="layui-input"  value="<?php echo $news_click;?>"></td>
                        <tr>
                            <th colspan="1">摘要文字</th>
                            <td colspan="1" width="400"><div class="layui-input-inline">
                  <input type="text" style="width:400px" name="news_summary" required="" lay-verify="required"
                  autocomplete="off" class="layui-input"  value="<?php echo $news_summary;?>"></td>
                  <td colspan="1"  width="50">新闻分类</td>
                  <td colspan="1"  width="100">                  
                  
                  <select name='news_class' id='news_class' >
                  <option value ="无">请选择新闻分类</option>
                  <?php			
if (isset($_GET["news_class"])){
    $query_news_class=$_GET["news_class"];
}
else{
    $query_news_class="分类名";
}

for ($i=0;$i<$newsclass_sum;$i++){    
    if($newsarr[$i]["news_class"]==$query_news_class){
        echo <<< EOT
        <option selected="selected">{$newsarr[$i]["news_class"]}</option>
EOT;
    }
        else {         
            echo <<< EOT
        <option>{$newsarr[$i]["news_class"]}</option>
EOT;
        }
    

}
?> 
                  </select>
                  </td>
                  
                  </tr>  
                        <tr>
                            <th colspan="1" valign="top">摘要配图</th>
                            <td colspan="3"><div class="layui-input-inline">
                            
                                <div id="divPreview">
        <img id="imgHeadPhoto" src="../../../<?php echo $news_img_url;?>" style="width: 300px; height: 100px; border: solid 1px #d2e2e2;"
            alt="" />
</div>

<!--file定义输入字段和 "浏览"按钮，供文件上传。-->
    <input type="file" name="file" onchange="PreviewImage(this,'imgHeadPhoto','divPreview');" size="20" />



                  
                  </td></tr>                            
                        <tr>
                            <th colspan="1" valign="top">正文内容</th>
                            <td colspan="3"> <script id="editor" type="text/plain" style="width:1024px;height:250px;">
</script></td></tr>
                    </tbody>
                </table>
                 
                 <input class="layui-btn" type="submit" name="传值" value="编辑新闻" />

 
       

</form>




</div>          
          
          
          
          
          
          
          
          
          








</body>
</html>