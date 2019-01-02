<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>product_add</title>
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
 

    var editor_a = new baidu.editor.ui.Editor(editorOption);
    editor_a.render('editor');

    

    
});     
    </script>

  
  
</head>
<body>
          
<div class="x-body">
 <form action="product_add_finish.php" method="post" enctype="multipart/form-data">
                
                <table class="layui-table" >
                    <tbody >                                               
                        <tr>
                            <th colspan="1" width="100">产品名称</th>
                            <td colspan="1" width="300"><div class="layui-input-inline">
                  <input type="text" style="width:400px" name="product_name" required="" lay-verify="required" autocomplete="off" class="layui-input"></td>
                  <td colspan="1" width="50">网站</td>
                  <td colspan="1">                  
                  <select name='product_website' >
                  <option value ="星巴克加盟">星巴克加盟</option>
                  </select>
                  
                  </td>
                  
                  </tr>  
                       
                        <tr>
                            <th colspan="1" valign="top">产品简介</th>
                            <td colspan="3"> <script id="editor" type="text/plain" style="width:600px;height:150px;">
</script></td></tr>
                    </tbody>
                </table>
                 
                 <input class="layui-btn" type="submit" name="传值" value="添加产品" />

 
       

</form>




</div>          
          
          
          
          
          
          
          
          
          


<script type="text/javascript">

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



</script>

</body>
</html>