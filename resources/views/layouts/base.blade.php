<!DOCTYPE html>
<html class="no-js">
<head>
    <meta charset="utf-8">
    <title>基于 layui 的极简社区页面模版</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="keywords" content="fly,layui,前端社区">
    <meta name="description" content="Fly社区是模块化前端UI框架Layui的官网社区，致力于为web开发提供强劲动力">
    <meta name="_token" content="{{ csrf_token() }}" />
    <link rel="stylesheet" href="/css/font_24081_aym082o86np3z0k9.css">
    <link rel="stylesheet" href="/layui/css/layui.css">
    <link rel="stylesheet" href="/css/global.css">
    <script src="/js/jquery.min.js"></script>
    <!--
    <link rel="stylesheet" type="text/css" href="/canvas/css/component.css" />
    <link rel="stylesheet" type="text/css" href="/canvas/css/normalize.css" />
    <link rel="stylesheet" type="text/css" href="/canvas/css/demo.css" />
-->
</head>
<body>
<div class="fly-header layui-bg-green">
    <div class="layui-container">
        <a class="fly-logo" href="/">
            @include('layouts.svg')
        </a>
        <ul class="layui-nav fly-nav layui-hide-xs">
            <li class="layui-nav-item layui-this">
                <a href="/"><i class="iconfont icon-jiaoliu"></i>交流</a>
            </li>
            <li class="layui-nav-item">
                <a href="../case/case.html"><i class="iconfont icon-iconmingxinganli"></i>案例</a>
            </li>
            <li class="layui-nav-item">
                <a href="http://www.layui.com/" target="_blank"><i class="iconfont icon-ui"></i>框架</a>
            </li>
        </ul>

        <ul class="layui-nav fly-nav-user">

            <!-- 未登入的状态 -->
            @guest
            <li class="layui-nav-item">
                <a class="iconfont icon-touxiang layui-hide-xs" href="user/login.html"></a>
            </li>
            <li class="layui-nav-item">
                <a href="/login">登入</a>
            </li>
            <li class="layui-nav-item">
                <a href="{{ url('/register') }}">注册</a>
            </li>
            <li class="layui-nav-item layui-hide-xs">
                <a href="/user/qqlogin/" onclick="layer.msg('正在通过QQ登入', {icon:16, shade: 0.1, time:0})" title="QQ登入" class="iconfont icon-qq"></a>
            </li>
            <li class="layui-nav-item layui-hide-xs">
                <a href="/app/weibo/" onclick="layer.msg('正在通过微博登入', {icon:16, shade: 0.1, time:0})" title="微博登入" class="iconfont icon-weibo"></a>
            </li>
            <li class="layui-nav-item layui-hide-xs">

                <!--点击此元素会自动激活验证码-->
                <!--id : 元素的id(必须)-->
                <!--data-appid : AppID(必须)-->
                <!--data-cbfn : 回调函数名(必须)-->
                <button id="TencentCaptcha" data-appid="2000100519" data-cbfn="callback">验证</button>
            </li>
            @else
            <!-- 登入后的状态 -->
            <li class="layui-nav-item">
              <a class="fly-nav-avatar" href="javascript:;">
                <cite class="layui-hide-xs">{{ Auth::user()->name }}</cite>
                <i class="iconfont icon-renzheng layui-hide-xs" title="认证信息：layui 作者"></i>
                <i class="layui-badge fly-badge-vip layui-hide-xs">VIP3</i>
                <img src="https://tva1.sinaimg.cn/crop.0.0.118.118.180/5db11ff4gw1e77d3nqrv8j203b03cweg.jpg">
              </a>
              <dl class="layui-nav-child">
                <dd><a href="/user/set"><i class="layui-icon">&#xe620;</i>基本设置</a></dd>
                <dd><a href="/user/message"><i class="iconfont icon-tongzhi" style="top: 4px;"></i>我的消息</a></dd>
                <dd><a href="/home"><i class="layui-icon" style="margin-left: 2px; font-size: 22px;">&#xe68e;</i>我的主页</a></dd>
                <hr style="margin: 5px 0;">
                <dd>
                    <a href="javascript:" onclick="event.preventDefault();document.getElementById('logout-form').submit();" style="text-align: center;">退出</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </dd>
              </dl>
            </li>
            @endguest
        </ul>
    </div>
</div>
@yield('content')
<div class="fly-footer">
    <p><a href="http://fly.layui.com/" target="_blank">Fly社区</a> 2017 &copy; <a href="http://www.layui.com/" target="_blank">layui.com 出品</a></p>
    <p>
        <a href="http://fly.layui.com/jie/3147/" target="_blank">付费计划</a>
        <a href="http://www.layui.com/template/fly/" target="_blank">获取Fly社区模版</a>
        <a href="http://fly.layui.com/jie/2461/" target="_blank">微信公众号</a>
    </p>
</div>
<script src="/layui/layui.js"></script>
<script>
    function callback(res)
    {
        console.log(res)
        //res（未通过验证）= {ret:1,ticket:null}
        //res（验证成功） = {ret:0,ticket:"String"}
        if (res.ret == 0)
        {
            alert(res.ticket)   // 票据
        }
    }

    var count = 10, nums = 20, curr = 1;

    layui.cache.page = 'jie';
    layui.cache.user = {
        username    : '游客'
        , uid       : -1
        , avatar    : '/images/avatar/00.jpg'
        , experience: 83
        , sex       : '男'
    };
    layui.config({
        version: "3.0.0"
        , base : '/mods/'
    }).extend({
        fly: 'index'
    }).use('fly');
</script>

</body>
</html>