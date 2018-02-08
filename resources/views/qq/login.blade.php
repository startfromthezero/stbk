<span id="qqLoginBtn"></span>
<script tyoe="text/javascript" src="/js/jquery.min.js"></script>

<script type="text/javascript" src="http://qzonestyle.gtimg.cn/qzone/openapi/qc_loader.js" data-appid="101462624" data-redirecturi="http://www.stbk.xyz/callback.php" charset="utf-8"></script>

<script>
    var nickname, figureurl,openid,accesstoken;
        QC.Login({
                    //btnId：插入按钮的节点id，必选
                    btnId: "qqLoginBtn",
                    //用户需要确认的scope授权项，可选，默认all
                    scope: "all",
                    //按钮尺寸，可用值[A_XL| A_L| A_M| A_S|  B_M| B_S| C_S]，可选，默认B_S
                    size : "A_XL"
                });
    //window.location.href='https://graph.qq.com/oauth2.0/show?which=Login&display=pc&client_id=101462624&redirect_uri=http://www.stbk.xyz/callback.php&response_type=code&scope=get_user_info';
    QC.api("get_user_info", {})
            //指定接口访问成功的接收函数，s为成功返回Response对象
            .success(function (s)
            {
                nickname= s.data.nickname;
                figureurl = s.data.figureurl;
                console.log(s);
                //成功回调，通过s.data获取OpenAPI的返回数据
                //alert("获取用户信息成功！当前用户昵称为：" + s.data.nickname);
            })
            //指定接口访问失败的接收函数，f为失败返回Response对象
            .error(function (f)
            {
                //失败回调
                alert("获取用户信息失败！");
            })
            //指定接口完成请求后的接收函数，c为完成请求返回Response对象
            .complete(function (c)
            {
                //完成请求回调
                //alert("获取用户信息完成！");
                //检查是否登录
                if (QC.Login.check())
                {//如果已登录
                    QC.Login.getMe(function (openId, accessToken)
                    {
                        $.post('/user/qqlogin',{name: nickname,img: figureurl,openid: openId, accesstoken: accessToken,_token: $('meta[name="_token"]').attr('content')});
                        //alert(["当前登录用户的", "openId为：" + openId, "accessToken为：" + accessToken].join("\n"));
                    });
                    //这里可以调用自己的保存接口
                    //...
                }
            });

</script>
