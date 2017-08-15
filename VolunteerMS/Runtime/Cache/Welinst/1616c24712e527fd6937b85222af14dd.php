<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
    <title></title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="<?php echo (VOLUNTEER_CSS_URL); ?>/zui.css">
    <script type="text/javascript">
    </script>
    <style type="text/css">
        #content {
            background:url(<?php echo (VOLUNTEER_IMG_URL); ?>/shadow.png) no-repeat;
            background-size: 100% 100%;
            max-width: 100%;
        }
        #sign_text {
            font-size: 30px;
            padding:10px 0px 10px 20px;
            color: #c80000;
            border-bottom: solid 2px #c80000;
            margin: 5%;
        }
        #sign_up_all{
            display: flex;
            width:100%;
            flex-wrap: wrap;

        }
        #sign_left{
            flex:50%;
            border-right:1px solid #ececec;
            padding: 9%;
        }
        #sign_right{
            flex:50%;
            padding: 9%;
        }
        #submit_all{
            flex:50%;
            margin-left: 30%;
            margin-right: 30%;
        }
        #footer{
            padding:2%;
        }
    </style>
</head>
<body>
<body>
<div class="container">
    <div id="content">
        <div id="sign_text">江苏志愿联合会福利机构注册</div>
        <section>
            <form action="" method="post" enctype="multipart/form-data" id="sign_up_all">
                <div id="sign_left">
                    <div class="form-group">
                        <label >用户名</label>
                        <input type="text" class="form-control" name="username">
                    </div>
                    <div class="form-group">
                        <label >密码</label>
                        <input type="password" class="form-control" name="password">
                    </div>
                    <div class="form-group">
                        <label >确认密码</label>
                        <input type="password" class="form-control" name="confirmpass">
                    </div>
                </div>
                <div id="sign_right">
                    <div class="form-group">
                        <label >福利机构地址</label>
                        <input type="text" class="form-control" name="location">
                    </div>
                    <div class="form-group">
                        <label >机构负责人</label>
                        <input type="text" class="form-control" name="master">
                    </div>
                    <div class="form-group">
                        <label for="license">营业执照</label>
                        <input type="file" name="license"  id="license"/>
                    </div>
                </div>
                <div id="submit_all">
                    <input type="submit" name="submit" value="提交" class="btn btn-block" type="button" style="margin-top:30px" >
                </div>
            </form>
        </section>

    </div>
    <div id="footer">
        <img src="<?php echo (VOLUNTEER_IMG_URL); ?>/footer.png">
    </div>
</div>
<script type="text/javascript" src="<?php echo (VOLUNTEER_JS_URL); ?>/jquery-3.1.1.js"></script>
<script type="text/javascript" src="<?php echo (VOLUNTEER_JS_URL); ?>/zui.js"></script>
</body>
</html>