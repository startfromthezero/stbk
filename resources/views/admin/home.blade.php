{{-- @extends('layouts.app')

@section('content')
      <div class="container">
           <div class="row">
               <div class="col-md-10 col-md-offset-1">
                   <div class="panel panel-default">
                       <div class="panel-heading">Dashboard</div>

                       <div class="panel-body">

                           <a href="{{ url('admin/article') }}" class="btn btn-lg btn-success col-xs-12">管理文章</a>

                       </div>
                   </div>
               </div>
           </div>
       </div>
@endsection--}}
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>首页--layui后台管理模板</title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="format-detection" content="telephone=no">
    <link rel="stylesheet" href="//at.alicdn.com/t/font_tnyc012u2rlwstt9.css" media="all" />
    <link rel="stylesheet" href="/layui/css/layui.css">
    <link rel="stylesheet" href="/css/main.css" media="all">
</head>
<body class="childrenBody">
<div class="panel_box row">
    <div class="panel col">
        <a href="javascript:;" data-url="/content/message">
            <div class="panel_icon">
                <i class="layui-icon" data-icon="&#xe63a;">&#xe63a;</i>
            </div>
            <div class="panel_word newMessage">
                <span></span>
                <cite>新消息</cite>
            </div>
        </a>
    </div>
    <div class="panel col">
        <a href="javascript:;" data-url="/user/user">
            <div class="panel_icon" style="background-color:#FF5722;">
                <i class="iconfont icon-dongtaifensishu" data-icon="icon-dongtaifensishu"></i>
            </div>
            <div class="panel_word userAll">
                <span></span>
                <cite>新增人数</cite>
            </div>
        </a>
    </div>
    <div class="panel col">
        <a href="javascript:;" data-url="/user/user">
            <div class="panel_icon" style="background-color:#009688;">
                <i class="layui-icon" data-icon="&#xe613;">&#xe613;</i>
            </div>
            <div class="panel_word userAll">
                <span></span>
                <cite>用户总数</cite>
            </div>
        </a>
    </div>
    <div class="panel col">
        <a href="javascript:;" data-url="/content/img">
            <div class="panel_icon" style="background-color:#5FB878;">
                <i class="layui-icon" data-icon="&#xe64a;">&#xe64a;</i>
            </div>
            <div class="panel_word imgAll">
                <span></span>
                <cite>图片总数</cite>
            </div>
        </a>
    </div>
    <div class="panel col">
        <a href="javascript:;" data-url="/content/news">
            <div class="panel_icon" style="background-color:#F7B824;">
                <i class="iconfont icon-wenben" data-icon="icon-wenben"></i>
            </div>
            <div class="panel_word waitNews">
                <span></span>
                <cite>待审核文章</cite>
            </div>
        </a>
    </div>
    <div class="panel col max_panel">
        <a href="javascript:;" data-url="/content/news">
            <div class="panel_icon" style="background-color:#2F4056;">
                <i class="iconfont icon-text" data-icon="icon-text"></i>
            </div>
            <div class="panel_word allNews">
                <span></span>
                <em>文章总数</em>
                <cite>文章列表</cite>
            </div>
        </a>
    </div>
</div>
<blockquote class="layui-elem-quote explain">
</blockquote>
<div class="row">
    <div class="sysNotice col">
        <blockquote class="layui-elem-quote title">更新日志</blockquote>
        <div class="layui-elem-quote layui-quote-nm">
            <h3># v1.0.1（优化） - 2017-06-25</h3>
        </div>
    </div>
    <div class="sysNotice col">
        <blockquote class="layui-elem-quote title">系统基本参数</blockquote>
        <blockquote class="layui-elem-quote title">最新文章<i class="iconfont icon-new1"></i></blockquote>
        <table class="layui-table" lay-skin="line">
            <colgroup>
                <col>
                <col width="110">
            </colgroup>
            <tbody class="hot_news"></tbody>
        </table>
    </div>
</div>

<script type="text/javascript" src="/layui/layui.js"></script>
<script type="text/javascript" src="/js/main.js"></script>
</body>
</html>

