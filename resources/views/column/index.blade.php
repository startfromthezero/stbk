<!-- 加载头部-->
@include ('layouts.header')
<div class="fly-panel fly-column">
    <div class="layui-container">
        <ul class="layui-clear">
            @foreach($data['types'] as $type =>$type_name)
                <li @if($type == $data['type']) class="layui-this" @endif>
                    @if($type == 'all')
                        <a href="/">{{ $type_name }}</a>
                    @else
                        <a href="/column/{{ $type }}/">{{ $type_name }} @if($type=='share')<span class="layui-badge-dot"></span>@endif</a>
                    @endif
                </li>
            @endforeach
            <li class="layui-hide-xs layui-hide-sm layui-show-md-inline-block"><span class="fly-mid"></span></li>

            <!-- 用户登入后显示 -->
            <li class="layui-hide-xs layui-hide-sm layui-show-md-inline-block"><a href="../user/index.html">我发表的贴</a>
            </li>
            <li class="layui-hide-xs layui-hide-sm layui-show-md-inline-block"><a href="../user/index.html#collection">我收藏的贴</a>
            </li>
        </ul>

        <div class="fly-column-right layui-hide-xs">
            <span class="fly-search"><i class="layui-icon"></i></span>
            <a href="/jie/add" class="layui-btn">发表新帖</a>
        </div>
        <div class="layui-hide-sm layui-show-xs-block" style="margin-top: -10px; padding-bottom: 10px; text-align: center;">
            <a href="/jie/add" class="layui-btn">发表新帖</a>
        </div>
    </div>
</div>
<div class="layui-container">
    <div class="layui-row layui-col-space15">
        <div class="layui-col-md8">
            <div class="fly-panel" style="margin-bottom: 0;">
                <div class="fly-panel-title fly-filter">
                    @foreach($data['status'] as $state =>$state_name)
                    @if(empty($data['type']))
                        <a href="/column/all/{{$state}}" @if($state == $data['state']) class="layui-this" @endif>{{$state_name}}</a>
                    @else
                        <a href="/column/{{$data['type']}}/{{$state}}" @if($state == $data['state']) class="layui-this" @endif>{{$state_name}}</a>
                    @endif
                    @if($state != 'wonderful')
                    <span class="fly-mid"></span>
                    @endif
                    @endforeach
                    <span class="fly-filter-right layui-hide-xs">
            <a href="" class="layui-this">按最新</a>
            <span class="fly-mid"></span>
            <a href="">按热议</a>
          </span>
                </div>

                <ul class="fly-list">
                    @foreach($data['news'] as $new)
                    <li>
                        <a href="user/home.html" class="fly-avatar">
                            <img src="https://tva1.sinaimg.cn/crop.0.0.118.118.180/5db11ff4gw1e77d3nqrv8j203b03cweg.jpg" alt="贤心">
                        </a>
                        <h2>
                            <a class="layui-badge">{{$data['types'][$data['array'][$new->type_id]]}}</a>
                            <a href="/jie/{{ $new->id }}">{{$new->title}}</a>
                        </h2>
                        <div class="fly-list-info">
                            <a href="user/home.html" link>
                                <cite>贤心</cite>
                                <i class="iconfont icon-renzheng" title="认证信息：XXX"></i>
                                <i class="layui-badge fly-badge-vip">VIP3</i>
                            </a>
                            <span>{{$new->created_at}}</span>

                            <span class="fly-list-kiss layui-hide-xs" title="悬赏飞吻"><i class="iconfont icon-kiss"></i> 60</span>
                            @if(!$new->is_show)
                                <span class="layui-badge fly-badge-accept layui-hide-xs">已结</span>
                            @endif
                            <span class="fly-list-nums">
                <i class="iconfont icon-pinglun1" title="回答"></i> 66
              </span>
                        </div>
                        @if($new->is_top || $new->is_recomm)
                        <div class="fly-list-badge">
                            @if($new->is_top)
                            <span class="layui-badge layui-bg-black">置顶</span>
                            @endif
                            @if($new->is_recomm)
                            <span class="layui-badge layui-bg-red">精帖</span>
                            @endif
                        </div>
                        @endif
                    </li>
                    @endforeach
                    <li>
                        <a href="user/home.html" class="fly-avatar">
                            <img src="https://tva1.sinaimg.cn/crop.0.0.118.118.180/5db11ff4gw1e77d3nqrv8j203b03cweg.jpg" alt="贤心">
                        </a>
                        <h2>
                            <a class="layui-badge">动态</a>
                            <a href="detail.html">基于 layui 的极简社区页面模版</a>
                        </h2>
                        <div class="fly-list-info">
                            <a href="user/home.html" link>
                                <cite>贤心</cite>
                                <!--<i class="iconfont icon-renzheng" title="认证信息：XXX"></i>-->
                                <i class="layui-badge fly-badge-vip">VIP3</i>
                            </a>
                            <span>刚刚</span>

                            <span class="fly-list-kiss layui-hide-xs" title="悬赏飞吻"><i class="iconfont icon-kiss"></i> 60</span>
                            <span class="layui-badge fly-badge-accept layui-hide-xs">已结</span>
                            <span class="fly-list-nums">
                <i class="iconfont icon-pinglun1" title="回答"></i> 66
              </span>
                        </div>
                        <div class="fly-list-badge">
                            <span class="layui-badge layui-bg-red">精帖</span>
                        </div>
                    </li>
                </ul>

                <!-- <div class="fly-none">没有相关数据</div> -->

                <div style="text-align: center">
                    <div id="page"></div>
                </div>

            </div>
        </div>
        <div class="layui-col-md4">
            <dl class="fly-panel fly-list-one">
                <dt class="fly-panel-title">本周热议</dt>
                <dd>
                    <a href="">基于 layui 的极简社区页面模版</a>
                    <span><i class="iconfont icon-pinglun1"></i> 16</span>
                </dd>
                <!-- 无数据时 -->
                <!--
                <div class="fly-none">没有相关数据</div>
                -->
            </dl>

            <div class="fly-panel">
                <div class="fly-panel-title">
                    这里可作为广告区域
                </div>
                <div class="fly-panel-main">
                    <a href="" target="_blank" class="fly-zanzhu" style="background-color: #393D49;">虚席以待</a>
                </div>
            </div>

            <div class="fly-panel fly-link">
                <h3 class="fly-panel-title">友情链接</h3>
                <dl class="fly-panel-main">
                    <dd><a href="http://www.layui.com/" target="_blank">layui</a>
                    <dd>
                    <dd><a href="http://layim.layui.com/" target="_blank">WebIM</a>
                    <dd>
                    <dd><a href="http://layer.layui.com/" target="_blank">layer</a>
                    <dd>
                    <dd><a href="http://www.layui.com/laydate/" target="_blank">layDate</a>
                    <dd>
                    <dd>
                        <a href="mailto:xianxin@layui-inc.com?subject=%E7%94%B3%E8%AF%B7Fly%E7%A4%BE%E5%8C%BA%E5%8F%8B%E9%93%BE"
                           class="fly-link">申请友链</a>
                    <dd>
                </dl>
            </div>

        </div>
    </div>
</div>
@include('layouts.fooder')