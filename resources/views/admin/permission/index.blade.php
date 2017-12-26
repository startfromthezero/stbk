@extends('admin.layouts.app')
@section('content')
<body class="childrenBody">
<blockquote class="layui-elem-quote permission_search">
	<div class="layui-inline" style="float:right">
    @if($data['cid']==0)
        <label style="height:38px;line-height:38px;font-size:24px;" id="cid" attr="{{$data['cid']}}"> 顶级菜单</label>
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
	<table class="layui-table">
		<colgroup>
			<col width="50">
			<col width="5%">
			<col width="15%">
			<col width="15%">
			<col width="15%">
			<col width="15%">
			<col width="15%">
			<col>
		</colgroup>
		<thead>
		<tr>
			<th><input type="checkbox" name="" lay-skin="primary" lay-filter="allChoose" id="allChoose"></th>
			<th>ID</th>
			<th>权限规则</th>
			<th>权限名称</th>
			<th>权限概述</th>
			<th>创建时间</th>
			<th>修改时间</th>
			<th>操作</th>
		</tr>
		</thead>
		<tbody class="permissions_data">
        @foreach ($data['permissions'] as $permission)
            <tr>
                <td><input type="checkbox" name="checked" lay-skin="primary" lay-filter="choose"></td>
                <td>{{ $permission->id }}</td>
                <td>{{ $permission->name }}</td>
                <td>{{ $permission->label }}</td>
                <td>{{ $permission->description }}</td>
                <td>{{ $permission->created_at }}</td>
                <td>{{ $permission->updated_at }}</td>
                <td>
                	@if($data['cid']==0)
			        <a href="{{ url('admin/permission/'. $permission->id ) }}" class="layui-btn layui-btn-primary layui-btn-xs">下级菜单</a>
			        @endif
			        @if(Gate::forUser(auth('admin')->user())->check('admin.permission.edit'))
       				<a class="layui-btn layui-btn-xs permission_edit" edit-id="{{ $permission->id }}">编辑</a>
        			@endif
                	@if(Gate::forUser(auth('admin')->user())->check('admin.permission.destroy'))
        			<a class="layui-btn layui-btn-danger layui-btn-xs permission_del" del-id="{{ $permission->id }}">删除</a>
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
<script type="text/javascript" src="/layui/layui.js"></script>
<script type="text/javascript">

	layui.use(['form', 'layer', 'jquery','laypage'], function () {
		var table = layui.table,
			laypage = layui.laypage,
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
					content: "/admin/permission/{{ $data['cid'] }}/create",
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

		//编辑
		$("body").on("click", ".permission_edit", function ()
		{  //编辑
			var index = layui.layer.open({
				title  : "编辑权限",
				type   : 2,
				content: '/admin/permission/' + $(this).attr("edit-id") + '/edit',
				success: function (layero, index)
				{
					setTimeout(function ()
					{
						layui.layer.tips('点击此处返回权限列表', '.layui-layer-setwin .layui-layer-close', {
							tips: 3
						});
					}, 500)
				}
			})
			//改变窗口大小时，重置弹窗的高度，防止超出可视区域（如F12调出debug的操作）
			$(window).resize(function ()
			{
				layui.layer.full(index);
			})
			layui.layer.full(index);
		})

		$("body").on("click",".permission_del",function(){  //删除
			layer.confirm('确定删除此权限？',{icon:3, title:'提示信息'},function(index){
				$('.deleteForm').attr('action', '/admin/permission/' + $(this).attr("del-id"));
				$('.deleteForm').submit();
				layer.close(index);
			});
		})

		var nums = 10; //每页出现的数据量
		//var limit = eval('(' + newsData + ')').length;
		laypage.render({
			elem : "page",
			layout: ['count', 'prev', 'page', 'next', 'limit', 'skip'],
			count: {{ $data['count'] }},
			limit: nums,
			jump : function(obj){
				console.log(obj);
				//window.location.href="/admin/permission/{{ $data['cid'] }}?page="+obj.curr+"&limit="+nums;
				// $(".permissions_data").html(renderDate(newsData,obj.curr));
				// $('.news_list thead input[type="checkbox"]').prop("checked",false);
		  //   	form.render();
			}
		})
	});
</script>
@endsection