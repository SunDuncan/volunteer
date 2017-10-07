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
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 导表 <span class="c-gray en">&gt;</span> 已完成任务表 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">
    <div class="mt-20">
        <table class="table table-border table-bordered table-bg table-hover table-sort dataTable no-footer" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">
            <thead>
            <tr class="text-c" role="row">
                <th width="40" class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="ID: 升序排列" style="width: 40px;">ID</th>
                <th width="60" class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="企业名称: 升序排列" style="width: 60px;">福利机构名称</th>
                <th width="100" class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="服务内容: 升序排列" style="width: 100px;">企业名称</th>
                <th width="100" class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="发布时间: 升序排列" style="width: 40px;">活动简介</th>
                <th width="100" class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="完成时间: 升序排列" style="width: 40px;">评价星级</th>
            </thead>
            <tbody>

            <?php if(is_array($info)): foreach($info as $key=>$value): ?><tr class="text-c va-m odd" role="row">
                    <td><?php echo ($key); ?></td>
                    <td><?php echo ($value['wel_name']); ?></td>
                    <td><?php echo ($value['ent_name']); ?></td>
                    <td onclick="modal(<?php echo ($value["id"]); ?>)"><?php echo ($value['title']); ?></td>
                    <td><?php echo ($value['star']); ?></td>
                </tr><?php endforeach; endif; ?>

            <tr>
                <td colspan="20" style="text-align: center;">
                    <?php echo ($pagelist); ?>
                </td>
            </tr>
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
                                <input type="text" class="input-text radius" value="" placeholder="" id="articletitle" name="articletitle" readonly="true">
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
<div class="mt-20" style="float:right"> <a href="<?php echo U('export');?>"><input class="btn btn-success radius" type="button" value="导表"></div></a>

</div>
<script type="text/javascript">
    function order(){
        $('.table-sort').dataTable({
            "aaSorting": [[ 0, "desc" ]],//默认第几个排序
            "bStateSave": true,//状态保存
            "aoColumnDefs": [
                //{"bVisible": false, "aTargets": [ 3 ]} //控制列的隐藏显示
                {"orderable":false,"aTargets":{}}// 制定列不参与排序
            ]
        });
        $('.table-sort tbody').on( 'click', 'tr', function () {
            if ( $(this).hasClass('selected') ) {
                $(this).removeClass('selected');
            }
            else {
                table.$('tr.selected').removeClass('selected');
                $(this).addClass('selected');
            }
        });
    };

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
<script type="text/javascript" src=<?php echo (HUI_LIB_URL); ?>/jquery.validation/1.14.0/jquery.validate.js"></script>
<script type="text/javascript" src="<?php echo (HUI_LIB_URL); ?>/jquery.validation/1.14.0/validate-methods.js"></script>
<script type="text/javascript" src="<?php echo (HUI_LIB_URL); ?>/jquery.validation/1.14.0/messages_zh.js"></script>
<script type="text/javascript" src="<?php echo (HUI_LIB_URL); ?>/webuploader/0.1.5/webuploader.min.js"></script>
<script type="text/javascript" src="<?php echo (HUI_LIB_URL); ?>/ueditor/1.4.3/ueditor.config.js"></script>
<script type="text/javascript" src="<?php echo (HUI_LIB_URL); ?>/ueditor/1.4.3/ueditor.all.min.js"> </script>
<script type="text/javascript" src="<?php echo (HUI_LIB_URL); ?>/ueditor/1.4.3/lang/zh-cn/zh-cn.js"></script>
<script type="text/javascript" src="<?php echo (HUI_LIB_URL); ?>/datatables/1.10.0/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?php echo (HUI_LIB_URL); ?>/laypage/1.2/laypage.js"></script>
<script type="text/javascript" src="<?php echo (HUI_LIB_URL); ?>/jquery.raty/2.7.0/jquery.raty.js"></script>
</body>
</html>