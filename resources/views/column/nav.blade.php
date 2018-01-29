<div class="fly-panel fly-column">
    <div class="layui-container">
        <ul class="layui-clear">
            @foreach($types as $key =>$type_name)
                <li @if(isset($type) && $key == $type) class="layui-this" @endif>
                    @if($key == 'all')
                        <a href="/">{{ $type_name }}</a>
                    @else
                        <a href="/column/{{ $key }}/">{{ $type_name }} @if($key=='share')<span class="layui-badge-dot"></span>@endif</a>
                    @endif
                </li>
            @endforeach
            <li class="layui-hide-xs layui-hide-sm layui-show-md-inline-block"><span class="fly-mid"></span></li>

            <!-- 用户登入后显示 -->
            @if (Auth::check())
            <li class="layui-hide-xs layui-hide-sm layui-show-md-inline-block"><a href="/user/post">我发表的贴</a>
            </li>
            <li class="layui-hide-xs layui-hide-sm layui-show-md-inline-block"><a href="../user/index.html#collection">我收藏的贴</a>
            </li>
            @endif
        </ul>

        <div class="fly-column-right layui-hide-xs">
            <span class="fly-search"><i class="layui-icon"></i></span>
            <a href="/jie/add" class="layui-btn">发表新帖</a>
        </div>
        <div class="layui-hide-sm layui-show-xs-block"
             style="margin-top: -10px; padding-bottom: 10px; text-align: center;">
            <a href="/jie/add" class="layui-btn">发表新帖</a>
        </div>
    </div>
</div>