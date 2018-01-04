@extends('admin.layouts.app')
@section('content')
<body class="childrenBody">
<blockquote class="layui-elem-quote user_search">
    <div class="layui-inline">
        <div class="layui-input-inline">
            <input type="text" value="" placeholder="请输入关键字" class="layui-input search_input">
        </div>
        <a class="layui-btn search_btn">查询</a>
    </div>
    @if(Gate::forUser(auth('admin')->user())->check('admin.user.create'))
    <div class="layui-inline">
        <a class="layui-btn layui-btn-normal user_add">添加用户</a>
    </div>
    @endif
    <div class="layui-inline">
        <a class="layui-btn layui-btn-danger batchDel">批量删除</a>
    </div>
</blockquote>
<div class="layui-form">
	<table class="layui-table">
		<colgroup>
			<col width="50">
			<col width="5%">
			<col width="12%">
			<col width="12%">
			<col>
			<col width="15%">
			<col width="15%">
			<col width="15%">
		</colgroup>
		<thead>
		<tr>
			<th><input type="checkbox" name="" lay-skin="primary" lay-filter="allChoose" id="allChoose"></th>
			<th>ID</th>
			<th>用户名称</th>
			<th>帐号</th>
			<th>邮箱</th>
			<th>创建时间</th>
			<th>修改时间</th>
			<th>操作</th>
		</tr>
		</thead>
		<tbody class="users_data">
		@foreach ($data['users'] as $user)
			<tr>
				<td><input type="checkbox" name="checked" lay-skin="primary" lay-filter="choose"></td>
				<td>{{ $user->id }}</td>
				<td>{{ $user->name }}</td>
				<td>{{ $user->username }}</td>
				<td>{{ $user->email }}</td>
				<td>{{ $user->created_at }}</td>
				<td>{{ $user->updated_at }}</td>
				<td>
					@if(Gate::forUser(auth('admin')->user())->check('admin.user.edit'))
						<a class="layui-btn layui-btn-xs user_edit" edit-id="{{ $user->id }}">编辑</a>
					@endif
					@if(Gate::forUser(auth('admin')->user())->check('admin.user.destroy'))
						<a class="layui-btn layui-btn-danger layui-btn-xs user_del" del-id="{{ $user->id }}">删除</a>
					@endif
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

	layui.use(['laypage', 'jquery', 'layedit'], function () {
		var laypage = layui.laypage,
				$ = layui.jquery,
				nums = 10; //每页出现的数据量;

		//搜索
		$("body").on("click", ".search_btn", function ()
		{
			var search = $('.search_input').val(), url = "/admin/user?page=1&limit=" + nums;
			if (search != '')
			{
				url += "&search=" + search;
			}
			window.location.href = url;
			return;
		})

		//添加角色
		$("body").on("click", ".user_add", function ()
		{
			window.location.href = '/admin/user/create';
		})

		//编辑
		$("body").on("click", ".user_edit", function ()
		{
			window.location.href = '/admin/user/' + $(this).attr("edit-id") + '/edit';
		})

		//删除
		$("body").on("click", ".user_del", function ()
		{
			var _this = $(this);
			layer.confirm('确定删除此角色？', {icon: 3, title: '提示信息'}, function (index)
			{
				$('.deleteForm').attr('action', '/admin/user/' + _this.attr("del-id"));
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
			jump  : function (obj, first)
			{
				if (!first)
				{
					window.location.href = "/admin/user?page=" + obj.curr + "&limit=" + nums;
					return;
				}
			}
		})
	});
</script>
@endsection