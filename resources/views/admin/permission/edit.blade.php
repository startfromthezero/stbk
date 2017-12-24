{{--
<div class="main animsition">
    <div class="container-fluid">

        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">编辑权限</h3>
                    </div>
                    <div class="panel-body">

                        @include('admin.partials.errors')
                        @include('admin.partials.success')
                        <form class="form-horizontal" role="form" method="POST"
                              action="/admin/permission/{{ $id }}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="_method" value="PUT">
                            <input type="hidden" name="id" value="{{ $id }}">
                            @include('admin.permission._form')
                            <div class="form-group">
                                <div class="col-md-7 col-md-offset-3">
                                    <button type="submit" class="btn btn-primary btn-md">
                                        <i class="fa fa-plus-circle"></i>
                                        保存
                                    </button>
                                </div>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
--}}
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>编辑权限--layui后台管理模板</title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="format-detection" content="telephone=no">
    <link rel="stylesheet" href="/layui/css/layui.css" media="all" />
    <style>
        .layui-input-block{margin-right:80px}
    </style>
</head>
<body class="childrenBody">
<form class="layui-form" action="/admin/permission/{{ $id }}" role="form" method="POST">
    {!! csrf_field() !!}
    {{ method_field('PATCH') }}
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="hidden" name="_method" value="PUT">
    <input type="hidden" name="id" value="{{ $id }}">
    <input type="hidden" name="cid" id="tag" value="{{ $cid }}" autofocus>
    @include('admin.permission._form')
    <div class="layui-form-item">
        <div class="layui-input-block">
            <button class="layui-btn">保存</button>
            <button type="reset" class="layui-btn layui-btn-primary">重置</button>
        </div>
    </div>
</form>
<script type="text/javascript" src="/layui/layui.js"></script>
</body>
</html>
