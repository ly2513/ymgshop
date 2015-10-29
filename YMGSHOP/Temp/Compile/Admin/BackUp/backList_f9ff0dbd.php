<?php if(!defined("HDPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
<title>数据备份列表</title>
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
URL = 'http://localhost/ymgshop/index.php/Admin/BackUp/backList';
APP = 'http://localhost/ymgshop/YMGSHOP';
COMMON = 'http://localhost/ymgshop/YMGSHOP/Common';
HDPHP = 'http://localhost/hdphp/hdphp';
HDPHPDATA = 'http://localhost/hdphp/hdphp/Data';
HDPHPEXTEND = 'http://localhost/hdphp/hdphp/Extend';
MODULE = 'http://localhost/ymgshop/index.php/Admin';
CONTROLLER = 'http://localhost/ymgshop/index.php/Admin/BackUp';
ACTION = 'http://localhost/ymgshop/index.php/Admin/BackUp/backList';
STATIC = 'http://localhost/ymgshop/Static';
HDPHPTPL = 'http://localhost/hdphp/hdphp/Lib/Tpl';
VIEW = 'http://localhost/ymgshop/YMGSHOP/Admin/View';
PUBLIC = 'http://localhost/ymgshop/YMGSHOP/Admin/View/Public';
CONTROLLERVIEW = 'http://localhost/ymgshop/YMGSHOP/Admin/View/BackUp';
HISTORY = 'http://localhost/ymgshop/index.php?m=Admin';
</script>
</head>
<body>
	<div class="wrap">
		<div class="title-header">备份列表</div>
		<table class="table2">
			<thead>
			<tr>
				<td >目录</td>
				<td >备份时间</td>
				<td >大小</td>
				<td >操作</td>
			</tr>
			</thead>
			<tbody>
			<?php $hd["list"]["d"]["total"]=0;if(isset($dirs) && !empty($dirs)):$_id_d=0;$_index_d=0;$lastd=min(1000,count($dirs));
$hd["list"]["d"]["first"]=true;
$hd["list"]["d"]["last"]=false;
$_total_d=ceil($lastd/1);$hd["list"]["d"]["total"]=$_total_d;
$_data_d = array_slice($dirs,0,$lastd);
if(count($_data_d)==0):echo "";
else:
foreach($_data_d as $key=>$d):
if(($_id_d)%1==0):$_id_d++;else:$_id_d++;continue;endif;
$hd["list"]["d"]["index"]=++$_index_d;
if($_index_d>=$_total_d):$hd["list"]["d"]["last"]=true;endif;?>

			<tr>
				<td><?php echo $d['filename'];?></td>
				<td><?php echo date('Y-m-d H:i:s',$d['filemtime']);?></td>
				<td><?php echo get_size($d['size']);?></td>
				<td>
					<a href="<?php echo U('recovery',array('dir'=>$d['filename']));?>">还原</a> | 
					<a href="<?php echo U('del',array('dir'=>$d['filename']));?>">删除</a>
				</td>
			</tr>	
			<?php $hd["list"]["d"]["first"]=false;
endforeach;
endif;
else:
echo "";
endif;?>
			</tbody>
		</table>
	</div>
</body>
</html>