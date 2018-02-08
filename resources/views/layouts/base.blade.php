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
                    <a href="javascript:QC.Login.signOut();" onclick="event.preventDefault();document.getElementById('logout-form').submit();" style="text-align: center;">退出</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </dd>
              </dl>
            </li>
            @endguest
            <li class="layui-nav-item layui-hide-xs">
                <!--<a href='javascript:QC.Login.showPopup({appId :"101462624",redirectURI: "http://www.stbk.xyz/callback.php",scope:"get_user_info"})'>登陆</a>-->
                <a href='/Connect2.1'>登陆</a>
            </li>
            <li class="layui-nav-item">
                <a href="javascript:QC.Login.signOut();">退出</a>
            </li>
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
<script type="text/javascript" src="http://qzonestyle.gtimg.cn/qzone/openapi/qc_loader.js" data-appid="101462624" data-redirecturi="http://www.stbk.xyz/callback.php" charset="utf-8"></script>

<script src="/layui/layui.js"></script>
<!--
<script src="/canvas/js/TweenLite.min.js"></script>
<script src="/canvas/js/EasePack.min.js"></script>
<script src="/canvas/js/rAF.js"></script>
<script src="/canvas/js/demo-1.js"></script>
-->
<script>
    //调用QC.Login方法，指定btnId参数将按钮绑定在容器节点中
//    QC.Login({
//                //btnId：插入按钮的节点id，必选
//                btnId: "qqLoginBtn",
//                //用户需要确认的scope授权项，可选，默认all
//                scope: "all",
//                //按钮尺寸，可用值[A_XL| A_L| A_M| A_S|  B_M| B_S| C_S]，可选，默认B_S
//                size : "A_XL"
//            }, function (reqData, opts)
//            {//登录成功
//                var nickname =QC.String.escHTML(reqData.nickname), figureurl = reqData.figureurl;
//
//                console.log(reqData);
                //根据返回数据，更换按钮显示状态方法
//                var dom = document.getElementById(opts['btnId']),
//                        _logoutTemplate = [
//                            //头像
//                            '<span><img src="{figureurl}" class="{size_key}"/></span>',
//                            //昵称
//                            '<span>{nickname}</span>',
//                            //退出
//                            '<span><a href="javascript:QC.Login.signOut();">退出</a></span>'
//                        ].join("");
//                dom && (dom.innerHTML = QC.String.format(_logoutTemplate, {
//
//                }));
//                $.ajax({
//                    type    : 'post',
//                    url     : '/user/qqlogin',
//                    dataType: 'json',
//                    data    : {name: nick, img: headurl, openid: openId, accesstoken: accessToken},
//                    headers : {
//                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
//                    },
//                    success : function (res)
//                    {
//                        console.log(res);
//                        window.location.reload();
//                        if (res.status === 0)
//                        {
//                            success && success(res);
//                        }
//                        else
//                        {
//                            layer.msg(res.msg || res.code, {shift: 6});
//                            options.error && options.error();
//                        }
//                    }, error: function (e)
//                    {
//                        layer.msg('请求异常，请重试', {shift: 6});
//                        options.error && options.error(e);
//                    }
//                });

//            }, function (opts)
//            {//注销成功
//                alert('QQ登录 注销成功');
//
//            }
//    );

    //从页面收集OpenAPI必要的参数。get_user_info不需要输入参数，因此paras中没有参数
//    var paras = {};
//    QC.api("get_user_info", {}).success(function (s)
//    {
//        //成功回调，通过s.data获取OpenAPI的返回数据
//        nick = s.data.nickname; //获得昵称
//        headurl = s.data.figureurl_qq_1; //获得头像
//        if (QC.Login.check())
//        {//判断是否登录
//            QC.Login.getMe(function (openId, accessToken)
//            { //这里可以得到openId和accessToken
//                //下面可以调用自己的保存方法
//                $.ajax({
//                    type:'post',
//                    url:'/user/qqlogin',
//					dataType:'json',
//					data:{name: nick,img: headurl,openid: openId, accesstoken: accessToken},
//					headers: {
//						'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
//					},
//					success:function(res){
//                    	console.log(res);
                        //window.location.reload();
//						if (res.status === 0){
//							success && success(res);
//						}
//						else{
//							layer.msg(res.msg || res.code, {shift: 6});
//							options.error && options.error();
//						}
//                    }, error: function (e) {
//						layer.msg('请求异常，请重试', {shift: 6});
//						options.error && options.error(e);
//					}
//                });
//            });
//        }
//    }).error(function (f)
//    {
//        //失败回调
//        alert("获取用户信息失败！");
//    });
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