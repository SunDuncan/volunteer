<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
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
<header class="navbar-wrapper">
    <div class="navbar navbar-fixed-top">
        <div class="container-fluid cl"> <a class="logo navbar-logo f-l mr-10 hidden-xs" href="">NanJing Volunteer</a> <a class="logo navbar-logo-m f-l mr-10 visible-xs" href="/aboutHui.shtml">Volunteer</a>
            <span class="logo navbar-slogan f-l mr-10 hidden-xs">v1.0.0</span>
            <a aria-hidden="false" class="nav-toggle Hui-iconfont visible-xs" href="javascript:;">&#xe667;</a>
            <nav id="Hui-userbar" class="nav navbar-nav navbar-userbar hidden-xs">
                <ul class="cl">
                    <li>欢迎</li>
                    <li class="dropDown dropDown_hover">
                        <a href="#" class="dropDown_A"><?php echo ($info["name"]); ?> <i class="Hui-iconfont">&#xe6d5;</i></a>
                        <ul class="dropDown-menu menu radius box-shadow">
                            <li><a href="javascript:;" onClick="myselfinfo()">个人信息</a></li>
                            <li><a href="#">切换账户</a></li>
                            <li><a href="<?php echo U('User/logout');?>">退出</a></li>
                        </ul>
                    </li>
                    <li id="Hui-msg"> <a href="#" title="消息"><span class="badge badge-danger">1</span><i class="Hui-iconfont" style="font-size:18px">&#xe68a;</i></a> </li>
                    <li id="Hui-skin" class="dropDown right dropDown_hover"> <a href="javascript:;" class="dropDown_A" title="换肤"><i class="Hui-iconfont" style="font-size:18px">&#xe62a;</i></a>
                        <ul class="dropDown-menu menu radius box-shadow">
                            <li><a href="javascript:;" data-val="default" title="默认（黑色）">默认（黑色）</a></li>
                            <li><a href="javascript:;" data-val="blue" title="蓝色">蓝色</a></li>
                            <li><a href="javascript:;" data-val="green" title="绿色">绿色</a></li>
                            <li><a href="javascript:;" data-val="red" title="红色">红色</a></li>
                            <li><a href="javascript:;" data-val="yellow" title="黄色">黄色</a></li>
                            <li><a href="javascript:;" data-val="orange" title="橙色">橙色</a></li>
                        </ul>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</header>
<aside class="Hui-aside">
    <div class="menu_dropdown bk_2">
        <dl id="menu-message">
            <dt><i class="Hui-iconfont">&#xe616;</i>消息管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
            <dd>
                <ul>
                    <li><a data-href="<?php echo U('welfare/add');?>" data-title="消息发布" href="javascript:void(0)">消息发布</a></li>
                    <li><a data-href="<?php echo U('welfare/showlist');?>" data-title="消息列表" href="javascript:void(0)">消息列表</a></li>
                    <li><a data-href="<?php echo U('welfare/applist');?>" data-title="消息申请列表" href="javascript:void(0)">消息申请列表</a></li>
                    <li><a data-href="<?php echo U('welfare/end');?>" data-title="申请成功列表" href="javascript:void(0)">申请成功列表</a></li>

                </ul>
            </dd>
        </dl>

        <dl id=menu-welInfo">
            <dt><i class="Hui-iconfont">&#xe616;</i>福利机构管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
            <dd>
                <ul>
                    <li><a data-href="<?php echo U('welfare/evaluate');?>" data-title="待评价列表" href="javascript:void(0)">待评价列表</a></li>
                </ul>
            </dd>
        </dl>

        <dl id=menu-guidetable">
            <dt><i class="Hui-iconfont">&#xe616;</i>导表<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
            <dd>
                <ul>
                    <li><a data-href="<?php echo U('welfare/finish');?>" data-title="已完成任务表" href="javascript:void(0)">已完成任务表</a></li>
                </ul>
            </dd>
        </dl>

    </div>
</aside>
<div class="dislpayArrow hidden-xs"><a class="pngfix" href="javascript:void(0);" onClick="displaynavbar(this)"></a></div>
<section class="Hui-article-box">
    <div id="Hui-tabNav" class="Hui-tabNav hidden-xs">
        <div class="Hui-tabNav-wp">
            <ul id="min_title_list" class="acrossTab cl">
                <li class="active">
                    <span title="我的桌面" data-href="welcome.html">我的桌面</span>
                    <em></em></li>
            </ul>
        </div>
        <div class="Hui-tabNav-more btn-group"><a id="js-tabNav-prev" class="btn radius btn-default size-S" href="javascript:;"><i class="Hui-iconfont">&#xe6d4;</i></a><a id="js-tabNav-next" class="btn radius btn-default size-S" href="javascript:;"><i class="Hui-iconfont">&#xe6d7;</i></a></div>
    </div>
    <div id="iframe_box" class="Hui-article">
        <div class="show_iframe">
            <div style="display:none" class="loading"></div>
            <iframe scrolling="yes" frameborder="0" src="welcome.html"></iframe>
        </div>
    </div>
</section>

<div class="contextMenu" id="Huiadminmenu">
    <ul>
        <li id="closethis">关闭当前 </li>
        <li id="closeall">关闭全部 </li>
    </ul>
</div>
<!--_footer 作为公共模版分离出去-->
<!--/_footer 作为公共模版分离出去-->
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

<!--请在下方写此页面业务相关的脚本-->

<script type="text/javascript">
    $(function(){
        /*$("#min_title_list li").contextMenu('Huiadminmenu', {
         bindings: {
         'closethis': function(t) {
         console.log(t);
         if(t.find("i")){
         t.find("i").trigger("click");
         }
         },
         'closeall': function(t) {
         alert('Trigger was '+t.id+'\nAction was Email');
         },
         }
         });*/
    });
    /*个人信息*/
    function myselfinfo(){
        layer.open({
            type: 1,
            area: ['300px','200px'],
            fix: false, //不固定
            maxmin: true,
            shade:0.4,
            title: '查看信息',
            content: '<div>管理员信息</div>'
        });
    }

    /*资讯-添加*/
    function article_add(title,url){
        var index = layer.open({
            type: 2,
            title: title,
            content: url
        });
        layer.full(index_houtai);
    }
    /*图片-添加*/
    function picture_add(title,url){
        var index = layer.open({
            type: 2,
            title: title,
            content: url
        });
        layer.full(index_houtai);
    }
    /*产品-添加*/
    function product_add(title,url){
        var index = layer.open({
            type: 2,
            title: title,
            content: url
        });
        layer.full(index_houtai);
    }
    /*用户-添加*/
    function member_add(title,url,w,h){
        layer_show(title,url,w,h);
    }


</script>

<!--此乃百度统计代码，请自行删除-->
<script>
    var _hmt = _hmt || [];
    (function() {
        var hm = document.createElement("script");
        hm.src = "https://hm.baidu.com/hm.js?080836300300be57b7f34f4b3e97d911";
        var s = document.getElementsByTagName("script")[0];
        s.parentNode.insertBefore(hm, s);
    })();
</script>
<!--/此乃百度统计代码，请自行删除-->
</body>
</html>