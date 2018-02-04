  @extends('layouts.base')
@section('content')
<div class="layui-container fly-marginTop fly-user-main">
  @include('user.nav')
  <div class="fly-panel fly-panel-user" pad20="" style="padding-top:20px;">
    <div class="fly-msg" style="margin-bottom: 20px;"> 您的邮箱尚未验证，这比较影响您的帐号安全，<a href="/user/activate/">立即去激活？</a>
    </div>
    <div class="layui-row layui-col-space20">
      <div class="layui-col-md6">
        <div class="fly-panel fly-signin fly-panel-border">
          <div class="fly-panel-title"> 签到 <i class="fly-mid"></i> <a href="javascript:;" class="fly-link"
                                                                      id="LAY_signinHelp">说明</a> <i class="fly-mid"></i>
            <a href="javascript:;" class="fly-link" id="LAY_signinTop">活跃榜<span class="layui-badge-dot"></span></a>
            <span class="fly-signin-days">已连续签到<cite>1</cite>天</span>
          </div>
          <div class="fly-panel-main fly-signin-main">
            <button class="layui-btn layui-btn-disabled">今日已签到</button>
            <span>获得了<cite>5</cite>飞吻</span></div>
        </div>
      </div>
      <div class="layui-col-md6">
        <div class="fly-panel fly-panel-border">
          <div class="fly-panel-title"> 我的会员信息</div>
          <div class="fly-panel-main layui-text" style="padding: 18px 15px; height: 50px; line-height: 26px;"><p>
              您的财富经验值：0</p>
            <p>您当前为：非 VIP</p></div>
        </div>
      </div>
      <div class="layui-col-md12" style="margin-top: -20px;">
        <div class="fly-panel fly-panel-border">
          <div class="fly-panel-title"> 快捷方式</div>
          <div class="fly-panel-main">
            <ul class="layui-row layui-col-space10 fly-shortcut">
              <li class="layui-col-sm3 layui-col-xs4"><a href="/user/set/"><i class="layui-icon"></i><cite>修改信息</cite></a>
              </li>
              <li class="layui-col-sm3 layui-col-xs4"><a href="/user/set/#avatar"><i
                          class="layui-icon"></i><cite>修改头像</cite></a>
              </li>
              <li class="layui-col-sm3 layui-col-xs4"><a href="/user/set/#pass"><i
                          class="layui-icon"></i><cite>修改密码</cite></a>
              </li>
              <li class="layui-col-sm3 layui-col-xs4"><a href="/user/set/#bind"><i
                          class="layui-icon"></i><cite>帐号绑定</cite></a>
              </li>
              <li class="layui-col-sm3 layui-col-xs4"><a href="/jie/add/"><i
                          class="layui-icon"></i><cite>发表新帖</cite></a></li>
              <li class="layui-col-sm3 layui-col-xs4"><a href="/column/share/"><i
                          class="layui-icon"></i><cite>查看分享</cite></a></li>
              <li class="layui-col-sm3 layui-col-xs4 LAY_search"><a href="javascript:;"><i
                          class="layui-icon"></i><cite>搜索资源</cite></a></li>
              <li class="layui-col-sm3 layui-col-xs4"><a href="/user/post/#collection"><i class="layui-icon"></i><cite>我的收藏</cite></a>
              </li>
              <li class="layui-col-sm3 layui-col-xs4"><a href="/jie/15697/"><i
                          class="layui-icon"></i><cite>成为赞助商</cite></a></li>
              <li class="layui-col-sm3 layui-col-xs4"><a href="/jie/2461/"><i class="layui-icon"></i><cite>关注公众号</cite></a>
              </li>
              <li class="layui-col-sm3 layui-col-xs4"><a href="http://www.layui.com/doc/"><i
                          class="layui-icon"></i><cite>文档</cite></a></li>
              <li class="layui-col-sm3 layui-col-xs4"><a href="http://www.layui.com/demo/"><i class="layui-icon"></i><cite>示例</cite></a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection