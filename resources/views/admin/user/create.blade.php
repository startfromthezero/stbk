@extends('admin.layouts.app')
@section('content')
    <body>
    @include('admin.partials.errors')
    <div class="layui-layer-title" style="cursor: move;">添加用户</div>
    <span class="layui-layer-setwin"><a class="layui-layer-ico layui-layer-close layui-layer-close1"
                                        href="/admin/user"></a></span>
    <form class="layui-form layui-form-pane" style="padding:40px" action="/admin/user" role="form" method="POST">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" name="cove_image" />
        @include('admin.user._form')
        <div class="layui-form-item">
            <button type="submit" class="layui-btn">保存</button>
            <button type="reset" class="layui-btn layui-btn-primary">重置</button>
        </div>
    </form>
    </body>
@endsection