@extends('admin.layouts.app')
@section('content')
    <body class="childrenBody">
    <blockquote class="layui-elem-quote news_search">
        <div class="layui-inline">
            <div class="layui-input-inline">
                <input type="text" value="" placeholder="请输入关键字" class="layui-input search_input">
            </div>
            <a class="layui-btn search_btn">查询</a>
        </div>
        @check('admin.news.create')
        <div class="layui-inline">
            <a class="layui-btn layui-btn-normal new_add">添加文章</a>
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
                <col width="10%">
                <col width="10%">
                <col width="10%">
                <col width="10%">
                <col width="10%">
                <col width="15%">
                <col width="15%">
                <col width="15%">
            </colgroup>
            <thead>
            <tr>
                <th><input type="checkbox" name="" lay-skin="primary" lay-filter="allChoose" id="allChoose"></th>
                <th>ID</th>
                <th>文章标题</th>
                <th>发布人</th>
                <th>是否展示</th>
                <th>是否推荐</th>
                <th>是否置顶</th>
                <th>发布时间</th>
                <th>更新时间</th>
                <th>操作</th>
            </tr>
            </thead>
            <tbody class="news_data">
            @foreach ($data['news'] as $new)
                <tr>
                    <td><input type="checkbox" name="checked" lay-skin="primary" lay-filter="choose"></td>
                    <td>{{ $new->id }}</td>
                    <td>{{ $new->title }}</td>
                    <td>{{ $data['users'][$new->user_id] }}</td>
                    <td><input type="checkbox" name="is_show" show-id="{{$new->id}}" lay-filter="isShow" lay-skin="switch" lay-text="是|否" @if($new->is_show) checked @endif></td>
                    <td><input type="checkbox" name="is_recomm" recomm-id="{{$new->id}}" lay-filter="isRecomm" lay-skin="switch" lay-text="是|否" @if($new->is_recomm) checked @endif></td>
                    <td><input type="checkbox" name="is_top" top-id="{{$new->id}}" lay-filter="isTop" lay-skin="switch" lay-text="是|否" @if($new->is_top) checked @endif></td>
                    <td>{{ $new->created_at }}</td>
                    <td>{{ $new->updated_at }}</td>
                    <td>
                        @check('admin.news.edit')
                        <a class="layui-btn layui-btn-xs new_edit" edit-id="{{ $new->id }}">编辑</a>
                        @endcheck
                        @check('admin.news.destroy')
                        <a class="layui-btn layui-btn-danger layui-btn-xs new_del" del-id="{{ $new->id }}">删除</a>
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

		layui.use(['laypage', 'jquery', 'layedit','form'], function () {
			var laypage = layui.laypage,
				$ = layui.jquery,
				form = layui.form,
				nums = 10; //每页出现的数据量;

			//搜索
			$("body").on("click", ".search_btn", function () {
				var search = $('.search_input').val(), url = "/admin/news?page=1&limit=" + nums;
				if (search != '')
				{
					url += "&search=" + search;
				}
				window.location.href = url;
				return;
			})

            //是否开启展示
			form.on('switch(isShow)', function (data) {
				var is_show = data.elem.checked ? 1 : 0;     //
				var index = layer.msg('修改中，请稍候', {icon: 16, time: false, shade: 0.8});
				$.ajax({
					url     : '/admin/news/'+ $(this).attr('show-id'),
					type    : "post",
					dataType: "json",
                    data : {'is_show': is_show,'_token':'{{csrf_token()}}','_method':'PATCH'},
					success : function (data) {
						layer.close(index);
						layer.msg('展示状态'+ data.msg);
					}
                });
			});

			//是否开展推荐
			form.on('switch(isRecomm)', function (data) {
				var is_recomm = data.elem.checked ? 1 : 0;
				var index = layer.msg('修改中，请稍候', {icon: 16, time: false, shade: 0.8});
				$.ajax({
					url     : '/admin/news/' + $(this).attr('recomm-id'),
					type    : "post",
					dataType: "json",
					data    : {'is_recomm': is_recomm, '_token': '{{csrf_token()}}', '_method': 'PATCH'},
					success : function (data) {
						layer.close(index);
						layer.msg('推荐状态' + data.msg);
					}
				});
			});

			//是否开启置顶
			form.on('switch(isTop)', function (data) {
				var is_top = data.elem.checked ? 1 : 0;
				var index = layer.msg('修改中，请稍候', {icon: 16, time: false, shade: 0.8});
				$.ajax({
					url     : '/admin/news/' + $(this).attr('top-id'),
					type    : "post",
					dataType: "json",
					data    : {'is_top': is_top, '_token': '{{csrf_token()}}', '_method': 'PATCH'},
					success : function (data) {
						layer.close(index);
						layer.msg('置顶状态' + data.msg);
					}
				});
			});

			//添加文章
			$("body").on("click", ".new_add", function () {
				window.location.href = '/admin/news/create';
			})

			//编辑
			$("body").on("click", ".new_edit", function () {
				window.location.href = '/admin/news/' + $(this).attr("edit-id") + '/edit';
			})

			//删除
			$("body").on("click", ".new_del", function () {
				var _this = $(this);
				layer.confirm('确定删除此文章？', {icon: 3, title: '提示信息'}, function (index) {
					$('.deleteForm').attr('action', '/admin/news/' + _this.attr("del-id"));
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
						window.location.href = "/admin/news?page=" + obj.curr + "&limit=" + nums;
						return;
					}
				}
			})
		});
    </script>
@endsection