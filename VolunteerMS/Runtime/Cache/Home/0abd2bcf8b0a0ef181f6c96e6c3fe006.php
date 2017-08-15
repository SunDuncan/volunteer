<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <title>Nanjing Volunteer</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="<?php echo (VOLUNTEER_CSS_URL); ?>/zui.css">
    <link rel="stylesheet" type="text/css" href="<?php echo (VOLUNTEER_CSS_URL); ?>/all.css">
    <style>
        #association_all{
            display:flex;
            width:100%;
        }
        #association_left{
            flex:50%;
        }
        #association_left>img{
            width:100%;
        }
        #association_right{
            padding:5%;
            flex:50%;
        }
        #association_right>.mk_title{
            display: block;
            font-size: 20px;
            font-weight: bolder;
            text-align: center;
        }
        #association_right>.mk_text{
            font-size:15px;
        }
        #go_to_association>a{
            color: #ffffff;
            background-color: #c1282d;
            border-radius: 10px;
            float: right;
        }
        #honor{
            display:flex;
            background:url(<?php echo (VOLUNTEER_IMG_URL); ?>/honor2.jpg) no-repeat ;
            background-size:cover;
            padding: 9%;
        }
        #honor>span{
            flex:1;
            padding:10px 1%;
        }
    </style>
</head>
<body>
<div class = "container">
    <div id="header">
        <span id="img_heart"><img src="<?php echo (VOLUNTEER_IMG_URL); ?>/heart1.jpg"/></span>
        <span id="firm_login_and_sign">
          <a href="<?php echo U('Enterprise/user/login');?>">企业</a>
          </span>
          <span id="welfare_login_and_sign">
          <a href="<?php echo U('Welinst/user/login');?>">福利机构</a>
          </span>
          <span id="login_and_sign">
          <a href="#">个人登录</a>
          <a href="#">个人注册</a>
        </span>
        <div id="nav">
            <span>首页</span>
            <span>通知公告</span>
            <span>政策法规</span>
            <span>风采展示</span>
            <span>志愿服务</span>
            <span>时间银行</span>
        </div>
    </div>
    <div id="content">
        <article>
            <div id="myNiceCarousel" class="carousel slide" data-ride="carousel">
                <!-- 圆点指示器 -->
                <ol class="carousel-indicators">
                    <li data-target="#myNiceCarousel" data-slide-to="0" class="active"></li>
                    <li data-target="#myNiceCarousel" data-slide-to="1"></li>
                    <li data-target="#myNiceCarousel" data-slide-to="2"></li>
                </ol>

                <!-- 轮播项目 -->
                <div class="carousel-inner">
                    <div class="item active">
                        <img alt="First slide" src="http://zui.sexy/docs/img/slide1.jpg">
                    </div>
                    <div class="item">
                        <img alt="Second slide" src="http://zui.sexy/docs/img/slide2.jpg">
                    </div>
                    <div class="item">
                        <img alt="Third slide" src="http://zui.sexy/docs/img/slide3.jpg">
                    </div>
                </div>

                <!-- 项目切换按钮 -->
                <a class="left carousel-control" href="#myNiceCarousel" data-slide="prev">
                    <span class="icon icon-chevron-left"><</span>
                </a>
                <a class="right carousel-control" href="#myNiceCarousel" data-slide="next"                >
                    <span class="icon icon-chevron-right">></span>
                </a>
            </div>
        </article>
        <section id="association">
            <img src="<?php echo (VOLUNTEER_IMG_URL); ?>/association.png">
        </section>
        <section>
            <div id="association_all">
            	    <span id="association_left">
                        <img src="<?php echo (VOLUNTEER_IMG_URL); ?>/3.jpg">
            	    </span>
            	    <span id="association_right">
              	    <span class="mk_title">协会章程</span>
              	    <span class="mk_text">
                      志愿者（Volunteer）联合国定义为“自愿进行社会公共利益服务而不获取任何利益、金钱、名利的活动者”，具体指在不为任何物质报酬的情况下，能够主动承担社会责任而不获取报酬，奉献个人时间和行动的人。
                    </span>
              	    <div id="go_to_association"><a href="#">点击前往</a></div>
            	    </span>
            </div>
        </section>
        <section>
            <div id="honor">
                <span><img src="<?php echo (VOLUNTEER_IMG_URL); ?>/1.jpg"></span>
                <span><img src="<?php echo (VOLUNTEER_IMG_URL); ?>/1.jpg"></span>
                <span><img src="<?php echo (VOLUNTEER_IMG_URL); ?>/1.jpg"></span>
                <span><img src="<?php echo (VOLUNTEER_IMG_URL); ?>/1.jpg"></span>
            </div>
        </section>
    </div>
    <div id="footer">
        <img src="<?php echo (VOLUNTEER_IMG_URL); ?>/footer.png">
    </div>
</div>
<script type="text/javascript" src="<?php echo (VOLUNTEER_JS_URL); ?>/jquery-3.1.1.js"></script>
<script type="text/javascript" src="<?php echo (VOLUNTEER_JS_URL); ?>/zui.js"></script>
<script type="text/javascript" src="<?php echo (VOLUNTEER_JS_URL); ?>/all.js"></script>
</body>
</html>