<?php 
include('php/identify.php');
?>
<!DOCTYPE html>
<html>
  
  <head>
    <meta charset="UTF-8">
    <title>product_list</title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,user-scalable=yes, minimum-scale=0.4, initial-scale=0.8,target-densitydpi=low-dpi" />
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
    <link rel="stylesheet" href="./css/font.css">
    <link rel="stylesheet" href="./css/xadmin.css">
    <script type="text/javascript" src="https://cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>
    <script type="text/javascript" src="./lib/layui/layui.js" charset="utf-8"></script>
    <script type="text/javascript" src="./js/xadmin.js"></script>
    <!-- 让IE8/9支持媒体查询，从而兼容栅格 -->
    <!--[if lt IE 9]>
      <script src="https://cdn.staticfile.org/html5shiv/r29/html5.min.js"></script>
      <script src="https://cdn.staticfile.org/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  
  <body>
    <div class="x-nav">
      <span class="layui-breadcrumb">
        <a target="_parent" href="index.php">首页</a>
        <a href="text_list.php">页面文本</a>
        <a>
          <cite>头部导航</cite></a>
      </span>
      <a class="layui-btn layui-btn-small" style="line-height:1.6em;margin-top:3px;float:right" href="javascript:location.replace(location.href);" title="刷新">
        <i class="layui-icon" style="line-height:30px">ဂ</i></a>
    </div>
    
    <div class="x-body">
    
    



<div class="layui-inline" >
<table class="layui-hide" id="LAY_table_user" lay-filter="useruv"></table>
</div>






<script type="text/html" id="barDemo">
    <a class="layui-btn layui-btn-xs " onclick="" lay-event="edit_pc"><i class="layui-icon">&#xe642;</i>PC端文本编辑</a>
    <button class="layui-btn layui-btn-warm layui-btn-xs"  onclick="" lay-event="edit_wap"><i class="layui-icon">&#xe642;</i>移动端文本编辑</button>
 
</script>


<script src="./lib/layui/layui.js"></script>
<script>
    layui.use('table', function(){
        var table = layui.table,form = layui.form;        
        //方法级渲染
        table.render({
            elem: '#LAY_table_user'
            ,url: 'php/website/text_query.php'
            ,cols: [[
                {field:'id', title: 'ID', sort: true, fixed: false,width:100}
                ,{field:'page', title: '页面', sort: false, fixed: false,width:130}
                ,{field:'right', title: '操作', width:178,align:'center',toolbar:"#barDemo", fixed: 'right',width:300}
            ]]
            ,id: 'testReload'
            ,page: true
            //,height: 600
        });

        
        //监听工具条
        table.on('tool(useruv)', function(obj){
            var data = obj.data;
            if(obj.event === 'edit_pc'){
                var c='php/website/text_edit.php?type=pc&id='+data.id;
                x_admin_show('PC端文本编辑',c,900,700);

            } else if(obj.event === 'edit_wap'){

                var c='php/website/text_edit.php?type=wap&id='+data.id;
                x_admin_show('移动端文本编辑',c,900,700);

            }
        });

        $('.demoTable .layui-btn').on('click', function(){
            var type = $(this).data('type');
            active[type] ? active[type].call(this) : '';
        });

        function  EidtUv(data,value,index,obj) {
            $.ajax({
                url: "UVServlet",
                type: "POST",
                data:{"uvid":data.id,"memthodname":"edituv","aid":data.aid,"uv":value},
                dataType: "json",
                success: function(data){

                    if(data.state==1){

                        layer.close(index);
                        //同步更新表格和缓存对应的值
                        obj.update({
                            uv: value
                        });
                        layer.msg("修改成功", {icon: 6});
                    }else{
                        layer.msg("修改失败", {icon: 5});
                    }
                }

            });
        }


    });



    layui.use('laydate', function(){
        var laydate = layui.laydate;
                
        //执行一个laydate实例
        laydate.render({
          elem: '#search_startdate' //指定元素
        });

        //执行一个laydate实例
        laydate.render({
          elem: '#search_enddate' //指定元素
        });
      
      });

    
</script>


  
</form>




      
      
      
      
      





      
      
      

 

 

               
          
   

      
      
      
      
      
      
      
  </body>

</html>