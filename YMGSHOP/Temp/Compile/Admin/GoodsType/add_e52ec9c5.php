<?php if(!defined("HDPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><!-- @author 李勇 626375290@qq.com -->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
<script type='text/javascript' src='http://localhost/hdphp/hdphp/Extend/Org/Jquery/jquery-1.8.2.min.js'></script>
<link href='http://localhost/hdphp/hdphp/Extend/Org/hdjs/hdui/css/hdui.css' rel='stylesheet' media='screen'>
<script src='http://localhost/hdphp/hdphp/Extend/Org/hdjs/hdui/js/hdui.js'></script>
<link href='http://localhost/hdphp/hdphp/Extend/Org/hdjs/hdvalidate/css/hdvalidate.css' rel='stylesheet' media='screen'>
<script src='http://localhost/hdphp/hdphp/Extend/Org/hdjs/hdvalidate/js/hdvalidate.js'></script>
<script src='http://localhost/hdphp/hdphp/Extend/Org/cal/lhgcalendar.min.js'></script>
<script src='http://localhost/hdphp/hdphp/Extend/Org/hdjs/hdslide/js/hdslide.js'></script>
<script type='text/javascript'>
HOST = 'http://localhost';
ROOT = 'http://localhost/ymgshop';
WEB = 'http://localhost/ymgshop/index.php';
URL = 'http://localhost/ymgshop/index.php/Admin/GoodsType/add';
APP = 'http://localhost/ymgshop/YMGSHOP';
COMMON = 'http://localhost/ymgshop/YMGSHOP/Common';
HDPHP = 'http://localhost/hdphp/hdphp';
HDPHPDATA = 'http://localhost/hdphp/hdphp/Data';
HDPHPEXTEND = 'http://localhost/hdphp/hdphp/Extend';
MODULE = 'http://localhost/ymgshop/index.php/Admin';
CONTROLLER = 'http://localhost/ymgshop/index.php/Admin/GoodsType';
ACTION = 'http://localhost/ymgshop/index.php/Admin/GoodsType/add';
STATIC = 'http://localhost/ymgshop/Static';
HDPHPTPL = 'http://localhost/hdphp/hdphp/Lib/Tpl';
VIEW = 'http://localhost/ymgshop/YMGSHOP/Admin/View';
PUBLIC = 'http://localhost/ymgshop/YMGSHOP/Admin/View/Public';
CONTROLLERVIEW = 'http://localhost/ymgshop/YMGSHOP/Admin/View/GoodsType';
HISTORY = 'http://localhost/ymgshop/index.php/Admin/Index/index';
</script>
<title>添加商品类型</title>
</head>
<body>
	<div class="warp">
	<div class="menu_list ">
		<ul>
			<li ><a href="<?php echo U('index');?>" class="action">商品类型列表</a></li>
			<li><a href="<?php echo U('add');?>">添加商品类型</a></li>
		</ul>
	</div>
		<div class="title-header">添加商品类型</div>
		<form  method="post">
			<table class="table2 hd-form">	
				<tr>
					<th class="w100">商品类型名称</th>
					<td>
						<input type="text" class="w200"  name="cat_name" />
					</td>
				</tr>
				<tr>
					<th></th>
					<td><input type="submit" value="添加" class="hd-success" /></td>
				</tr>
			</table>
			
		</form>
	</div>
</body>
</html>