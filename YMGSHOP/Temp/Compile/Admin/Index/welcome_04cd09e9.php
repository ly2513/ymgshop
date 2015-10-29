<?php if(!defined("HDPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
    <title>HDJOB</title>
    <script type='text/javascript' src='http://localhost/product/hdphp/hdphp/Extend/Org/Jquery/jquery-1.8.2.min.js'></script>
<link href='http://localhost/product/hdphp/hdphp/Extend/Org/hdjs/hdui/css/hdui.css' rel='stylesheet' media='screen'>
<script src='http://localhost/product/hdphp/hdphp/Extend/Org/hdjs/hdui/js/hdui.js'></script>
<link href='http://localhost/product/hdphp/hdphp/Extend/Org/hdjs/hdvalidate/css/hdvalidate.css' rel='stylesheet' media='screen'>
<script src='http://localhost/product/hdphp/hdphp/Extend/Org/hdjs/hdvalidate/js/hdvalidate.js'></script>
<script src='http://localhost/product/hdphp/hdphp/Extend/Org/cal/lhgcalendar.min.js'></script>
<script src='http://localhost/product/hdphp/hdphp/Extend/Org/hdjs/hdslide/js/hdslide.js'></script>
<script type='text/javascript'>
HOST = 'http://localhost';
ROOT = 'http://localhost/product/ymgshop';
WEB = 'http://localhost/product/ymgshop/index.php';
URL = 'http://localhost/product/ymgshop/index.php/Admin/Index/welcome';
APP = 'http://localhost/product/ymgshop/YMGSHOP';
COMMON = 'http://localhost/product/ymgshop/YMGSHOP/Common';
HDPHP = 'http://localhost/product/hdphp/hdphp';
HDPHPDATA = 'http://localhost/product/hdphp/hdphp/Data';
HDPHPEXTEND = 'http://localhost/product/hdphp/hdphp/Extend';
MODULE = 'http://localhost/product/ymgshop/index.php/Admin';
CONTROLLER = 'http://localhost/product/ymgshop/index.php/Admin/Index';
ACTION = 'http://localhost/product/ymgshop/index.php/Admin/Index/welcome';
STATIC = 'http://localhost/product/ymgshop/Static';
HDPHPTPL = 'http://localhost/product/hdphp/hdphp/Lib/Tpl';
VIEW = 'http://localhost/product/ymgshop/YMGSHOP/Admin/View';
PUBLIC = 'http://localhost/product/ymgshop/YMGSHOP/Admin/View/Public';
CONTROLLERVIEW = 'http://localhost/product/ymgshop/YMGSHOP/Admin/View/Index';
HISTORY = 'http://localhost/product/ymgshop/index.php/Admin/Index/index';
</script>
    <link rel="stylesheet" type="text/css" href="./Css/welcome.css">
</head>
<body>
<div class="wrap">
    <div class="title-header">温馨提示</div>
    <table class="table2">
        <tr>
            <td style="color:red">
                欢迎使用HDCMS_EDU教学后台管理
            </td>
        </tr>
    </table>

    <div class="title-header">安全提示</div>
    <table class="table2">
        <tr>
            <td>1. 默认应用组目录hdphp(及子目录)设置为750,文件设置为640</td>
        </tr>
        <tr>
            <td>2. 建议删除安装目录install</td>
        </tr>
    </table>
    <div style="height:10px;overflow: hidden">&nbsp;</div>
    <div style="height:10px;overflow: hidden">&nbsp;</div>
    <div class="title-header">系统信息</div>
    <table class="table2">
        <tr>
            <td class="w80">HDCMS_EDU</td>
            <td>
                <?php echo C("VERSION");?>
            </td>
        </tr>
        <tr>
            <td class="w80">核心框架</td>
            <td>
                <a href="http://www.hdphp.com" target="_blank">HDPHP</a>
            </td>
        </tr>
        <tr>
            <td>PHP版本</td>
            <td>
                <?php echo PHP_OS; ?>
            </td>
        </tr>
        <tr>
            <td>运行环境</td>
            <td>
                <?php echo $_SERVER['SERVER_SOFTWARE'];?>
            </td>
        </tr>
        <tr>
            <td>允许上传大小</td>
            <td>
                <?php echo ini_get("upload_max_filesize"); ?>
            </td>
        </tr>
        <tr>
            <td>剩余空间</td>
            <td>
                <?php echo get_size(disk_free_space(".")); ?>
            </td>
        </tr>
    </table>
    <div style="height:10px;overflow: hidden">&nbsp;</div>
    <div class="title-header">程序团队</div>
    <table class="table2">
        <tr>
            <td>项目负责人</td>
            <td>
                李勇
            </td>
        </tr>
        <tr>
            <td>鸣谢</td>
            <td>
                <a href="http://bbs.houdunwang.com" target="_blank">后盾网所有盾友</a>

            </td>
        </tr>
    </table>
    <div style="height:10px;overflow: hidden">&nbsp;</div>

</div>
</body>
</html>