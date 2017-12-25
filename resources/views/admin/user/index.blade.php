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
        <a class="layui-btn layui-btn-normal perAdd_btn">添加用户</a>
    </div>
    @endif
    <div class="layui-inline">
        <a class="layui-btn layui-btn-danger batchDel">批量删除</a>
    </div>
</blockquote>
<div class="layui-form">
    <table class="layui-table" lay-data="{height: 'full-100', url:'{{ url('admin/user/index') }}', page:true,limit:6}" lay-filter="userEvent">
        <thead>
        <tr>
            <th lay-data="{type:'checkbox', fixed: 'left', width:'3%'}"></th>
            <th lay-data="{field:'id', width:'7%'}">ID</th>
            <th lay-data="{field:'name', width:'10%'}">用户名称</th>
            <th lay-data="{field:'username', width:'10%'}">帐号</th>
            <th lay-data="{field:'email', width:'20%'}">邮箱</th>
            <th lay-data="{field:'created_at', width:'15%',sort:true}">创建时间</th>
            <th lay-data="{field:'updated_at', width:'15%',sort:true}">修改时间</th>
            <th lay-data="{fixed: 'right', width:'20%', align:'center', toolbar: '#userOper'}">操作</th>
        </tr>
        </thead>
    </table>
    <script type="text/html" id="userOper">
        @if(Gate::forUser(auth('admin')->user())->check('admin.user.edit'))
        <a class="layui-btn layui-btn-xs" lay-event="edit">编辑</a>
        @endif
        @if(Gate::forUser(auth('admin')->user())->check('admin.user.destroy'))
        <a class="layui-btn layui-btn-danger layui-btn-xs" lay-event="del">删除</a>
        @endif
        <form class="deleteForm" method="POST" action="/admin/list" style="display:none;">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="_method" value="DELETE">
        </form>
    </script>
</div>
<div id="page"></div>
<script type="text/javascript">

	layui.use(['form', 'layer','table', 'jquery'], function () {
		var table = layui.table,
		    $ = layui.jquery;

		//添加用户
		//改变窗口大小时，重置弹窗的高度，防止超出可视区域（如F12调出debug的操作）
		$(window).one("resize", function () {
			$(".perAdd_btn").click(function () {
				var index = layui.layer.open({
					type   : 2,
					title  : '添加用户',
					area   : ['700px', '450px'],
					fixed  : false, //不固定
					maxmin : true,
					skin   : 'layui-layer-molv',
					content: "/admin/user/create",
					success: function (layero, index) {
						setTimeout(function () {
							layui.layer.tips('点击此处返回用户列表', '.layui-layer-setwin .layui-layer-close', {
								tips: 3
							});
						}, 500)
					}
				});
			})
		}).resize();
		table.on('tool(userEvent)', function (obj) {
			var data = obj.data;
			if (obj.event === 'detail')
			{
				location.href="/admin/user/"+ data.id;
			}
			else if (obj.event === 'del')
			{
				layer.confirm('真的删除行么', function (index) {
					$('.deleteForm').attr('action', '/admin/user/' + data.id);
					$('.deleteForm').submit();
					layer.close(index);
				});
			}
			else if (obj.event === 'edit')
			{
				var index = layui.layer.open({
					type   : 2,
					title: '编辑用户',
					area   : ['700px', '450px'],
					fixed  : false, //不固定
					maxmin : true,
					skin: 'layui-layer-molv',
					content: '/admin/user/' + data.id + '/edit',
					success: function (layero, index) {
						setTimeout(function () {
							layui.layer.tips('点击此处返回用户列表', '.layui-layer-setwin .layui-layer-close', {
								tips: 3
							});
						}, 500)
					}
				});
			}
		});
	});
</script>
@endsection