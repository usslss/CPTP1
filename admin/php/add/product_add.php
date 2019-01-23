<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>product_add</title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" href="//res.layui.com/layui/dist/css/layui.css" media="all">
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
                elementPathEnabled: true,
                textarea: 'editorValue',
                //让编辑器换行以br结束 而不是p
                enterTag: 'br'
            };


            var editor_a = new baidu.editor.ui.Editor(editorOption);
            editor_a.render('editor');




        });
    </script>
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


</head>

<body>

    <div class="x-body">
        <form action="product_add_finish.php" method="post" enctype="multipart/form-data">

            <table class="layui-table">
                <tbody>
                    <tr>
                        <th colspan="1" width="120">产品名称</th>
                        <td colspan="3">
                            <div class="layui-input-inline">
                                <input type="text" style="width:300px" name="product_name" required="" lay-verify="required"
                                    autocomplete="off" class="layui-input">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="1">产品分类</td>
                        <td colspan="3">
                            <div class="layui-form">
                                <div class="layui-inline" style="width:100px">
                                    <input type="text" style="width:300px" name="product_class" required="" lay-verify="required"
                                        autocomplete="off" class="layui-input">
                                </div>
                            </div>
                        </td>

                    </tr>
                    <tr>
                        <th colspan="1" valign="top">PC配图</th>
                        <td colspan="1">
                            <div class="layui-input-inline">

                                <div id="divPreview">
                                    <img id="imgHeadPhoto1" src="../../images/noperson.jpg" style="width: 300px; height: 100px; border: solid 1px #d2e2e2;"
                                        alt="" />
                                </div>

                                <!--file定义输入字段和 "浏览"按钮，供文件上传。-->
                                <input type="file" name="file_pc" onchange="PreviewImage(this,'imgHeadPhoto1','divPreview');"
                                    size="20" />

                        </td>
                        <th colspan="1" valign="top" width="100px">WAP配图</th>
                        <td colspan="1">
                            <div class="layui-input-inline">

                                <div id="divPreview">
                                    <img id="imgHeadPhoto2" src="../../images/noperson.jpg" style="width: 300px; height: 100px; border: solid 1px #d2e2e2;"
                                        alt="" />
                                </div>

                                <!--file定义输入字段和 "浏览"按钮，供文件上传。-->
                                <input type="file" name="file_wap" onchange="PreviewImage(this,'imgHeadPhoto2','divPreview');"
                                    size="20" />




                        </td>
                    </tr>
                    <tr>
                        <th colspan="1" valign="top">产品简介</th>
                        <td colspan="3">
                            <script id="editor" type="text/plain" style="width:600px;height:150px;">
                            </script>
                        </td>
                    </tr>
                </tbody>
            </table>

            <input class="layui-btn" type="submit" name="传值" value="添加产品" />




        </form>




    </div>











    <script type="text/javascript">
        var editorOption = {
            //这里可以选择自己需要的工具按钮名称,此处仅选择如下五个
            toolbars: [
                ['fullscreen', 'source', 'undo', 'redo', '|', 'fontfamily', 'fontsize', 'forecolor', 'bold',
                    'italic', 'underline', 'fontborder', 'strikethrough', 'removeformat', 'formatmatch',
                    'autotypeset', 'pasteplain'
                ],

            ],
            //focus时自动清空初始化时的内容
            autoClearinitialContent: false,
            //关闭elementPath
            elementPathEnabled: true
        };
    </script>

</body>

</html>