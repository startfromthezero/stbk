<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>文章列表--layui后台管理模板</title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="format-detection" content="telephone=no">
    <link rel="stylesheet" href="/layui/css/layui.css" media="all" />
    <link rel="stylesheet" href="//at.alicdn.com/t/font_tnyc012u2rlwstt9.css" media="all" />
    <link rel="stylesheet" href="/css/news.css" media="all" />
</head>
<body class="childrenBody">
<blockquote class="layui-elem-quote news_search">
    <div class="layui-inline">
        <div class="layui-input-inline">
            <input type="text" value="" placeholder="请输入关键字" class="layui-input search_input">
        </div>
        <a class="layui-btn search_btn">查询</a>
    </div>
    <div class="layui-inline">
        <a href="{{ url('admin/news/create') }}" class="layui-btn layui-btn-normal">添加文章</a>
    </div>
    <div class="layui-inline">
        <a class="layui-btn recommend" style="background-color:#5FB878">推荐文章</a>
    </div>
    <div class="layui-inline">
        <a class="layui-btn layui-btn-danger batchDel">批量删除</a>
    </div>
</blockquote>
<div class="layui-form news_list">
    <table class="layui-table">
        <colgroup>
            <col width="50">
            <col>
            <col width="9%">
            <col width="9%">
            <col width="9%">
            <col width="9%">
            <col width="15%">
            <col width="15%">
        </colgroup>
        <thead>
        <tr>
            <th><input type="checkbox" name="" lay-skin="primary" lay-filter="allChoose" id="allChoose"></th>
            <th style="text-align:left;">文章标题</th>
            <th>发布人</th>
            <th>是否展示</th>
            <th>是否推荐</th>
            <th>是否置顶</th>
            <th>发布时间</th>
            <th>操作</th>
        </tr>
        </thead>
        <tbody class="news_content">
        @foreach ($news as $new)
            <tr>
                <td><input type="checkbox" name="checked" lay-skin="primary" lay-filter="choose"></td>
                <td style="text-align:left;">{{ $new->title }}</td>
                <td>{{ $new->user_id }}</td>
                <td><input type="checkbox" name="is_show" lay-skin="switch" lay-text="是|否"></td>
                <td><input type="checkbox" name="is_recomm" lay-skin="switch" lay-text="是|否"></td>
                <td><input type="checkbox" name="is_top" lay-skin="switch" lay-text="是|否"></td>
                <td>{{ $new->created_at }}</td>
                <td><a href="{{ url('admin/news/'. $new->news_id .'/edit') }}" class="layui-btn layui-btn-mini"><i class="iconfont icon-edit"></i> 编辑</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
<div id="page"></div>
<script type="text/javascript" src="/layui/layui.js"></script>
<script type="text/javascript" src="/js/content/newsList.js"></script>
</body>
</html>