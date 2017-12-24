<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>后台管理系统登陆</title>
    <link rel="stylesheet" href="/public/layui/css/layui.css">
    <link rel="stylesheet" href="/view/login.css">
    <script type="text/javascript" src="/public/layui/layui.js"></script>
    <script type="text/javascript" src="/js/jquery.min.js"></script>
</head>
<div class="layui-carousel video_mask">
    <div carousel-item>
        <div class="carousel_div1"></div>
        <div class="carousel_div2"></div>
        <div class="carousel_div3"></div>
    </div>
    <div class="login layui-anim layui-anim-up">
        <h1>CMS 后台管理系统</h1></p>
        <form class="layui-form" action="" method="post">
            <div class="layui-form-item">
                <input type="text" name="username" lay-verify="required" placeholder="请输入账号" autocomplete="off" value=""
                       class="layui-input">
            </div>
            <div class="layui-form-item">
                <input type="password" name="password" value="<?php echo $password; ?>" salt="<?php echo $salt; ?>"
                       lay-verify="required" placeholder="<?php echo $entry_password; ?>" autocomplete="off"
                       class="layui-input">
            </div>
			<?php if (isset($this->session->data['captcha'])) { ?>
            <div class="layui-form-item form_code">
                <input class="layui-input" name="captcha" placeholder="<?php echo $entry_captcha; ?>"
                       lay-verify="required" type="text" autocomplete="off">
                <div class="code"><img src="/common/login/captcha" width="116" height="36"></div>
            </div>
			<?php } ?>
			<?php if ($redirect) { ?><input type="hidden" name="redirect" value="<?php echo $redirect; ?>" /><?php } ?>
            <a class="layui-btn login_btn" lay-submit="" lay-filter="login">登陆系统</a>
        </form>
    </div>
</div>
</body>
</html>