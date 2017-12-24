{{--


<div class="form-group">
    <label for="tag" class="col-md-3 control-label">权限规则</label>
    <div class="col-md-6">
        <input type="text" class="form-control" name="name" id="tag" value="{{ $name }}" autofocus>
        <input type="hidden" class="form-control" name="cid" id="tag" value="{{ $cid }}" autofocus>
    </div>
</div>
<div class="form-group">
    <label for="tag" class="col-md-3 control-label">权限名称</label>
    <div class="col-md-6">
        <input type="text" class="form-control" name="label" id="tag" value="{{ $label }}" autofocus>
    </div>
</div>
@if($cid == 0 )
{{--图标修改
    <link rel="stylesheet" href="/plugins/bootstrap-iconpicker/icon-fonts/font-awesome-4.2.0/css/font-awesome.min.css"/>
    <link rel="stylesheet" href="/plugins/bootstrap-iconpicker/bootstrap-iconpicker/css/bootstrap-iconpicker.min.css"/>

    <div class="form-group">
    <label for="tag" class="col-md-3 control-label">图标</label>
    <div class="col-md-6">
        <!-- Button tag -->
        <button class="btn btn-default" name="icon" data-iconset="fontawesome" data-icon="{{ $icon?$icon:'fa-sliders' }}" role="iconpicker"></button>
    </div>

    </div>
@section('js')

    <script type="text/javascript" src="/plugins/bootstrap-iconpicker/bootstrap-iconpicker/js/iconset/iconset-fontawesome-4.3.0.min.js"></script>
    <script type="text/javascript" src="/plugins/bootstrap-iconpicker/bootstrap-iconpicker/js/bootstrap-iconpicker.js"></script>

@stop
@endif
<div class="form-group">
    <label for="tag" class="col-md-3 control-label">权限概述</label>
    <div class="col-md-6">
        <textarea name="description" class="form-control" rows="3">{{ $description }}</textarea>
    </div>
</div>
--}}

<div class="layui-form-item" style="margin-top: 20px;">
    <label class="layui-form-label">权限规则</label>
    <div class="layui-input-block">
        <input type="text" name="name" class="layui-input" required="required" placeholder="请输入权限规则" value="{{ $name }}">
        <input type="hidden" class="form-control" name="cid" id="tag" value="{{ $cid }}" autofocus>
    </div>
</div>
<div class="layui-form-item">
    <label class="layui-form-label">权限名称</label>
    <div class="layui-input-block">
        <input type="text" name="label" class="layui-input" required="required" placeholder="请输入权限名称"
               value="{{ $label }}">
    </div>
</div>
    @if($cid == 0 )
    {{--图标修改--}}
    <link href="//netdna.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/plugins/bootstrap-iconpicker/bootstrap-iconpicker/css/bootstrap-iconpicker.min.css" />

    <div class="layui-form-item">
            <label class="layui-form-label">图标</label>
            <div class="layui-input-block" style="line-height:36px;">
                <a class="layui-btn layui-btn-sm layui-btn-primary iconpicker" name="icon" data-iconset="fontawesome" data-icon="{{ $icon?$icon:'fa-sliders' }}" role="iconpicker">
                    <i class="layui-icon">&#xe625;</i>
                </a>
            </div>
        </div>
    　
        <script type="text/javascript" src="/js/app.js"></script>
        <script type="text/javascript" src="/plugins/bootstrap-iconpicker/bootstrap-iconpicker/js/iconset/iconset-fontawesome-4.3.0.min.js"></script>
        <script type="text/javascript" src="/plugins/bootstrap-iconpicker/bootstrap-iconpicker/js/bootstrap-iconpicker.js"></script>
    @endif
    <div class="layui-form-item">
        <label class="layui-form-label">权限概述</label>
        <div class="layui-input-block">
            <textarea placeholder="请输入权限概述" name="description" class="layui-textarea">{{ $description }}</textarea>
        </div>
    </div>

