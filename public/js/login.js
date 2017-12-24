layui.config({
	base: "/js/"
}).use(['carousel'], function () {
	var carousel = layui.carousel;

	/**背景图片轮播*/
	carousel.render({
		elem     : '#login_carousel',
		width    : '100%',
		height   : '100%',
		interval : 2000,
		arrow    : 'none',
		anim     : 'fade',
		indicator: 'none'
	});
});