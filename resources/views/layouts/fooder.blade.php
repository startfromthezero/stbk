<div class="fly-footer">
    <p><a href="http://fly.layui.com/" target="_blank">Fly社区</a> 2017 &copy; <a href="http://www.layui.com/"
                                                                                target="_blank">layui.com 出品</a></p>
    <p>
        <a href="http://fly.layui.com/jie/3147/" target="_blank">付费计划</a>
        <a href="http://www.layui.com/template/fly/" target="_blank">获取Fly社区模版</a>
        <a href="http://fly.layui.com/jie/2461/" target="_blank">微信公众号</a>
    </p>
</div>

<script src="/layui/layui.js"></script>
<script>
    var count = 10,nums = 20, curr = 1;

	layui.cache.page = 'jie';
	layui.cache.user = {
		username    : '游客'
		, uid       : -1
		, avatar    : '/images/avatar/00.jpg'
		, experience: 83
		, sex       : '男'
	};
	layui.config({
		version: "3.0.0"
		, base : '/mods/'
	}).extend({
		fly: 'index'
	}).use('fly');
</script>

</body></html>