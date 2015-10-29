<?php if(!defined("HDPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><!-- @author 李勇 626375290@qq.com -->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
<title>商品属性列表</title>
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
URL = 'http://localhost/ymgshop/index.php/Admin/Attribute/index&cat_id=3';
APP = 'http://localhost/ymgshop/YMGSHOP';
COMMON = 'http://localhost/ymgshop/YMGSHOP/Common';
HDPHP = 'http://localhost/hdphp/hdphp';
HDPHPDATA = 'http://localhost/hdphp/hdphp/Data';
HDPHPEXTEND = 'http://localhost/hdphp/hdphp/Extend';
MODULE = 'http://localhost/ymgshop/index.php/Admin';
CONTROLLER = 'http://localhost/ymgshop/index.php/Admin/Attribute';
ACTION = 'http://localhost/ymgshop/index.php/Admin/Attribute/index';
STATIC = 'http://localhost/ymgshop/Static';
HDPHPTPL = 'http://localhost/hdphp/hdphp/Lib/Tpl';
VIEW = 'http://localhost/ymgshop/YMGSHOP/Admin/View';
PUBLIC = 'http://localhost/ymgshop/YMGSHOP/Admin/View/Public';
CONTROLLERVIEW = 'http://localhost/ymgshop/YMGSHOP/Admin/View/Attribute';
HISTORY = 'http://localhost/ymgshop/index.php/Admin/Attribute/index/cat_id/1';
</script>
</head>
<body>
	<div class="warp">
		<div class="menu_list hd-form">
			<ul>
				<li>
					<a href="<?php echo U('add',array('cat_id'=>Q('cat_id')));?>">添加商品属性</a>
				</li>
				<li>
					<select onchange="changeGoodsType(this)">
						<option value="0">==请选择类型==</option>
						<?php $hd["list"]["d"]["total"]=0;if(isset($goods_type) && !empty($goods_type)):$_id_d=0;$_index_d=0;$lastd=min(1000,count($goods_type));
$hd["list"]["d"]["first"]=true;
$hd["list"]["d"]["last"]=false;
$_total_d=ceil($lastd/1);$hd["list"]["d"]["total"]=$_total_d;
$_data_d = array_slice($goods_type,0,$lastd);
if(count($_data_d)==0):echo "";
else:
foreach($_data_d as $key=>$d):
if(($_id_d)%1==0):$_id_d++;else:$_id_d++;continue;endif;
$hd["list"]["d"]["index"]=++$_index_d;
if($_index_d>=$_total_d):$hd["list"]["d"]["last"]=true;endif;?>

							<option value="<?php echo $d['cat_id'];?>"<?php if($d['cat_id']==Q('cat_id')){?>selected=''<?php }?>><?php echo $d['cat_name'];?></option>
						<?php $hd["list"]["d"]["first"]=false;
endforeach;
endif;
else:
echo "";
endif;?>
					</select>
				</li>
			</ul>
		</div>
		<table class="table2">
			<thead>
				<tr>
					<td>ID</td>
					<td>商品属性名</td>
					<td>商品属性类型</td>
					<td>录入方式</td>
					<td>操作<td>
				</tr>
			</thead>
			<tbody>
				<?php $hd["list"]["d"]["total"]=0;if(isset($data) && !empty($data)):$_id_d=0;$_index_d=0;$lastd=min(1000,count($data));
$hd["list"]["d"]["first"]=true;
$hd["list"]["d"]["last"]=false;
$_total_d=ceil($lastd/1);$hd["list"]["d"]["total"]=$_total_d;
$_data_d = array_slice($data,0,$lastd);
if(count($_data_d)==0):echo "";
else:
foreach($_data_d as $key=>$d):
if(($_id_d)%1==0):$_id_d++;else:$_id_d++;continue;endif;
$hd["list"]["d"]["index"]=++$_index_d;
if($_index_d>=$_total_d):$hd["list"]["d"]["last"]=true;endif;?>
	
				<tr>
					<td><?php echo $d['attr_id'];?></td>
					<td><?php echo $d['attr_name'];?></td>
					<td><?php echo $d['attr_type_text'];?></td>
					<td><?php echo $d['attr_input_type_text'];?></td>
					<td>
						<a href="<?php echo U('edit',array('attr_id'=>$d['attr_id'],'cat_id'=>$d['cat_id']));?>">编辑</a>
						<a href="<?php echo U('del',array('attr_id'=>$d['attr_id']));?>">删除</a>
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
	<script type="text/javascript" src="http://localhost/ymgshop/YMGSHOP/Admin/View/Attribute/Js/index.js"></script>
</body>
</html>