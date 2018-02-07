<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>后台管理系统登陆</title>
    <link rel="stylesheet" href="/layui/css/layui.css">
    <link rel="stylesheet" href="/css/login.css">
    <link rel="stylesheet" type="text/css" href="/canvas/css/component.css" />
    <link rel="stylesheet" type="text/css" href="/canvas/css/normalize.css" />
    <script type="text/javascript" src="/layui/layui.js"></script>
    <script type="text/javascript" src="/js/app.js"></script>
</head>
<body>
@include('admin.partials.errors')
@include('admin.partials.success')
<div class="layui-carousel video_mask" id="login_carousel">
    <div carousel-item>
        <div class="container demo-1">
            <div class="content">
                <div id="large-header" class="large-header">
                    <canvas id="demo-canvas"></canvas>
                </div>
            </div>
        </div>
    </div>
    <div class="login layui-anim layui-anim-up">
        <h1>风之迷者</h1></p>
        <form class="form-horizontal" method="POST" action="{{ url('/admin/login') }}">
            {{ csrf_field() }}
            <div class="layui-form-item {{ $errors->has('username') ? ' has-error' : '' }}">
                <input id="username" class="layui-input" name="username" value="{{ old('username') }}" required
                       autofocus>
                @if ($errors->has('username'))
                    <span class="help-block"><strong>{{ $errors->first('username') }}</strong></span>
                @endif
            </div>
            <div class="layui-form-item{{ $errors->has('password') ? ' has-error' : '' }}">
                <input id="password" type="password" class="layui-input" name="password" required>
                @if ($errors->has('password'))
                    <span class="help-block"><strong>{{ $errors->first('password') }}</strong></span>
                @endif
            </div>
            <div style="padding-bottom:10px"><input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                <span style="color:#fff">Remember Me</span>
            </div>
            <button type="submit" class="layui-btn login_btn">登陆系统</button>
            <a class="layui-btn login_btn layui-btn-warm" href="{{ url('/register') }}">注册</a>
            <!--<a class="btn btn-link forgot" style="color:#ff5722" href="">Forgot Your Password?</a>-->
        </form>
    </div>
</div>
<script type="text/javascript" src="/js/login.js"></script>
<script src="/canvas/js/TweenLite.min.js"></script>
<script src="/canvas/js/EasePack.min.js"></script>
<script src="/canvas/js/rAF.js"></script>
<script src="/canvas/js/demo-1.js"></script>
</body>
</html>