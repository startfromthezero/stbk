@extends('admin.layouts.app')
@section('content')
<body class="childrenBody">
<blockquote class="layui-elem-quote role_search">
    <div class="layui-inline">
        <div class="layui-input-inline">
            <input type="text" value="" placeholder="请输入关键字" class="layui-input search_input">
        </div>
        <a class="layui-btn search_btn">查询</a>
    </div>
    @if(Gate::forUser(auth('admin')->user())->check('admin.role.create'))
    <div class="layui-inline">
        <a class="layui-btn layui-btn-normal roleAdd_btn">添加角色</a>
    </div>
    @endif
    <div class="layui-inline">
        <a class="layui-btn layui-btn-danger batchDel">批量删除</a>
    </div>
</blockquote>
<div class="layui-form">
    <table class="layui-table" lay-data="{height: 'full-100', url:'{{ url('admin/role/index') }}', page:true,limit:6}" lay-filter="roleEvent">
        <thead>
        <tr>
            <th lay-data="{type:'checkbox', fixed: 'left',width:'3%'}"></th>
            <th lay-data="{field:'id', width:'7%',cellMinWidth:60}">ID</th>
            <th lay-data="{field:'name', width:'20%',cellMinWidth:100}">角色名称</th>
            <th lay-data="{field:'description', width:'20%',cellMinWidth:100}">角色描述</th>
            <th lay-data="{field:'created_at', width:'15%',cellMinWidth:160}">创建时间</th>
            <th lay-data="{field:'updated_at', width:'15%',cellMinWidth:160}">修改时间</th>
            <th lay-data="{fixed: 'right', width:'20%',cellMinWidth:160, align:'center', toolbar: '#roleOper'}">操作</th>
        </tr>
        </thead>
    </table>
    <script type="text/html" id="roleOper">
        @if(Gate::forUser(auth('admin')->user())->check('admin.role.edit'))
        <a class="layui-btn layui-btn-xs" lay-event="edit">编辑</a>
        @endif
        @if(Gate::forUser(auth('admin')->user())->check('admin.role.destroy'))
        <a class="layui-btn layui-btn-danger layui-btn-xs" lay-event="del">删除</a>
        @endif
        <form class="deleteForm" method="POST" action="/admin/list" style="display:none;">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="_method" value="DELETE">
        </form>
    </script>
</div>
<div id="page"></div>
<script type="text/javascript" src="/layui/layui.js"></script>
<script type="text/javascript">
	layui.use(['table', 'jquery'], function () {
		var table = layui.table,
		    $ = layui.jquery;
		table.on('checkbox(demo)', function (obj) {
			console.log(obj)
		});

		//添加角色
		//改变窗口大小时，重置弹窗的高度，防止超出可视区域（如F12调出debug的操作）
		$(window).one("resize", function () {
			$(".roleAdd_btn").click(function () {
				var index = layui.layer.open({
					title  : "添加角色",
					type   : 2,
					content: "/admin/role/create",
					success: function (layero, index) {
						setTimeout(function () {
							layui.layer.tips('点击此处返回文章列表', '.layui-layer-setwin .layui-layer-close', {
								tips: 3
							});
						}, 500)
					}
				})
				layui.layer.full(index);
			})
		}).resize();

		table.on('tool(roleEvent)', function (obj) {
			var data = obj.data;
			if (obj.event === 'detail')
			{
				location.href="/admin/role/"+ data.id;
			}
			else if (obj.event === 'del')
			{
				layer.confirm('真的删除行么', function (index) {
					$('.deleteForm').attr('action', '/admin/role/' + data.id);
					$('.deleteForm').submit();
					layer.close(index);
				});
			}
			else if (obj.event === 'edit')
			{
				var index = layui.layer.open({
					title  : "编辑角色",
					type   : 2,
					content: '/admin/role/' + data.id + '/edit',
					success: function (layero, index) {
						setTimeout(function () {
							layui.layer.tips('点击此处返回角色列表', '.layui-layer-setwin .layui-layer-close', {
								tips: 3
							});
						}, 500)
					}
				})
				layui.layer.full(index);
			}
		});
	});
</script>
@endsection