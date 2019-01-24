<?php
include_once "../connect.php";
//网站信息获取
$sql_info = "SELECT * FROM cptp_info WHERE website='{$website}'";
$id=$_GET["id"];
$result = mysqli_query($link, $sql_info);

while ($row = mysqli_fetch_assoc($result)) {
    $infoArr[$website]["id"] = $row["id"];
    $infoArr[$website]["website"] = $row["website"];
    $infoArr[$website]["tel"] = $row["tel"];
    $infoArr[$website]["email"] = $row["email"];
    $infoArr[$website]["address"] = $row["address"];
    $infoArr[$website]["copyright"] = $row["copyright"];
    $infoArr[$website]["mitbeian"] = $row["mitbeian"];
    $infoArr[$website]["jmsum"] = $row["jmsum"];
    $infoArr[$website]["53kf"] = htmlspecialchars($row["53kf"]);
    $infoArr[$website]["53kf_status"] = $row["53kf_status"];

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
    <link rel="stylesheet" href="//res.layui.com/layui/dist/css/layui.css" media="all">
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
    $(document).ready(function() {

        var editorOption = {
            //这里可以选择自己需要的工具按钮名称,此处仅选择如下五个
            toolbars: [
                ['fullscreen', 'source', 'undo', 'redo', '|', 'fontfamily', 'fontsize', 'forecolor',
                    'bold', 'italic', 'underline', 'fontborder', 'strikethrough', 'removeformat',
                    'formatmatch', 'autotypeset', 'pasteplain'
                ],

            ],
            //focus时自动清空初始化时的内容
            autoClearinitialContent: false,
            //关闭elementPath
            elementPathEnabled: false,
            //传值的名称
            textarea: 'editorValue1',
            //让编辑器换行以br结束 而不是p
            enterTag: 'br'
        };

        var strrr = '<?php echo $product_all ?>';

        var editor_a = new baidu.editor.ui.Editor(editorOption);
        editor_a.render('editor');
        editor_a.ready(function() {
            editor_a.setContent(strrr); //赋值给UEditor
        });



    });
    </script>

</head>

<body>




    <div class="x-body">
        <form action="website_info_edit_finish.php" method="post" enctype="multipart/form-data">
            <input type="hidden" value="<?php echo $id; ?>" name="id"></input>
            <table class="layui-table">
                <tbody>
                    <tr>
                        <th width="120" colspan="1">网站名称</th>
                        <td colspan="1">
                            <?php echo $infoArr[$website]["website"]; ?>
                    </tr>
                    <tr>
                        <th width="120" colspan="1"> 加盟热线</th>
                        <td colspan="1">
                            <div class="layui-input-inline">
                                <input type="text" style="width:400px" name="tel" required="" lay-verify="required"
                                    autocomplete="off" class="layui-input" value="<?php echo $infoArr[$website]["tel"]; ?>">
                            </div>
                    </tr>
                    <tr>
                        <th width="120" colspan="1">电子邮箱</th>
                        <td colspan="1">
                            <div class="layui-input-inline">
                                <input type="text" style="width:400px" name="email" required="" lay-verify="required"
                                    autocomplete="off" class="layui-input" value="<?php echo $infoArr[$website]["email"]; ?>">
                            </div>
                    </tr>
                    <tr>
                        <th width="120" colspan="1">地址</th>
                        <td colspan="1">
                            <div class="layui-input-inline">
                                <input type="text" style="width:400px" name="address" required="" lay-verify="required"
                                    autocomplete="off" class="layui-input" value="<?php echo $infoArr[$website]["address"]; ?>">
                            </div>
                    </tr>
                    <tr>
                        <th width="120" colspan="1">版权声明</th>
                        <td colspan="1">
                            <div class="layui-input-inline">
                                <input type="text" style="width:400px" name="copyright" required="" lay-verify="required"
                                    autocomplete="off" class="layui-input" value="<?php echo $infoArr[$website]["copyright"]; ?>">
                            </div>
                    </tr>
                    <tr>
                        <th width="120" colspan="1">备案号</th>
                        <td colspan="1">
                            <div class="layui-input-inline">
                                <input type="text" style="width:400px" name="mitbeian" required="" lay-verify="required"
                                    autocomplete="off" class="layui-input" value="<?php echo $infoArr[$website]["mitbeian"]; ?>">
                            </div>
                    </tr>
                    <tr>
                        <th width="120" colspan="1">加盟人数</th>
                        <td colspan="1">
                            <div class="layui-input-inline">
                                <input type="text" style="width:400px" name="jmsum" required="" lay-verify="required"
                                    autocomplete="off" class="layui-input" value="<?php echo $infoArr[$website]["jmsum"]; ?>">
                            </div>
                    </tr>
                    <tr>
                        <th width="120" colspan="1">53客服代码</th>
                        <td colspan="1">
                            <div class="layui-input-inline">
                                <input type="text" style="width:400px" name="53kf" required="" lay-verify="required"
                                    autocomplete="off" class="layui-input" value="<?php echo $infoArr[$website]["53kf"]; ?>">                                  
                            </div>
                    </tr>

                </tbody>
            </table>

            <input class="layui-btn" type="submit" name="传值" value="编辑" />

        </form>
    </div>





</body>

</html>