<div class="fly-panel fly-column">
    <div class="layui-container">
        <ul class="layui-clear">
            @foreach($data['types'] as $type =>$type_name)
                <li @if(isset($data['type']) && $type == $data['type']) class="layui-this" @endif>
                    @if($type == 'all')
                        <a href="/">{{ $type_name }}</a>
                    @else
                        <a href="/column/{{ $type }}/">{{ $type_name }} @if($type=='share')<span class="layui-badge-dot"></span>@endif</a>
                    @endif
                </li>
            @endforeach
            <li class="layui-hide-xs layui-hide-sm layui-show-md-inline-block"><span class="fly-mid"></span></li>

            <!-- 用户登入后显示 -->
            @if (Route::has('login'))
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