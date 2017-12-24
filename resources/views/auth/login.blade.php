{{--@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Login</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Login
                                </button>

                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    Forgot Your Password?
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection--}}
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>后台管理系统登陆</title>
    <link rel="stylesheet" href="/layui/css/layui.css">
    <link rel="stylesheet" href="/css/login.css">
    <script type="text/javascript" src="/layui/layui.js"></script>
    <script type="text/javascript" src="/js/app.js"></script>
</head>
<div class="layui-carousel video_mask" id="login_carousel">
    <div carousel-item>
        <div class="carousel_div1"></div>
        <div class="carousel_div2"></div>
        <div class="carousel_div3"></div>
    </div>
    <div class="login layui-anim layui-anim-up">
        <h1>风之迷者</h1></p>
        <form class="form-horizontal" method="POST" action="{{ route('login') }}">
            {{ csrf_field() }}
            <div class="layui-form-item {{ $errors->has('username') ? ' has-error' : '' }}">
                <input id="username" class="layui-input" name="username" value="{{ old('username') }}" required autofocus>
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
            <a class="btn btn-link forgot" style="color:#ff5722" href="{{ route('password.request') }}">Forgot Your Password?</a>
        </form>
    </div>
</div>
<script type="text/javascript" src="/js/login.js"></script>
</body>
</html>