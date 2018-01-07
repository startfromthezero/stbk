@extends('admin.layouts.app')
@section('content')
<body class="childrenBody">
<blockquote class="layui-elem-quote">
    <div class="layui-inline">
        <div class="layui-input-inline">
            <input type="text" value="" placeholder="请输入关键字" class="layui-input search_input">
        </div>
        <a class="layui-btn search_btn">查询</a>
    </div>
    @check('admin.role.create')
    <div class="layui-inline">
        <a class="layui-btn layui-btn-normal role_add">添加角色</a>
    </div>
    @endcheck
    <div class="layui-inline">
        <a class="layui-btn layui-btn-danger batchDel">批量删除</a>
    </div>
</blockquote>
<div class="layui-form">
    <table class="layui-table">
        <colgroup>
            <col width="50">
            <col width="5%">
            <col width="15%">
            <col>
            <col width="15%">
            <col width="15%">
            <col width="20%">
        </colgroup>
        <thead>
        <tr>
            <th><input type="checkbox" name="" lay-skin="primary" lay-filter="allChoose" id="allChoose"></th>
            <th>ID</th>
            <th>角色名称</th>
            <th>角色描述</th>
            <th>创建时间</th>
            <th>修改时间</th>
            <th>操作</th>
        </tr>
        </thead>
        <tbody class="roles_data">
        @foreach ($data['roles'] as $role)
            <tr>
                <td><input type="checkbox" name="checked" lay-skin="primary" lay-filter="choose"></td>
                <td>{{ $role->id }}</td>
                <td>{{ $role->name }}</td>
                <td>{{ $role->description }}</td>
                <td>{{ $role->created_at }}</td>
                <td>{{ $role->updated_at }}</td>
                <td>
                    @check('admin.role.edit')
                        <a class="layui-btn layui-btn-xs role_edit" edit-id="{{ $role->id }}">编辑</a>
                    @endcheck
                    @check('admin.role.destroy')
                        <a class="layui-btn layui-btn-danger layui-btn-xs role_del"
                           del-id="{{ $role->id }}">删除</a>
                    @endcheck
                    <form class="deleteForm" method="POST" action="/admin/list" style="display:none;">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="_method" value="DELETE">
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div id="page"></div>
</div>
<script type="text/javascript">
	layui.use(['jquery', 'laypage','form'], function () {
		var laypage = layui.laypage,
			$ = layui.jquery,
			nums = 10; //每页出现的数据量;

		//搜索
		$("body").on("click", ".search_btn", function () {
			var search = $('.search_input').val(), url = "/admin/role?page=1&limit=" + nums;
			if (search != ''){
				url += "&search=" + search;
			}
			window.location.href = url;
			return;
		})

		//添加角色
		$("body").on("click", ".role_add", function () {
			window.location.href = '/admin/role/create';
		})

		//编辑
		$("body").on("click", ".role_edit", function () {
			window.location.href = '/admin/role/' + $(this).attr("edit-id") + '/edit';
		})

		//删除
		$("body").on("click", ".role_del", function () {
			var _this = $(this);
			layer.confirm('确定删除此角色？', {icon: 3, title: '提示信息'}, function (index) {
				$('.deleteForm').attr('action', '/admin/role/' + _this.attr("del-id"));
				$('.deleteForm').submit();
			});
		})

		//分页
		laypage.render({
			elem  : "page",
			layout: ['count', 'prev', 'page', 'next', 'limit', 'skip'],
			count : {{ $data['count'] }},
			limit : nums,
			curr  : {{ $data['page'] }},
			jump  : function (obj, first) {
				if (!first)
				{
					window.location.href = "/admin/role?page=" + obj.curr + "&limit=" + nums;
					return;
				}
			}
		})
	});
</script>
@endsection