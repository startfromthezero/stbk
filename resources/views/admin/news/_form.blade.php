<div class="layui-form-item">
    <label class="layui-form-label">文章标题</label>
    <div class="layui-input-block">
        <input type="text" name="title" class="layui-input" value="{{ $title }}" required="required" placeholder="请输入文章标题">
    </div>
</div>
<div class="layui-form-item" pane>
    <label class="layui-form-label">自定义属性</label>
    <div class="layui-input-block">
        <input type="checkbox" name="is_show" class="isShow" title="展示" @if($is_show) checked @endif>
        <input type="checkbox" name="is_recomm" class="isRecomm" title="推荐" @if($is_recomm) checked @endif>
        <input type="checkbox" name="is_top" class="isTop" title="置顶" @if($is_top) checked @endif>
    </div>
</div>
<div class="layui-form-item">
    <label class="layui-form-label">文章类别</label>
    <div class="layui-input-inline">
        <select name="type_id" class="newstype" lay-filter="newstype">
            <option value="-1">请选择类别</option>
            @foreach($types as $key =>$val)
                <option value="{{$key}}" @if($key == $type_id) selected @endif>{{$val}}</option>
            @endforeach
        </select>
    </div>
</div>
<div class="layui-form-item">
    <label class="layui-form-label">关键字</label>
    <div class="layui-input-block">
        <input type="text" class="layui-input" name="keyword" value="{{ $keyword }}" placeholder="请输入文章关键字">
    </div>
</div>
<div class="layui-form-item layui-form-text">
    <label class="layui-form-label">内容摘要</label>
    <div class="layui-input-block">
        <textarea placeholder="请输入内容摘要" name="synopsis" class="layui-textarea">{{ $synopsis }}</textarea>
    </div>
</div>
<div class="layui-form-item layui-form-text">
    <label class="layui-form-label layui-form-text">文章内容</label>
    <div class="layui-input-block">
        <textarea class="layui-textarea layui-hide" name="content" lay-verify="content" id="news_content">{{ $content }}</textarea>
    </div>
</div>
<div class="layui-form-item" style="position:relative;">
    <div class="layui-input-inline">
        <input name="img" type="hidden" id="articleCoverSrc" value="{{ $img }}">
        <img id="articleCoverImg" class="img-cover" src="{{ $img }}" alt="封面">
    </div>
    <div class="layui-input-inline" style="position:absolute;bottom:0;">
        <div class="layui-box layui-upload-button">
            <button type="button" class="layui-btn layui-btn-danger" id="img-upload"><i class="layui-icon"></i>上传图片</button>
        </div>
    </div>
</div>
<script>
	layui.use(['form', 'jquery', 'layedit','upload'], function () {
		var form = layui.form, layedit = layui.layedit, upload = layui.upload,$ = layui.jquery;

		//创建一个编辑器
		var editIndex = layedit.build('news_content');
		var res = layedit.getContent(editIndex);
        console.log(res);
		//普通图片上传
		var uploadInst = upload.render({
			elem    : '#img-upload'
			, url   : "/admin/news/upload"
            , data  : {'_token':'{{csrf_token()}}'}
			, before: function (obj) {
				//预读本地文件示例，不支持ie8
				obj.preview(function (index, file, result) {
					//console.log(result);
					$('#articleCoverImg').attr('src', result); //图片链接（base64）
				});
			}
			, done  : function (res) {
				//如果上传失败
				if (res.r == 0)
				{
					console.log(res);
					$('#articleCoverImg').attr('src', res.url);
					$("#articleCoverSrc").val(res.url);
					return layer.msg('上传成功');
				}
				//上传成功
			}
			, error : function (res) {
				console.log(res);
			}
		});
	});
</script>


