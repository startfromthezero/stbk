{{--
<div class="form-group">
    <label for="tag" class="col-md-3 control-label">角色名称</label>
    <div class="col-md-5">
        <input type="text" class="form-control" name="name" id="tag" value="{{ $name }}" autofocus>
    </div>
</div>
<div class="form-group">
    <label for="tag" class="col-md-3 control-label">角色概述</label>
    <div class="col-md-5">
        <textarea name="description" class="form-control" rows="3">{{ $description }}</textarea>
    </div>
</div>

<div class="form-group">
    <label for="tag" class="col-md-3 control-label">角色列表</label>
</div>
<div class="form-group">
    <div class="form-group">
        @if($permissionAll)
            @foreach($permissionAll[0] as $v)
                <div class="form-group">
                    <label class="control-label col-md-3 all-check">
                        {{$v['label']}}：
                    </label>
                    <div class="col-md-6">
                        @if(isset($permissionAll[$v['id']]))

                            @foreach($permissionAll[$v['id']] as $vv)
                                <div class="col-md-4" style="float:left;padding-left:20px;margin-top:8px;">
                        <span class="checkbox-custom checkbox-default">
                        <i class="fa"></i>
                            <input class="form-actions"
                                   @if(in_array($vv['id'],$permissions))
                                   checked
                                   @endif
                                   id="inputCehkbox{{$vv['id']}}" type="Checkbox" value="{{$vv['id']}}"
                                   name="permissions[]"> <label for="inputChekbox{{$vv['id']}}">
                                {{$vv['label']}}
                            </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        </span>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            @endforeach
        @endif
    </div>
</div>
<script>
    $(function () {
        $('.all-check').on('click', function () {

        });
    });
</script>
--}}
<div class="layui-form-item">
    <label class="layui-form-label">角色名称</label>
    <div class="layui-input-block">
        <input type="text" name="name" class="layui-input" required="required" placeholder="请输入角色名称"
               value="{{ $name }}">
    </div>
</div>
<div class="layui-form-item layui-form-text">
    <label class="layui-form-label">角色概述</label>
    <div class="layui-input-block">
        <textarea placeholder="请输入角色概述" name="description" class="layui-textarea">{{ $description }}</textarea>
    </div>
</div>
<div class="layui-form-item layui-form-text">
    <label class="layui-form-label" style="border-bottom: none">权限配置</label>
    <table class="layui-table" style="margin:0">
        <colgroup>
            <col width="150">
            <col>
        </colgroup>
        <tbody>
        @if($permissionAll)
            @foreach($permissionAll[0] as $v)
                <tr>
                    <td>
                        <input type="checkbox" name="permissions[]" lay-skin="primary" title="{{$v['label']}}" value="{{$v['id']}}" lay-filter="allChoose" @if(in_array($v['id'],$permissions)) checked @endif>
                    </td>
                    <td align="left">
                        @if(isset($permissionAll[$v['id']]))
                            @foreach($permissionAll[$v['id']] as $vv)
                                <input type="checkbox" name="permissions[]" lay-skin="primary" title="{{$vv['label']}}" value="{{$vv['id']}}" @if(in_array($vv['id'],$permissions)) checked @endif>&emsp;
                            @endforeach
                        @endif
                    </td>
                </tr>
            @endforeach
        @endif
        </tbody>
    </table>
</div>
<script>
	layui.use(['form', 'jquery'], function () {
		var form = layui.form,$= layui.jquery;
		//全选
		form.on('checkbox(allChoose)', function (data) {
			var child = $(data.elem).parent().next().find('input[type="checkbox"]:not([name="permissions"])');
			child.each(function (index, item) {
				item.checked = data.elem.checked;
			});
			form.render('checkbox');
		});
    });
</script>

