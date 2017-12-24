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
    <link href="//netdna.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
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
    @include('admin.layouts.mainHeader')
    <!-- 右侧内容 -->
    @include('admin.layouts.mainSidebar')
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
    @include('admin.layouts.mainFooter')
</div>
</body>
</html>