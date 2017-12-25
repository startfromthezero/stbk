{{--
  <header class="main-header">
    <!-- Logo -->
    <a href="/" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>Big</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Big</b>Pang</span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">


          <!-- User Account Menu -->
          <li class="dropdown user user-menu">
            <!-- Menu Toggle Button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">

              <span class="hidden-xs">{{auth('admin')->user()->name}}</span>
            </a>
            <ul class="dropdown-menu">
              <!-- The user image in the menu -->
              <li class="user-header">
                <img src="/123.png" class="img-circle" alt="User Image">
                <p>
                  {{auth('admin')->user()->username}} - 系统管理员
                  <small>最后登录:{{date('Y-m-d H:i',strtotime(auth('admin')->user()->updated_at))}}</small>
                </p>
              </li>

              </li>
              <!-- Menu Footer-->
              <li class="user-footer">

                <div class="pull-right">
                  <a href="/admin/logout" class="btn btn-default btn-flat">登出</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  --}}
<div class="layui-header header">
  <div class="layui-main">
    <a href="/" class="logo">风之迷者</a>
    <!-- 显示/隐藏菜单 -->
    <a href="javascript:;" class="iconfont hideMenu icon-menu1"></a>
    <!-- 顶部右侧菜单 -->
    <ul class="layui-nav top_menu">
      <li class="layui-nav-item purgeCache" id="purgeCache" pc>
        <a href="/common/home/flush"><i class="layui-icon" data-icon="&#x1002;">&#x1002;</i><cite>清除缓存</cite></a>
      </li>
      <li class="layui-nav-item showNotice" id="showNotice" pc>
        <a href="javascript:;"><i class="iconfont icon-gonggao"></i><cite>&#xe652;系统公告</cite></a>
      </li>
      <li class="layui-nav-item" mobile>
        <a href="javascript:;" class="mobileAddTab" data-url="page/user/changePwd.html"><i class="iconfont icon-shezhi1" data-icon="icon-shezhi1"></i><cite>设置</cite></a>
      </li>
      <li class="layui-nav-item" mobile>
        <a href="/admin/logout" class="signOut"><i class="iconfont icon-loginout"></i> 退出</a>
      </li>
      <li class="layui-nav-item lockcms" pc>
        <a href="javascript:;"><i class="iconfont icon-lock1"></i><cite>锁屏</cite></a>
      </li>
      <li class="layui-nav-item" pc>
        <a href="javascript:;">
          <img src="/img/tongshao.jpg" class="layui-circle" width="35" height="35">
          <cite>{{auth('admin')->user()->username}}</cite>
        </a>
        <dl class="layui-nav-child">
          <dd><a href="javascript:;" data-url="/user/user/info"><i class="iconfont icon-zhanghu" data-icon="icon-zhanghu"></i><cite>个人资料</cite></a></dd>
          <dd><a href="javascript:;" data-url="/user/user/changePwd"><i class="iconfont icon-shezhi1" data-icon="icon-shezhi1"></i><cite>修改密码</cite></a></dd>
          <dd><a href="javascript:;" class="changeSkin"><i class="iconfont icon-huanfu"></i><cite>更换皮肤</cite></a></dd>
          <dd><a href="/admin/logout" class="signOut" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="iconfont icon-loginout"></i><cite>退出</cite></a>
            {{--<form id="logout-form" action="{{ url('admin/logout') }}" method="POST" style="display: none;">--}}
              {{--{{ csrf_field() }}--}}
            {{--</form>--}}
          </dd>
        </dl>
      </li>
    </ul>
  </div>
</div>