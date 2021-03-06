<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>权限列表--layui后台管理模板</title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="format-detection" content="telephone=no">
    <link rel="stylesheet" href="/layui/css/layui.css" media="all" />
    <link rel="stylesheet" href="//at.alicdn.com/t/font_tnyc012u2rlwstt9.css" media="all" />
    <link rel="stylesheet" href="/css/news.css" media="all" />
    <script type="text/javascript" src="/layui/layui.js"></script>
    <style>
        .img-cover{
            width:100%;
            height:auto;
            border:1px solid #ddd;
        }
    </style>
</head>
@yield('content')
<script type="text/javascript">
    layui.use('layer', function () {
        var layer = layui.layer
            @if (Session::has('success'))
            var index = layer.msg('{{ Session::get('success') }}');
            @endif
    });
</script>
</html>