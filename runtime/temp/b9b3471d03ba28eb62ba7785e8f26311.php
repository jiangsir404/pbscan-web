<?php /*a:1:{s:77:"E:\Code\github\passivescan\pbscan_web\application\admin\view\index\login.html";i:1546851678;}*/ ?>
<!DOCTYPE html>
<html lang="zh">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>pbscan 管理后台</title>
    <link rel="shortcut icon" href="/static/admin/img/logo.jpg" type="image/x-icon">
    <link href="/static/admin/css/bootstrap.min.css" rel="stylesheet" />
    <link href="/static/admin/css/font-awesome.min.css" rel="stylesheet" />
    <link href="/static/admin/css/weather-icons.min.css" rel="stylesheet" />
    <link id="beyond-link" href="/static/admin/css/beyond.min.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div class="login-container">
    <div class="loginbox bg-white">
        <div class="loginbox-title">登录</div>

        <div class="loginbox-or">
            <div class="or-line"></div>
        </div>
        <form>
            <div class="loginbox-textbox">
                <input type="text" class="form-control" name="username" placeholder="用户名" />
            </div>
            <div class="loginbox-textbox">
                <input type="password" class="form-control" name="password" placeholder="密码" />
            </div>
            <div class="loginbox-forgot">
                <a href="#">忘记密码?</a>
            </div>
            <div class="loginbox-submit">
                <input type="button" class="btn btn-primary btn-block" id="login" value="登录">
            </div>
        </form>
        <div class="loginbox-signup">
            <a href="<?php echo url('admin/index/register'); ?>">注册账户</a>
        </div>
    </div>
</div>

<script src="/static/admin/js/skins.min.js"></script>
<!--Basic Scripts-->
<script src="/static/admin/js/jquery.min.js"></script>
<script src="/static/admin/js/bootstrap.min.js"></script>
<script src="/static/admin/js/slimscroll/jquery.slimscroll.min.js"></script>
<!--Beyond Scripts-->
<script src="/static/admin/js/beyond.js"></script>
<script src="/static/lib/layer/layer.js"></script>
<script>
    $(window).bind("load", function () {

        /*Sets Themed Colors Based on Themes*/
        themeprimary = getThemeColorFromCss('themeprimary');
        themesecondary = getThemeColorFromCss('themesecondary');
        themethirdcolor = getThemeColorFromCss('themethirdcolor');
        themefourthcolor = getThemeColorFromCss('themefourthcolor');
        themefifthcolor = getThemeColorFromCss('themefifthcolor');

    });

    $(function () {
        $('#login').click(function () {
            $.ajax({
                url:"/admin/index/login",
                type:"post",
                data:$('form').serialize(),
                dataType:'json',
                success:function (data) {
                    if (data.code == 1) {
                        layer.msg(data.msg, {
                            icon:6,
                            time:2000
                        }, function () {
                            location.href = data.url;
                        });
                    }else {
                        layer.open({
                            title:'登录失败',
                            content:data.msg,
                            icon:5,
                            anim:6
                        });
                    }
                }
            });
            return false;
        });
    });
</script>
</body>
<!--  /Body -->
</html>
