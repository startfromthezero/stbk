{{--
<div class="form-group">
    <label for="tag" class="col-md-3 control-label">用户名</label>
    <div class="col-md-5">
        <input type="text" class="form-control" name="name" id="tag" value="{{ $name }}" autofocus>
    </div>
</div>
<div class="form-group">
    <label for="tag" class="col-md-3 control-label">邮箱</label>
    <div class="col-md-5">
        <input type="text" class="form-control" name="email" id="tag" value="{{ $email }}" autofocus>
    </div>
</div>

<div class="form-group">
    <label for="tag" class="col-md-3 control-label">密码</label>
    <div class="col-md-5">
        <input type="password" class="form-control" name="password" id="tag" value="" autofocus>
    </div>
</div>

<div class="form-group">
    <label for="tag" class="col-md-3 control-label">密码确认</label>
    <div class="col-md-5">
        <input type="password" class="form-control" name="password_confirmation" id="tag" value="" autofocus>
    </div>
</div>


<div class="form-group">
    <label for="tag" class="col-md-3 control-label">用户列表</label>
    @if(isset($id)&&$id==1)
        <div class="col-md-4" style="float:left;padding-left:20px;margin-top:8px;"><h2>超级管理员</h2></div>
    @else
        <div class="col-md-6">
        @foreach($rolesAll as $v)
            <div class="col-md-4" style="float:left;padding-left:20px;margin-top:8px;">
            <span class="checkbox-custom checkbox-default">
                <i class="fa"></i>
                    <input class="form-actions"
                           @if(in_array($v['id'],$roles))
                           checked
                           @endif
                           id="inputChekbox{{$v['id']}}" type="Checkbox" value="{{$v['id']}}"
                           name="roles[]"> <label for="inputChekbox{{$v['id']}}">
                    {{$v['name']}}
                </label> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            </span>
            </div>
        @endforeach
            </div>
    @endif

</div>
--}}

<div class="layui-form-item">
    <label class="layui-form-label">用户名称</label>
    <div class="layui-input-inline">
        <input type="text" name="name" class="layui-input" required="required" placeholder="请输入用户名称" value="{{ $name }}">
    </div>
</div>
<div class="layui-form-item">
    <label class="layui-form-label">用户帐号</label>
    <div class="layui-input-inline">
        <input type="text" name="username" class="layui-input" required="required" placeholder="请输入用户帐号" value="{{ $username }}">
    </div>
</div>
<div class="layui-form-item">
    <label class="layui-form-label">邮箱</label>
    <div class="layui-input-inline">
        <input type="text" name="email" class="layui-input" required="required" placeholder="请输入邮箱" value="{{ $email }}">
    </div>
</div>
<div class="layui-form-item">
    <label class="layui-form-label">用户密码</label>
    <div class="layui-input-inline">
        <input type="password" name="password" class="layui-input" required="required" placeholder="请输入密码确认" value="">
    </div>
</div>
<div class="layui-form-item">
    <label class="layui-form-label">密码确认</label>
    <div class="layui-input-inline">
        <input type="password" name="password_confirmation" class="layui-input" required="required" placeholder="请输入密码确认" value="">
    </div>
</div>
<div class="layui-form-item">
    <label class="layui-form-label">选择角色</label>
    <div class="layui-input-block" style="line-height:36px;">
    @foreach($rolesAll as $v)
            <input style="display:inline-block" type="checkbox" name="roles[]" value="{{$v['id']}}" @if(in_array($v['id'],$roles)) checked @endif>
            {{$v['name']}}
        @endforeach
    </div>
</div>


