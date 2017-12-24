{{--
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <link href="//cdn.bootcss.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
    <script src="//cdn.bootcss.com/jquery/1.11.1/jquery.min.js"></script>
    <script src="//cdn.bootcss.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
</head>
<body id="app-layout">
<nav class="navbar navbar-default navbar-static-top">
    <div class="container">
        <div class="navbar-header">

            <!-- Collapsed Hamburger -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#app-navbar-collapse">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <!-- Branding Image -->
            <a class="navbar-brand" href="{{ url('/') }}">
                Laravel
            </a>
        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <!-- Left Side Of Navbar -->
            <ul class="nav navbar-nav">
                <li><a href="{{ url('/admin') }}">Home</a></li>
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
                <!-- Authentication Links -->
                @if (Auth::guest())
                    <li><a href="{{ url('/login') }}">Login</a></li>
                    <li><a href="{{ url('/register') }}">Register</a></li>
                @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            <li><a href="{{ url('/logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                            <form id="logout-form" action="{{ url('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </ul>
                    </li>
                @endif
            </ul>
        </div>
    </div> 
</nav>

@yield('content')

</body>
</html>
--}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>
    <script type="text/javascript" src="/js/app.js"></script>
    <link rel="stylesheet" href="//at.alicdn.com/t/font_tnyc012u2rlwstt9.css" media="all" />
    <link rel="stylesheet" href="/layui/css/layui.css">
    <link rel="stylesheet" href="/css/main.css" media="all">
    <script type="text/javascript" src="/layui/layui.js"></script>
    <script type="text/javascript" src="/js/leftNav.js"></script>
    <script type="text/javascript" src="/js/index.js"></script>
    <style>
        body .demo-class .layui-layer-title{
            background:#c00;
            color:#fff;
            border:none;

        }

        body .demo-class .layui-layer-btn{
            border-top:1px solid #E9E7E7
        }

        body .demo-class .layui-layer-btn a{
            background:#E47214;
        }

        body .demo-class .layui-layer-btn .layui-layer-btn1{
            background:#999;
        }
    </style>
</head>
<body class="main_body larryTheme-A">
<div class="layui-layout layui-layout-admin">
    <!-- 顶部 -->
    <div class="layui-side layui-bg-black">
        <div class="user-photo">
            <a class="img" title="我的头像"><img src="/img/tongshao.jpg"></a>
            <p>你好！<span class="userName">请叫我通少</span>, 欢迎登录</p>
        </div>
        <div class="navBar layui-side-scroll">
            <ul class="layui-nav layui-nav-tree">
                <li class="layui-nav-item">
                    <a href="javascript:;" data-url="#">
                        <i class="iconfont icon-computer" data-icon="icon-computer"></i>
                        <cite>首页</cite>
                    </a>
                </li>
                <li class="layui-nav-item">
                    <a href="javascript:;" data-url="#">
                        <i class="iconfont icon-computer" data-icon="icon-computer"></i>
                        <cite>内容管理</cite>
                        <span class="layui-nav-more"></span>
                    </a>
                    <dl class="layui-nav-child">
                        <dd>
                            <a href="javascript:;" data-url="{{ url('/admin/news') }}" target="_blank">
                                <i class="iconfont icon-text" data-icon="icon-text"></i>
                                <cite>文章列表</cite>
                            </a>
                        </dd>
                    </dl>
                </li>
            </ul>
        </div>
    </div>
    <!-- 右侧内容 -->
    <div class="layui-body layui-form">
        <div class="layui-tab marg0" lay-filter="bodyTab" id="top_tabs_box">
            <ul class="layui-tab-title top_tab" id="top_tabs">
                <li class="layui-this" lay-id=""><i class="iconfont icon-computer"></i> <cite>后台首页</cite></li>
            </ul>
            <ul class="layui-nav closeBox">
                <li class="layui-nav-item">
                    <a href="javascript:;"><i class="iconfont icon-caozuo"></i> 页面操作</a>
                    <dl class="layui-nav-child">
                        <dd><a href="javascript:;" class="refresh refreshThis"><i class="layui-icon">&#x1002;</i>
                                刷新当前</a></dd>
                        <dd><a href="javascript:;" class="closePageOther"><i class="iconfont icon-prohibit"></i>
                                关闭其他</a></dd>
                        <dd><a href="javascript:;" class="closePageAll"><i class="iconfont icon-guanbi"></i> 关闭全部</a>
                        </dd>
                    </dl>
                </li>
            </ul>
            <div class="layui-tab-content clildFrame">
                <div class="layui-tab-item layui-show">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
    <!-- 底部 -->
    <div class="layui-footer footer layui-larry-foot">
        <div class="layui-main">
            <p>Copyright 2017 © yangxiaobing,873559947@qq.com(推荐使用IE9+,Firefox、Chrome 浏览器访问)</p>
        </div>
    </div>
    <!-- 移动导航 -->
    <div class="site-tree-mobile layui-hide"><i class="layui-icon">&#xe602;</i></div>
    <div class="site-mobile-shade"></div>
</div>
</body>
</html>
