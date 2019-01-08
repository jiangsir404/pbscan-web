<?php /*a:4:{s:80:"E:\Code\github\passivescan\pbscan_web\application\admin\view\result\history.html";i:1546930967;s:78:"E:\Code\github\passivescan\pbscan_web\application\admin\view\public\_meta.html";i:1546930790;s:77:"E:\Code\github\passivescan\pbscan_web\application\admin\view\public\_nav.html";i:1546930259;s:76:"E:\Code\github\passivescan\pbscan_web\application\admin\view\public\_js.html";i:1546917206;}*/ ?>
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


<div class="container">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="<?php echo url('/admin/result/index'); ?>">漏洞管理</a></li>
            <li><a href="<?php echo url('/admin/result/history'); ?>">扫描历史</a></li>
        </ol>
        <h2>漏洞管理</h2>
        <table class="table table-hover table-bordered">
            <caption><?php if($requests->count() > 0): ?>共计<?php echo htmlentities($requests->count()); ?>条<?php else: ?>无数据<?php endif; ?></caption>
            <thead>
            <tr>
                <th>ID</th>
                <th>url</th>
                <th>scan_burp</th>
                <th>result_burp</th>
                <th>update_time</th>
            </tr>
            </thead>
            <tbody>
            <?php if(is_array($requests) || $requests instanceof \think\Collection || $requests instanceof \think\Paginator): $i = 0; $__LIST__ = $requests;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;if(session('admin.token') == $vo['token']): ?>
            <tr>
                <td><?php echo htmlentities($vo['id']); ?></td>
                <td width="100px"><?php echo htmlentities($vo['method']); ?>  <?php echo htmlentities($vo['host']); ?>:<?php echo htmlentities($vo['port']); ?><?php echo htmlentities($vo['path']); ?></td>
                <td><?php echo htmlentities($vo['scan_burp']); ?></td>
                <td><?php echo htmlentities($vo['result_burp']); ?></td>
                <td><?php echo htmlentities($vo['update_time']); ?></td>
            </tr>
            <?php endif; ?>
            <?php endforeach; endif; else: echo "" ;endif; ?>
            </tbody>
        </table>
        <nav>
            <?php echo $requests->render(); ?>
        </nav>
    </div>
</div>

<script src="/static/admin/js/jquery-3.3.1.min.js"></script>
<script src="/static/admin/js/bootstrap.min.js"></script>

</body>
<!--  /Body -->
</html>
