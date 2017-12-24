<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>RunJS</title>
    <link id="bootstrap_221" rel="stylesheet" type="text/css" class="library"
          href="/css/app.css">
    <script id="jquery_172" type="text/javascript" class="library"
            src="/js/jquery.min.js"></script>
    <script id="bootstrap_221" type="text/javascript" class="library"
            src="/js/app.js"></script>
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <!-- 侧边栏 -->
        <div class="sidebar">
            <h4>博客管理系统(四月)</h4>
            <div class="cover">
                <h2><img class="img-circle" src="http://sandbox.runjs.cn/uploads/rs/138/fv8h54pu/icon_face.jpg" /></h2>
                <b>Hi~ 小主</b>
                <p>超级管理员</p>
            </div>
            <ul class="sidenav animated fadeInUp">
                <li><a class="withripple" href=""><i class="icon icon-home"></i><span class="sidespan">首页</span></a>
                </li>
                <li><a class="withripple hover" href="javascript:;"><i class="icon icon-article"></i><span
                                class="sidespan">文章管理</span><i class="iright pull-right">&gt;</i></a>
                    <ul class="sidebar-dropdown">
                        <li><a href="list.html" class="withripple" target="myframe">文章列表</a></li>
                        <li><a href="add.html" class="withripple" target="myframe">添加文章</a></li>
                    </ul>
                </li>
                <li><a class="withripple" href="javascript:;"><i class="icon icon-ui"></i><span
                                class="sidespan">UI设计</span><i class="iright pull-right">&gt;</i></a>
                    <ul class="sidebar-dropdown">
                        <li><a href="" class="withripple">UI设计列表</a></li>
                        <li><a href="" class="withripple">添加作品</a></li>
                    </ul>
                </li>
                <li><a class="withripple" href="javascript:;"><i class="icon icon-web"></i><span
                                class="sidespan">WEB前端</span><i class="iright pull-right">&gt;</i></a>
                    <ul class="sidebar-dropdown">
                        <li><a href="" class="withripple">文章列表</a></li>
                        <li><a href="" class="withripple">添加WEB作品</a></li>
                    </ul>
                </li>
                <li><a class="withripple" href="javascript:;"><i class="icon icon-php"></i><span
                                class="sidespan">PHP后台</span><i class="iright pull-right">&gt;</i></a>
                    <ul class="sidebar-dropdown">
                        <li><a href="" class="withripple">PHP项目</a></li>
                        <li><a href="" class="withripple">添加项目</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <!-- 侧边栏 完-->

        <!-- 主体部分  -->
        <div class="main">
            <div class="main-title">
                <ul class="nav navbar-nav navbar-left navbar-side">
                    <li><a href=""><i class="icon icon-menu"></i>111</a></li>
                </ul>
            </div>
        </div>
        <!-- 主体部分 完 -->
    </div>
</div>
</body>
</html>
<style>/* 只是针对bootstrap-2.2.1 */
    [class*="span"]{
        float:none;
        min-width:auto;
        margin-left:0;
    }

    @font-face{
        font-family:'iconfont';
        src:url('//at.alicdn.com/t/font_1474372709_4341202.eot'); /* IE9*/
        src:url('//at.alicdn.com/t/font_1474372709_4341202.eot?#iefix') format('embedded-opentype'), /* IE6-IE8 */ url('//at.alicdn.com/t/font_1474372709_4341202.woff') format('woff'), /* chrome、firefox */ url('//at.alicdn.com/t/font_1474372709_4341202.ttf') format('truetype'), /* chrome、firefox、opera、Safari, Android, iOS 4.2+*/ url('//at.alicdn.com/t/font_1474372709_4341202.svg#iconfont') format('svg'); /* iOS 4.1- */
    }

    .icon{
        font-family:"iconfont" !important;
        font-size:16px;
        font-style:normal;
        -webkit-font-smoothing:antialiased;
        -webkit-text-stroke-width:0.2px;
        -moz-osx-font-smoothing:grayscale;
    }

    .icon-home:before{
        content:"\e605";
    }

    .icon-article:before{
        content:"\e604";
    }

    .icon-ui:before{
        content:"\e601";
    }

    .icon-web:before{
        content:"\e606";
    }

    .icon-php:before{
        content:"\e603";
    }

    .icon-menu:before{
        content:"\e608";
    }

    .icon-setting:before{
        content:"\e600";
    }

    /* sidebar
     ---------------------------------------- */
    .sidebar{
        position:fixed;
        width:215px;
        height:100%;
        background:#262930;
        transition:all .3s ease;
    }

    .sidebar > h4{
        margin:0;
        padding:18px 10px;
        background:#00bfa5;
        color:#fff;
        font-size:18px;
        font-weight:normal;
        white-space:nowrap;
    }

    .cover{
        padding-top:40px;
        padding-bottom:10px;
        text-align:center;
        background:#20242c;
    }

    .cover > h2{
        position:relative;
        margin:0 auto;
        max-height:80px;
        max-width:80px;
        background:#3d4147;
        border:1px solid #1ab394;
        border-radius:50%;
    }

    .cover > h2 img{
        position:relative;
        z-index:100;
        width:100%;
        margin-left:-5px;
        border:1px solid #1ab394;
    }

    .cover > h2:after{
        content:'';
        position:absolute;
        left:-12px;
        top:-8px;
        height:96px;
        width:96px;
        background:#3d4147;
        border-radius:50%;
    }

    .cover > b{
        display:block;
        margin-top:20px;
        color:#f3f3f4;
        font-size:13px;
    }

    .cover > p{
        margin-top:4px;
        color:#acb0b8;
        font-size:12px;
    }

    /*sidenav*/
    .sidenav, .sidebar-dropdown{
        margin:0;
        padding:0;
    }

    .sidenav a{
        color:#9d9d9d;
    }

    .sidenav > li > a{
        display:block;
        padding:10px;
        font-size:14px;
        border-left:2px solid transparent;
        transition:.3s linear;
    }

    .sidenav > li > a > i{
        margin-right:10px;
    }

    .sidenav > li > a.hover,
    .sidenav > li > a:hover{
        border-left:2px solid #21b496;
        background:#20242c;
        text-decoration:none;
    }

    .iright{
        margin-top:4px;
        font-family:"宋体";
        font-style:normal;
    }

    .sidebar-dropdown{
        display:none;
        font-size:14px;
        background:#20242c;
        border-left:2px solid #21b496;
    }

    .sidebar-dropdown > li > a{
        display:block;
        padding:10px 0 10px 36px;
    }

    /*伸缩侧边css代码*/
    .sidebar-collapse .main{
        margin-left:60px;
    }

    .sidebar-collapse .sidebar{
        width:60px;
    }

    .sidebar-collapse .sidenav > li{
        position:relative;
        z-index:9999;
        text-align:center;
    }

    .sidebar-collapse .sidenav > li:hover > a{
        border-left:2px solid #21b496;
        background:#20242c;
        text-decoration:none;
    }

    .sidebar-collapse .sidenav > li:hover .sidebar-dropdown{
        display:block !important;
    }

    .sidebar-collapse .cover > b{
        font-size:12px;
    }

    .sidebar-collapse .cover > p,
    .sidebar-collapse .sidespan,
    .sidebar-collapse .iright,
    .sidebar-collapse .cover > h2:after{
        display:none;
    }

    .sidebar-collapse .cover{
        padding-top:30px;
    }

    .sidebar-collapse .cover > h2{
        margin:6px;
    }

    .sidebar-collapse .sidebar-dropdown{
        position:absolute;
        top:0;
        left:60px;
        z-index:9999;
        display:none !important;
        width:150px;
        border-left:none;
        list-style:none;
    }

    .sidebar-collapse .sidebar-dropdown > li > a{
        padding-left:0;
    }

    .sidebar-collapse .sidebar-dropdown > li > a:hover{
        background:#191e26;
        text-decoration:none;
        color:#fff;
    }

    .sidebar-collapse .cover > h2 img{
        margin-left:0;
        border:none;
    }

    /* main
     ---------------------------------------- */
    .main{
        overflow:hidden;
        margin-left:215px;
        transition:all .3s ease;
        padding-top:50px;
    }

    .main-title{
        background:#fff;
        height:50px;
        border-bottom:1px solid #e5e4e4;
        position:fixed;
        top:0;
        width:100%;
    }

    .navbar-left{
        float:left;
        margin:15px 0 0 15px;
    }

    .navbar-side > li > a{
        color:#666;
    }

    .navbar-side > li > a:hover, .navbar-side > li > a:focus, .navbar-side > li > a:active{
        background:none;
    }</style>
<script>/* 侧边栏切换形态 */
	$(".navbar-side a").click(function () {
		$("body").toggleClass("sidebar-collapse");
		if ($("body").hasClass("sidebar-collapse"))
		{
			$(".sidebar > h4").html("博客");
		}
		else
		{
			$(".sidebar > h4").html("博客管理系统(四月)");
		}
		return false;
	})

	$(".sidenav>li>a").click(function () {
		$(this).addClass("hover");
		$(this).next().slideToggle();
		$(this).parent().siblings().children("a").removeClass("hover").next().slideUp();

	})</script>

<!-- Generated by RunJS (Sun Dec 24 16:16:18 CST 2017) 1ms -->