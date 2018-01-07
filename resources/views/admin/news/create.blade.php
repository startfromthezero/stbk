{{--@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">新增一篇文章</div>
                    <div class="panel-body">

                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <strong>新增失败</strong> 输入不符合要求<br><br>
                                {!! implode('<br>', $errors->all()) !!}
                            </div>
                        @endif

                        <form action="{{ url('admin/article') }}" method="POST">
                            {!! csrf_field() !!}
                            <input type="text" name="title" class="form-control" required="required"
                                  placeholder="请输入标题">
                            <br>
                            <textarea name="content" rows="10" class="form-control" required="required" placeholder="请输入内容"></textarea>
                            <br>
                            <button class="btn btn-lg btn-info">新增文章</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>文章添加--layui后台管理模板</title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="format-detection" content="telephone=no">
    <link rel="stylesheet" href="/layui/css/layui.css" media="all" />
    <style>
        .img-cover{
            width:100%;
            height:auto;
            border:1px solid #ddd;
        }
    </style>
</head>
<body class="childrenBody">
<form class="layui-form" action="{{ url('admin/news') }}" method="POST">
    {!! csrf_field() !!}
    <input type="hidden" name="from" value="1">
    <div class="layui-form-item">
        <label class="layui-form-label">文章标题</label>
        <div class="layui-input-block">
            <input type="text" name="title" class="layui-input" required="required" placeholder="请输入文章标题">
        </div>
    </div>
    <div class="layui-form-item">
        <div class="layui-inline">
            <label class="layui-form-label">自定义属性</label>
            <div class="layui-input-block">
                <input type="checkbox" name="is_show" class="isShow" title="展示">
                <input type="checkbox" name="is_recomm" class="isRecomm" title="推荐">
                <input type="checkbox" name="is_top" class="isTop" title="置顶">
            </div>
        </div>
        <div class="layui-inline">
            <label class="layui-form-label">文章类别</label>
            <div class="layui-input-inline">
                <select name="type_id" class="newstype" lay-filter="newstype">
                    <option value="-1">请选择类别</option>
                    <option value="1">PHP</option>
                    <option value="2">JAVA</option>
                    <option value="3">.NET</option>
                </select>
            </div>
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">关键字</label>
        <div class="layui-input-block">
            <input type="text" class="layui-input" name="keyword" placeholder="请输入文章关键字">
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">内容摘要</label>
        <div class="layui-input-block">
            <textarea placeholder="请输入内容摘要" name="synopsis" class="layui-textarea"></textarea>
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">文章内容</label>
        <div class="layui-input-block">
            <textarea class="layui-textarea layui-hide" name="content" lay-verify="content" id="news_content"></textarea>
        </div>
    </div>
    <div class="layui-form-item" style="position:relative;">
        <label class="layui-form-label">封面</label>
        <div class="layui-input-inline">
            <input name="articleCoverSrc" type="hidden" id="articleCoverSrc" value="">
            <img id="articleCoverImg" class="img-cover" src="" alt="封面">
        </div>
        <div class="layui-input-inline" style="position:absolute;bottom:0;">
            <div class="layui-box layui-upload-button">
                <button type="button" class="layui-btn layui-btn-danger" hash="" id="img-upload"><i
                            class="layui-icon"></i>上传图片
                </button>
            </div>
        </div>
    </div>
    <div class="layui-form-item">
        <div class="layui-input-block">
            <button class="layui-btn">立即提交</button>
            <button type="reset" class="layui-btn layui-btn-primary">重置</button>
        </div>
    </div>
</form>
<script type="text/javascript" src="/layui/layui.js"></script>
<script type="text/javascript" src="/js/content/newsAdd.js"></script>
</body>
</html>
--}}
@extends('admin.layouts.app')
@section('content')
    <body>
    @include('admin.partials.errors')
    <div class="layui-layer-title" style="cursor: move;">添加文章</div>
    <span class="layui-layer-setwin"><a class="layui-layer-ico layui-layer-close layui-layer-close1" href="/admin/news"></a></span>
    <form class="layui-form layui-form-pane" style="padding:40px" action="/admin/news" role="form" method="POST">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" name="from" value="1" />
        <input type="hidden" name="user_id" value="{{auth('admin')->user()->id}}" />
        @include('admin.news._form')
        <div class="layui-form-item">
            <button type="submit" class="layui-btn">保存</button>
            <button type="reset" class="layui-btn layui-btn-primary">重置</button>
        </div>
    </form>
    </body>
@endsection