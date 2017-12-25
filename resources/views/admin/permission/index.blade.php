@extends('admin.layouts.app')
@section('content')
<body class="childrenBody">
<blockquote class="layui-elem-quote permission_search">
	<div class="layui-inline" style="float:right">
    @if($cid==0)
        <label style="height:38px;line-height:38px;font-size:24px;" id="cid" attr="{{$cid}}"> 顶级菜单</label>
    @else
        <a href="/admin/permission" class="layui-btn reloadBtn">返回顶级菜单</a>
    @endif
	</div>
    <div class="layui-inline">
        <div class="layui-input-inline">
            <input type="text" value="" placeholder="请输入关键字" class="layui-input search_input">
        </div>
        <a class="layui-btn search_btn">查询</a>
    </div>
    @if(Gate::forUser(auth('admin')->user())->check('admin.permission.create'))
    <div class="layui-inline">
        <a class="layui-btn layui-btn-normal perAdd_btn">添加权限</a>
    </div>
    @endif
    <div class="layui-inline">
        <a class="layui-btn layui-btn-danger batchDel">批量删除</a>
    </div>
</blockquote>
<div class="layui-form">
    <table style="width: 100%;" class="layui-table" lay-data="{height: 'full-100', url:'{{ url('admin/permission/'.$cid) }}', page:true,limit:6}" lay-filter="demoEvent">
        <thead>
        <tr>
            <th lay-data="{type:'checkbox', fixed: 'left',width:'3%'}"></th>
            <th lay-data="{field:'id', width:'7%'}">ID</th>
            <th lay-data="{field:'name', width:'20%'}">权限规则</th>
            <th lay-data="{field:'label', width:'10%'}">权限名称</th>
            <th lay-data="{field:'description', width:'10%'}">权限概述</th>
            <th lay-data="{field:'created_at', width:'15%',sort:true}">创建时间</th>
            <th lay-data="{field:'updated_at', width:'15%',sort:true}">修改时间</th>
            <th lay-data="{fixed: 'right', width:'20%', align:'center', toolbar: '#barDemo'}">操作</th>
        </tr>
        </thead>
    </table>
    <script type="text/html" id="barDemo">
        @if($cid==0)
        <a class="layui-btn layui-btn-primary layui-btn-xs" lay-event="detail">下级菜单</a>
        @endif
        @if(Gate::forUser(auth('admin')->user())->check('admin.permission.edit'))
        <a class="layui-btn layui-btn-xs" lay-event="edit">编辑</a>
        @endif
        @if(Gate::forUser(auth('admin')->user())->check('admin.permission.destroy'))
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

	layui.use(['form', 'layer','table', 'jquery'], function () {
		var table = layui.table,
		    $ = layui.jquery;

		//添加权限
		//改变窗口大小时，重置弹窗的高度，防止超出可视区域（如F12调出debug的操作）
		$(window).one("resize", function () {
			$(".perAdd_btn").click(function () {
				var index = layui.layer.open({
					type   : 2,
					title  : '添加权限',
					area   : ['700px', '450px'],
					fixed  : false, //不固定
					maxmin : true,
					skin   : 'layui-layer-molv',
					content: "/admin/permission/{{ $cid }}/create",
					success: function (layero, index) {
						setTimeout(function () {
							layui.layer.tips('点击此处返回权限列表', '.layui-layer-setwin .layui-layer-close', {
								tips: 3
							});
						}, 500)
					}
				});
			})
		}).resize();
		table.on('tool(demoEvent)', function (obj) {
			var data = obj.data;
			if (obj.event === 'detail')
			{
				location.href="/admin/permission/"+ data.id;
			}
			else if (obj.event === 'del')
			{
				layer.confirm('真的删除行么', function (index) {
					$('.deleteForm').attr('action', '/admin/permission/' + data.id);
					$('.deleteForm').submit();
					layer.close(index);
				});
			}
			else if (obj.event === 'edit')
			{
				var index = layui.layer.open({
					type   : 2,
					title: '编辑权限',
					area   : ['700px', '450px'],
					fixed  : false, //不固定
					maxmin : true,
					skin: 'layui-layer-molv',
					content: '/admin/permission/' + data.id + '/edit',
					success: function (layero, index) {
						setTimeout(function () {
							layui.layer.tips('点击此处返回权限列表', '.layui-layer-setwin .layui-layer-close', {
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