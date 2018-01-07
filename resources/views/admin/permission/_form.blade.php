<div class="layui-form-item">
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
    @if($cid == 0)
    {{--图标修改--}}
    @include('admin.permission.fonticonpicker')
    @endif
    <div class="layui-form-item layui-form-text">
        <label class="layui-form-label">权限概述</label>
        <div class="layui-input-block">
            <textarea placeholder="请输入权限概述" name="description" class="layui-textarea">{{ $description }}</textarea>
        </div>
    </div>


