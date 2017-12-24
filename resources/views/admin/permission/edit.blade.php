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
@extends('admin.layouts.app')
@section('content')
@include('admin.partials.errors')
@include('admin.partials.success')
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
@endsection
