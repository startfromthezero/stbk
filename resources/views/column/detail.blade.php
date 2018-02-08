@extends('layouts.base')
@section('content')
@include('column.nav')
<div class="layui-container">
  <div class="layui-row layui-col-space15">
    <div class="layui-col-md8 content detail">
      <div class="fly-panel detail-box">
        <h1>{{ $new->title }}</h1>
        <div class="fly-detail-info">
          <!-- <span class="layui-badge">审核中</span> -->
          <span class="layui-badge layui-bg-green fly-detail-column">{{ $types[$keys[$new->type_id]] }}</span>

          @if($new->is_show)
            <span class="layui-badge" style="background-color: #5FB878;">已结</span>
          @else
          <span class="layui-badge" style="background-color: #999;">未结</span>
          @endif
          @if($new->is_top)
          <span class="layui-badge layui-bg-black">置顶</span>
          @endif
          @if($new->is_recomm)
          <span class="layui-badge layui-bg-red">精帖</span>
          @endif
          @if(Auth::id() == 1)
          <div class="fly-admin-box" data-id="{{ $new->id }}" data-token="{{ csrf_token() }}">
            <span class="layui-btn layui-btn-xs jie-admin" type="del">删除</span>
            @if($new->is_top)
              <span class="layui-btn layui-btn-xs jie-admin" type="set" field="is_top" rank="0" style="background-color:#ccc;">取消置顶</span>
            @else
              <span class="layui-btn layui-btn-xs jie-admin" type="set" field="is_top" rank="1">置顶</span>
            @endif
            @if($new->is_recomm)
            <span class="layui-btn layui-btn-xs jie-admin" type="set" field="is_recomm" rank="0" style="background-color:#ccc;">取消加精</span>
            @else
              <span class="layui-btn layui-btn-xs jie-admin" type="set" field="is_recomm" rank="1">加精</span>
            @endif
          </div>
          @endif
          <span class="fly-list-nums">
            <a href="#comment"><i class="iconfont" title="回答">&#xe60c;</i> {{ $reply }}</a>
            <i class="iconfont" title="人气">&#xe60b;</i> {{ $new->view_count }}
          </span>
        </div>
        <div class="detail-about">
          <a class="fly-avatar" href="../user/home.html">
            <img src="https://tva1.sinaimg.cn/crop.0.0.118.118.180/5db11ff4gw1e77d3nqrv8j203b03cweg.jpg" alt="贤心">
          </a>
          <div class="fly-detail-user">
            <a href="../user/home.html" class="fly-link">
              <cite>贤心</cite>
              <i class="iconfont icon-renzheng" title="认证信息"></i>
              <i class="layui-badge fly-badge-vip">VIP3</i>
            </a>
            <span>{{ $new->created_at }}</span>
          </div>
          <div class="detail-hits" id="LAY_jieAdmin" data-id="{{ $new->id }}">
            <span style="padding-right: 10px; color: #FF7200">悬赏：60飞吻</span>
            @if(auth::check())
            @if($new->favorited($new->id))
              <span class="layui-btn layui-btn-xs jie-admin layui-btn-danger" type="collect" data-type="remove">取消收藏</span>
            @else
              <span class="layui-btn layui-btn-xs jie-admin" type="collect" data-type="add">收藏</span>
            @endif
            @if(auth::id() == $new->user_id)
            <span class="layui-btn layui-btn-xs jie-admin" type="edit"><a href="/jie/edit/{{$new->id}}">编辑此贴</a></span>
            @endif
            @endif
          </div>

        </div>
        <div class="detail-body photos">
          <?php echo htmlspecialchars_decode($new->content) ?>
        </div>
      </div>

      <div class="fly-panel detail-box" id="flyReply">
        <fieldset class="layui-elem-field layui-field-title" style="text-align: center;">
          <legend>回帖</legend>
        </fieldset>

        <ul class="jieda" id="jieda">
          @if(!isset($new->hasManyComments[0]))
          <!-- 无数据时 -->
          <li class="fly-none">消灭零回复</li>
          @else
          @foreach($new->hasManyComments as $comment)
              <li data-id="{{ $comment->id }}">
                <a name="item-1111111111"></a>
                <div class="detail-about detail-about-reply">
                  <a class="fly-avatar" href="">
                    <img src="https://tva1.sinaimg.cn/crop.0.0.118.118.180/5db11ff4gw1e77d3nqrv8j203b03cweg.jpg" alt=" ">
                  </a>
                  <div class="fly-detail-user">
                    <a href="" class="fly-link">
                      <cite>{{ $users[$comment->user_id] }}</cite>
                      <i class="iconfont icon-renzheng" title="认证信息：XXX"></i>
                      <i class="layui-badge fly-badge-vip">VIP3</i>
                    </a>
                    @if($new->user_id == $comment->user_id)
                    <span>(楼主)</span>
                    @endif
                    <!--
                    <span style="color:#5FB878">(管理员)</span>
                    <span style="color:#FF9E3F">（社区之光）</span>
                    <span style="color:#999">（该号已被封）</span>
                    -->
                  </div>
                  <div class="detail-hits">
                    <span>{{ $comment->created_at }}</span>
                  </div>
                </div>
                <div class="detail-body jieda-body photos">
                  <p>{{ $comment->content }}</p>
                </div>
                <div class="jieda-reply">
                <span class="jieda-zan @if(Auth::check() && Auth::user()->hasUpVoted($comment))zanok @endif" type="zan">
                  <i class="iconfont icon-zan"></i>
                  <em>{{ $comment->countUpVoters() }}</em>
                </span>
                <span type="reply">
                  <i class="iconfont icon-svgmoban53"></i>
                  回复
                </span>
                  <div class="jieda-admin">
                    @if(Auth::id() == $comment->user_id)
                    <span type="edit">编辑</span>
                    <span type="del">删除</span>
                    @endif
                    @if(Auth::id() == $new->user_id)
                    <span class="jieda-accept" type="accept">采纳</span>
                    @endif
                  </div>
                </div>
              </li>
          @endforeach
          @endif
        </ul>

        <div class="layui-form layui-form-pane">
            @if(auth::check())
          <form action="/comment/reply/" method="POST" role="form">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="user_id" value="{{ Auth::id() }}" />
            <input type="hidden" name="parent_id" value="0" />
            <input type="hidden" name="new_id" value="{{ $new->id }}" />
            <div class="layui-form-item layui-form-text">
              <a name="comment"></a>
              <div class="layui-input-block">
                <textarea id="L_content" name="content" required lay-verify="required" placeholder="请输入内容" class="layui-textarea fly-editor" style="height: 150px;"></textarea>
              </div>
            </div>
            <div class="layui-form-item">
              <button class="layui-btn" type="submit">提交回复</button>
            </div>
          </form>
                @else
                <blockquote class="layui-elem-quote layui-quote-nm" style="margin: 100px 0 20px; padding: 50px 20px; text-align: center; color: #999!important;">
                    评论请先<a href="/login"><cite>登录</cite></a>或<a href="/register">注册</a>
                </blockquote>
                @endif
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
          <a href="http://layim.layui.com/?from=fly" target="_blank" class="fly-zanzhu" time-limit="2017.09.25-2099.01.01" style="background-color: #5FB878;">LayIM 3.0 - layui 旗舰之作</a>
        </div>
      </div>

      <div class="fly-panel" style="padding: 20px 0; text-align: center;">
        <img src="/images/weixin.jpg" style="max-width: 100%;" alt="layui">
        <p style="position: relative; color: #666;">微信扫码关注 layui 公众号</p>
      </div>

    </div>
  </div>
</div>
@endsection