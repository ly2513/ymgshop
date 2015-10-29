<?php if(!defined("HDPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
<title>支付宝配置</title>
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
URL = 'http://localhost/product/ymgshop/index.php/Admin/Alipay/index';
APP = 'http://localhost/product/ymgshop/YMGSHOP';
COMMON = 'http://localhost/product/ymgshop/YMGSHOP/Common';
HDPHP = 'http://localhost/product/hdphp/hdphp';
HDPHPDATA = 'http://localhost/product/hdphp/hdphp/Data';
HDPHPEXTEND = 'http://localhost/product/hdphp/hdphp/Extend';
MODULE = 'http://localhost/product/ymgshop/index.php/Admin';
CONTROLLER = 'http://localhost/product/ymgshop/index.php/Admin/Alipay';
ACTION = 'http://localhost/product/ymgshop/index.php/Admin/Alipay/index';
STATIC = 'http://localhost/product/ymgshop/Static';
HDPHPTPL = 'http://localhost/product/hdphp/hdphp/Lib/Tpl';
VIEW = 'http://localhost/product/ymgshop/YMGSHOP/Admin/View';
PUBLIC = 'http://localhost/product/ymgshop/YMGSHOP/Admin/View/Public';
CONTROLLERVIEW = 'http://localhost/product/ymgshop/YMGSHOP/Admin/View/Alipay';
HISTORY = 'http://localhost/product/ymgshop/index.php/Admin/Alipay/index';
</script>
<!-- <link href='http://localhost/product/hdphp/hdphp/Extend/Org/bootstrap/css/bootstrap.min.css' rel='stylesheet' media='screen'>
<script src='http://localhost/product/hdphp/hdphp/Extend/Org/bootstrap/js/bootstrap.min.js'></script> -->
</head>
<body>
	<form class="form1" method="post">

		<div class="menu_list hd-form">
			<ul>
				<li>
					<a href="javascript:;">支付宝设置</a>
				</li>
			</ul>
		</div>
		<table class="table2 hd-form">
				<tr>
					<th>账号：</th>
					<td>
						<input type="text" class="w200" name="accont" value="<?php echo $accont;?>" />
					</td>
				</tr>
				<tr>
					<th>PID：</th>
					<td>
						<input type="text" class="w200" name="pid" value="<?php echo $pid;?>" />
					</td>
				</tr>
				<tr>
					<th>KEY：</th>
					<td>
						<input type="text" class="w250" name="key" value="<?php echo $key;?>" />
					</td>
				</tr>
				<tr>
					<th >
					</th>
					<td >
						<input class="hd-success" type="submit" value="保存">
					</td>
				</tr>
		</table>

	</form>
</body>
</html>
