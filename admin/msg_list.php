<?php 
include('php/identify.php');
?>
<!DOCTYPE html>
<html>
  
  <head>
    <meta charset="UTF-8">
    <title>page_page</title>
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
        <a href="msg_list.php">留言管理</a>
        <a>
          <cite>留言列表</cite></a>
      </span>
      <a class="layui-btn layui-btn-small" style="line-height:1.6em;margin-top:3px;float:right" href="javascript:location.replace(location.href);" title="刷新">
        <i class="layui-icon" style="line-height:30px">ဂ</i></a>
    </div>
    
    <div class="x-body">
    
    



<div class="layui-inline" >




<table class="layui-hide" id="LAY_table_user" lay-filter="useruv"></table>


</div>


<script type="text/html" id="barDemo">

<a class="layui-btn layui-btn-xs layui-btn-danger" lay-event="del"><i class="layui-icon">&#xe640;</i>删除</a>
</script>


<script src="./lib/layui/layui.js"></script>
<script>
    layui.use('table', function(){
        var table = layui.table;

        //方法级渲染
        table.render({
            elem: '#LAY_table_user'
            ,url: 'php/msg/msg_query.php'
            ,cols: [[
                {field:'id', title: 'ID', sort: true, fixed: false,width:100}
                ,{field:'name', title: '用户名', sort: false, fixed: false,width:180}
                ,{field:'msg', title: '留言内容', sort: false, fixed: false}
                ,{field:'phone', title: '手机号', sort: false, fixed: false,width:200}
                ,{field:'clickplace', title: '点击处', sort: false, fixed: false,width:130}
                ,{field:'source', title: '来源网站', sort: true, fixed: false,width:130}
                ,{field:'addtime', title: '留言时间', sort: true, fixed: false,width:180}
                ,{field:'right', title: '操作', width:178,align:'center',toolbar:"#barDemo", fixed: 'right',width:100}
            ]]
            ,id: 'testReload'
            ,page: true
            //,height: 600
        });


//js实现条件搜索传值的地方
        
        var $ = layui.$, active = {
            reload: function(){
                var isSearch = '1';
                var search_startdate= $('#search_startdate');
                var search_enddate= $('#search_enddate');
                var search_gender= $('#search_gender');
                var search_source= $('#search_source');
                var search_option= $('#search_option');
                var search_option_keyword= $('#search_option_keyword');
                var 传值名 = $('#传值名');           
                table.reload('testReload', {
                	url: 'php/msg_search.php',
                	method: 'post',  
                    where: {
                    	search_startdate:search_startdate.val(),
                    	search_enddate:search_enddate.val(),
                    	search_gender:search_gender.val(),
                    	search_source:search_source.val(),
                    	search_option: search_option.val(),
                    	search_option_keyword: search_option_keyword.val(),
                        chuanzhiming: 传值名.val(),   
                    }
                });
            }
        };



        //监听表格复选框选择
        table.on('checkbox(useruv)', function(obj){
            console.log(obj)
        });
        //监听工具条
        table.on('tool(useruv)', function(obj){
            var data = obj.data;
            if(obj.event === 'detail'){
                layer.msg('ID：'+ data.id + ' 的查看操作');
            } else if(obj.event === 'del'){
                layer.confirm('确定删除这条留言?', function(index){
              	  console.log(data);
                  obj.del();
                  layer.close(index);
                  $.ajax({
                      url: "php/msg/msg_delete.php",
                      type: "post",
                      data:{"msg_id":data.id},
                      dataType: "text",
                      

                  });
              });
            } else if(obj.event === 'edit'){

                layer.prompt({
                    formType: 2
                    ,title: '修改 ID 为 ['+ data.id +'] 的访问量'
                    ,value: data.uv
                }, function(value, index){
                    EidtUv(data,value,index,obj);
                   


                });



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