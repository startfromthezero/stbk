@extends('layouts.base')
@section('content')
<div class="layui-container fly-marginTop fly-user-main">
  @include('user.nav')
  <div class="fly-panel fly-panel-user" pad20>
    <!--
    <div class="fly-msg" style="margin-top: 15px;">
      您的邮箱尚未验证，这比较影响您的帐号安全，<a href="activate.html">立即去激活？</a>
    </div>
    -->
    <div class="layui-tab layui-tab-brief" lay-filter="user">
      <ul class="layui-tab-title" id="LAY_mine">
        <li data-type="mine-jie" lay-id="index" class="layui-this">我发的帖（<span>{{ $mycount }}</span>）</li>
        <li data-type="collection" data-url="/collection/find/" lay-id="collection">我收藏的帖（<span>{{ $count }}</span>）</li>
      </ul>
      <div class="layui-tab-content" style="padding: 20px 0;">
        <div class="layui-tab-item layui-show">
          <ul class="mine-view jie-row">
            @foreach($news as $new)
            <li>
              <a class="jie-title" href="/jie/{{ $new->id }}" target="_blank">{{ $new->title }}</a>
              <i>{{ !empty($new->updated_at) ? $new->updated_at : $new->created_at }}</i>
              <a class="mine-edit" href="/jie/edit/{{ $new->id }}">编辑</a>
              <em>661阅/10答</em>
            </li>
            @endforeach
          </ul>
          <div id="LAY_page"></div>
        </div>
        <div class="layui-tab-item">
          <ul class="mine-view jie-row">
            @foreach($myFavorites as $favorite)
            <li>
              <a class="jie-title" href="/jie/{{ $favorite->id }}" target="_blank">{{ $favorite->title }}</a>
              <i>{{ $favorite->created_at }}</i>
            </li>
            @endforeach
          </ul>
          <div id="LAY_page1"></div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection