<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>发现Laravel 5.5之美</title>
    <link rel="stylesheet" href="/css/app.css">
</head>
<body style="padding-top: 100px;">
<div class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand hidden-sm" href="/">Laravel新手上路</a>
        </div>
        <ul class="nav navbar-nav navbar-right hidden-sm">
            <li><a href="user/register">注册</a></li>
            <li><a href="user/login">登陆</a></li>
        </ul>
    </div>
</div>
<div class="container">
    @if(Session::has('message'))
        <p class="alert">{{ Session::get('message') }}</p>
    @endif
</div>
<div class="container">
    @yield('content')
</div>
</body>
</html>