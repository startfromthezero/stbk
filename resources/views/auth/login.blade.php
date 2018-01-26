@extends('layouts.base')
@section('content')
    <div class="layui-container fly-marginTop">
        <div class="fly-panel fly-panel-user" pad20>
            <div class="layui-tab layui-tab-brief" lay-filter="user">
                <ul class="layui-tab-title">
                    <li class="layui-this">登入</li>
                    <li><a href="/register">注册</a></li>
                </ul>
                <div class="layui-form layui-tab-content" id="LAY_ucm" style="padding: 20px 0;">
                    <div class="layui-tab-item layui-show">
                        <div class="layui-form layui-form-pane">
                            <form method="POST" action="{{ route('login') }}">
                                {{ csrf_field() }}
                                <div class="layui-form-item">
                                    <label for="L_email" class="layui-form-label">邮箱</label>
                                    <div class="layui-input-inline">
                                        <input type="text" name="email" required lay-verify="required" autocomplete="off" class="layui-input" value="{{ old('email') }}">
                                    </div>
                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="layui-form-item">
                                    <label for="L_pass" class="layui-form-label">密码</label>
                                    <div class="layui-input-inline">
                                        <input type="password" id="L_pass" name="password" autocomplete="off" class="layui-input">
                                    </div>
                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="layui-form-item">
                                    <button class="layui-btn" type="submit">立即登录</button>
                                    <span style="padding-left:20px;"><a href="{{ route('password.request') }}">忘记密码？</a></span>
                                </div>
                                <div class="layui-form-item fly-form-app">
                                    <span>或者使用社交账号登入</span>
                                    <a href="" onclick="layer.msg('正在通过QQ登入', {icon:16, shade: 0.1, time:0})"
                                       class="iconfont icon-qq" title="QQ登入"></a>
                                    <a href="" onclick="layer.msg('正在通过微博登入', {icon:16, shade: 0.1, time:0})"
                                       class="iconfont icon-weibo" title="微博登入"></a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
