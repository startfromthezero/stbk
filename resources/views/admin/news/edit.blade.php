@extends('admin.layouts.app')
@section('content')
    <body>
    @include('admin.partials.errors')
    <div class="layui-layer-title" style="cursor: move;">编辑文章</div>
    <span class="layui-layer-setwin"><a class="layui-layer-ico layui-layer-close layui-layer-close1" href="/admin/news/"></a></span>
    <form class="layui-form layui-form-pane" style="padding:40px" action="/admin/news/{{ $id }}" role="form" method="POST">
        {!! csrf_field() !!}
        {{ method_field('PATCH') }}
        <input type="hidden" name="_method" value="PUT">
        <input type="hidden" name="id" value="{{ $id }}">
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