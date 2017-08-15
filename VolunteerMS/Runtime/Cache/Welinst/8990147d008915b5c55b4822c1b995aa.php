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
                <th width="100">企业名称</th>
                <th width="150">操作</th>
            </tr>
            </thead>
            <tbody>
            <?php if(is_array($name)): foreach($name as $key=>$vo): ?><tr class="text-c">
                <td><?php echo ($key+1); ?></td>
                <td><?php echo ($vo["name"]); ?></td>
                <td class="td-manage"><a style="text-decoration:none" class="ml-5" onClick="" href="<?php echo U('Welinst/welfare/agree', ['id' => $vo['id'], 'mess_id' => $mess_id]);?>" title="同意"><span class='label label-success radius'>同意</span></a></td>
            </tr><?php endforeach; endif; ?>
            </tbody>
        </table>
    </div>
</div>

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