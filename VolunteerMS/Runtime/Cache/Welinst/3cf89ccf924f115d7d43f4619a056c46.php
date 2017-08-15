<?php if (!defined('THINK_PATH')) exit();?><!--包含头部文件-->
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <meta name="renderer" content="webkit|ie-comp|ie-stand">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <link rel="Bookmark" href="/favicon.ico" >
    <link rel="Shortcut Icon" href="/favicon.ico" />
    <!--[if lt IE 9]>
    <script type="text/javascript" src="<?php echo (HUI_LIB_URL); ?>/html5shiv.js"></script>
    <script type="text/javascript" src="<?php echo (HUI_LIB_URL); ?>/respond.min.js"></script>
    <![endif]-->
    <link rel="stylesheet" type="text/css" href="<?php echo (HUI_STATIC_URL); ?>/h-ui/css/H-ui.min.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo (HUI_STATIC_URL); ?>/h-ui.admin/css/H-ui.admin.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo (HUI_LIB_URL); ?>/Hui-iconfont/1.0.8/iconfont.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo (HUI_STATIC_URL); ?>/h-ui.admin/skin/default/skin.css" id="skin" />
    <link rel="stylesheet" type="text/css" href="<?php echo (HUI_STATIC_URL); ?>/h-ui.admin/css/style.css" />
    <!--[if IE 6]>
    <script type="text/javascript" src="<?php echo (HUI_LIB_URL); ?>/DD_belatedPNG_0.0.8a-min.js" ></script>
    <script>DD_belatedPNG.fix('*');</script>
    <![endif]-->
    <title>Nanjing Volunteer</title>
    <meta name="keywords" content="H-ui.admin v3.1,H-ui网站后台模版,后台模版下载,后台管理系统模版,HTML后台模版下载">
    <meta name="description" content="H-ui.admin v3.1，是一款由国人开发的轻量级扁平化网站后台模板，完全免费开源的网站后台管理系统模版，适合中小型CMS后台系统。">
</head>
<body>
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 消息管理 <span class="c-gray en">&gt;</span> 消息列表 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">
    <div class="mt-20">
        <table class="table table-border table-bordered table-bg table-hover table-sort">
            <thead>
            <tr class="text-c">
                <th width="80">序号</th>
                <th width="100">服务名称</th>
                <th width="150">发布时间</th>
                <th width="60">发布状态</th>
                <th width="60">操作</th>
            </tr>
            </thead>
            <tbody>
            <?php if(is_array($messageRs)): foreach($messageRs as $key=>$vo): ?><tr class="text-c">
                <td><?php echo ($key+1); ?></td>
                <td onclick="modal(<?php echo ($vo["id"]); ?>)"><?php echo ($vo["title"]); ?></td>
                <td><?php echo (date("y-m-d h:i", $vo["createtime"])); ?></td>
                <td class="td-status"><a href="" title="点击修改状态"><span class='label label-success radius'>正常</span></a></td>
                <td class="td-manage"><a style="text-decoration:none" class="ml-5"  href="javascript:;" title="编辑" onclick="modaldemo('编辑', '<?php echo U('edit', ['id' => $vo['id']]);?>')"><i class="Hui-iconfont" >&#xe6df;</i></a> <a style="text-decoration:none" class="ml-5"  href="<?php echo U('delete', ['id' => $vo['id']]);?>" title="删除"><i class="Hui-iconfont">&#xe6e2;</i></a></td>
            </tr><?php endforeach; endif; ?>
            </tbody>
        </table>
    </div>

    <div id="modal-demo" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content radius">
                <div class="modal-header">
                    <h3 class="modal-title">简介</h3>
                    <a class="close" data-dismiss="modal" aria-hidden="true" href="javascript:void();">×</a>
                </div>
                <div class="modal-body">
                    <form class="form form-horizontal" id="form-article-add">
                        <div class="row cl">
                            <label class="form-label col-xs-4 col-sm-2">服务内容标题：</label>
                            <div class="formControls col-xs-8 col-sm-9">
                                <input type="text" class="input-text radius" value="hjh" placeholder="" id="articletitle" name="articletitle" readonly="true">
                            </div>
                        </div>

                        <div class="row cl">
                            <label class="form-label col-xs-4 col-sm-2">服务内容：</label>
                            <div class="formControls col-xs-8 col-sm-9">
                                <textarea name="abstract" cols="" rows="" class="textarea radius"  datatype="*10-100"  dragonfly="true" readonly="true"  onKeyUp="$.Huitextarealength(this,800)" id="textareacontent"></textarea>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button class="btn" data-dismiss="modal" aria-hidden="true">关闭</button>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function modaldemo(title, url) {
        layer_show(title, url,'', 300);
    }

    function modal(id) {

        $("#modal-demo").modal("show");
        var aj=$.ajax({
            url:"<?php echo U('Enterprise/enterprise/welinfo');?>",
            data:{
                'id':id
            },
            type:"get",
            success:function(data)  {

                if (data.status) {
                    $("#articletitle").val(data.msg.title);
                    $("#textareacontent").val(data.msg.content);
                }
            },
            error:function(){
                alert("出现错误");
            }
        });
        aj();
    }
</script>
<script type="text/javascript" src="<?php echo (HUI_LIB_URL); ?>/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo (HUI_LIB_URL); ?>/layer/2.4/layer.js"></script>
<script type="text/javascript" src="<?php echo (HUI_STATIC_URL); ?>/h-ui/js/H-ui.min.js"></script>
<script type="text/javascript" src="<?php echo (HUI_STATIC_URL); ?>/h-ui.admin/js/H-ui.admin.js"></script>
<script type="text/javascript" src="<?php echo (HUI_LIB_URL); ?>/jquery.contextmenu/jquery.contextmenu.r2.js"></script>

<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="<?php echo (HUI_LIB_URL); ?>/My97DatePicker/4.8/WdatePicker.js"></script>
<script type="text/javascript" src="<?php echo (HUI_LIB_URL); ?>/jquery.validation/1.14.0/messages_zh.js"></script>
<script type="text/javascript" src="<?php echo (HUI_LIB_URL); ?>/webuploader/0.1.5/webuploader.min.js"></script>
<script type="text/javascript" src="<?php echo (HUI_LIB_URL); ?>/ueditor/1.4.3/ueditor.config.js"></script>
<script type="text/javascript" src="<?php echo (HUI_LIB_URL); ?>/ueditor/1.4.3/ueditor.all.min.js"> </script>
<script type="text/javascript" src="<?php echo (HUI_LIB_URL); ?>/ueditor/1.4.3/lang/zh-cn/zh-cn.js"></script>
<script type="text/javascript" src="<?php echo (HUI_LIB_URL); ?>/datatables/1.10.0/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?php echo (HUI_LIB_URL); ?>/laypage/1.2/laypage.js"></script>
<script type="text/javascript" src="<?php echo (HUI_SRC_URL); ?>/js/jQuery.raty.js"></script>

</body>
</html>