{{--
@extends('admin.layouts.base')

@section('title','控制面板')

@section('pageHeader','控制面板')

@section('pageDesc','DashBoard')

@section('content')
    <div class="main animsition">
        <div class="container-fluid">

            <div class="row">
                <div class="">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">编辑用户(修改密码则填写密码)</h3>
                        </div>
                        <div class="panel-body">

                            @include('admin.partials.errors')
                            @include('admin.partials.success')
                            <form class="form-horizontal" role="form" method="POST"
                                  action="/admin/user/{{ $id }}">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="hidden" name="_method" value="PUT">
                                <input type="hidden" name="id" value="{{ $id }}">
                                @include('admin.user._form')
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
@stop
--}}
@extends('admin.layouts.app')
@section('content')
    <body>
    @include('admin.partials.errors')
    <div class="layui-layer-title" style="cursor: move;">编辑用户</div>
    <span class="layui-layer-setwin"><a class="layui-layer-ico layui-layer-close layui-layer-close1" href="/admin/user"></a></span>
    <form class="layui-form layui-form-pane" style="padding:40px" action="/admin/user/{{ $id }}" role="form" method="POST">
        {!! csrf_field() !!}
        {{ method_field('PATCH') }}
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" name="_method" value="PUT">
        <input type="hidden" name="id" value="{{ $id }}">
        @include('admin.user._form')
        <div class="layui-form-item">
            <button class="layui-btn">保存</button>
            <button type="reset" class="layui-btn layui-btn-primary">重置</button>
        </div>
    </form>
    </body>
@endsection