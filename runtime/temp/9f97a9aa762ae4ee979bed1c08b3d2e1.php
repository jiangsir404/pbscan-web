<?php /*a:5:{s:76:"E:\Code\github\passivescan\pbscan_web\application\admin\view\home\index.html";i:1546932346;s:78:"E:\Code\github\passivescan\pbscan_web\application\admin\view\public\_meta.html";i:1546932346;s:77:"E:\Code\github\passivescan\pbscan_web\application\admin\view\public\_nav.html";i:1546932346;s:80:"E:\Code\github\passivescan\pbscan_web\application\admin\view\public\_footer.html";i:1546932346;s:76:"E:\Code\github\passivescan\pbscan_web\application\admin\view\public\_js.html";i:1546932346;}*/ ?>
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
    <link rel="stylesheet" href="/static/admin/css/main.css">
</head>
<body>

<nav class="navbar navbar-default navbar-static-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Pbscan</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="<?php echo url('admin/home/index'); ?>"><span class="glyphicon glyphicon-home"></span> Home</a></li>
                <li><a href="<?php echo url('admin/result/index'); ?>"><span class="glyphicon glyphicon-eye-open"></span> 漏洞管理</a></li>
                <li><a href="<?php echo url('admin/result/history'); ?>"><span class="glyphicon glyphicon-globe"></span> 扫描历史</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#"><span class="glyphicon glyphicon-user"></span> <?php echo session('admin.username'); ?></a></li>
                <li><a href="<?php echo url('admin/home/logout'); ?>"><span class="glyphicon glyphicon-off"></span> 退出</a></li>
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</nav>

<!-- /Navbar -->
<!-- Main Container -->

<div class="container admin-body">
    <div class="row">
            <div class="content col-xs-8 col-xs-offset-2">
                    <table class="table table-hover table-bordered">
                        <thead>
                        <tr>
                            <th colspan="2">基本信息</th>
                        </tr>
                        </thead>
                        <tbody>、
                        <tr>
                            <td>我的token</td>
                            <td><?php echo htmlentities($token); ?></td>
                        </tr>
                        <tr>
                            <td>服务器域名</td>
                            <td><?php echo htmlentities(app('request')->domain()); ?></td>
                        </tr>
                        <tr>
                            <td>服务器IP地址</td>
                            <td><?php echo htmlentities(app('request')->ip()); ?></td>
                        </tr>
                        <tr>
                            <td>服务器端口</td>
                            <td><?php echo htmlentities(app('request')->port()); ?></td>
                        </tr>
                        </tbody>
                    </table>
            </div>
    </div>
</div>



<script src="/static/admin/js/jquery-3.3.1.min.js"></script>
<script src="/static/admin/js/bootstrap.min.js"></script>
</body>
</html>