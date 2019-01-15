<?php /*a:3:{s:89:"/mnt/hgfs/File/Code/github/passivescan/pbscan_web/application/admin/view/index/login.html";i:1546932346;s:90:"/mnt/hgfs/File/Code/github/passivescan/pbscan_web/application/admin/view/public/_meta.html";i:1546932346;s:88:"/mnt/hgfs/File/Code/github/passivescan/pbscan_web/application/admin/view/public/_js.html";i:1546932346;}*/ ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>pbscan管理后台</title>
    <link rel="shortcut icon" href="/static/admin/images/logo.jpg" type="image/x-icon">
    <link rel="stylesheet" href="/static/admin/css/bootstrap.min.css">
</head>
<body>

<div class="container col-xs-2 col-xs-offset-5">
    <br/>
    <br>
    <br>
    <br>
    <br>
    <h2 class="admin-title">Pbscan后台登录</h2>
    <form>
        <div class="form-group">
            <label for="username" class="control-label">用户名</label>
            <input type="text" class="form-control" id="username" name="username" placeholder="用户名">
        </div>
        <div class="form-group">
            <label for="password" class="control-label">密码</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="密码">
        </div>
        <div class="loginbox-submit">
            <input type="button" class="btn btn-primary btn-block" id="login" value="登录">
        </div>
    </form>
</div>

<script src="/static/admin/js/jquery-3.3.1.min.js"></script>
<script src="/static/admin/js/bootstrap.min.js"></script>
<script src="/static/lib/layer/layer.js"></script>
<script>

    $(function () {
        $('#login').click(function () {
            $.ajax({
                url:"/admin/index/login",
                type:"post",
                data:$('form').serialize(),
                dataType:'json',
                success:function (data) {
                    if (data.code == 1) {
                        location.href = data.url;
                        // layer.msg(data.msg, {
                        //     icon:6
                        // }, function () {
                        //     location.href = data.url;
                        // });
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
