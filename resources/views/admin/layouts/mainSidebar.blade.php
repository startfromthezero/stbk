<div class="layui-side layui-bg-black">
    <div class="user-photo">
        <a class="img" title="我的头像"><img src="/img/tongshao.jpg"></a>
        <p>你好！<span class="userName">{{auth('admin')->user()->username}}</span>, 欢迎登录</p>
    </div>
    <div class="navBar layui-side-scroll"></div>
</div>