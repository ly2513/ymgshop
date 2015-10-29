<?php if(!defined("HDPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><!-- @author 李勇 626375290@qq.com -->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
<title>商品栏目列表</title>
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
URL = 'http://localhost/product/ymgshop/index.php/Admin/Category/index';
APP = 'http://localhost/product/ymgshop/YMGSHOP';
COMMON = 'http://localhost/product/ymgshop/YMGSHOP/Common';
HDPHP = 'http://localhost/product/hdphp/hdphp';
HDPHPDATA = 'http://localhost/product/hdphp/hdphp/Data';
HDPHPEXTEND = 'http://localhost/product/hdphp/hdphp/Extend';
MODULE = 'http://localhost/product/ymgshop/index.php/Admin';
CONTROLLER = 'http://localhost/product/ymgshop/index.php/Admin/Category';
ACTION = 'http://localhost/product/ymgshop/index.php/Admin/Category/index';
STATIC = 'http://localhost/product/ymgshop/Static';
HDPHPTPL = 'http://localhost/product/hdphp/hdphp/Lib/Tpl';
VIEW = 'http://localhost/product/ymgshop/YMGSHOP/Admin/View';
PUBLIC = 'http://localhost/product/ymgshop/YMGSHOP/Admin/View/Public';
CONTROLLERVIEW = 'http://localhost/product/ymgshop/YMGSHOP/Admin/View/Category';
HISTORY = 'http://localhost/product/ymgshop/index.php/Admin/Index/index';
</script>
</head>
<body>
	<div class="warp">
		<div class="menu_list hd-form">
			<ul>
				<li>
					<a href="<?php echo U('add');?>">添加商品栏目</a>
				</li>
				<li>
					<a href="<?php echo U('updateCache');?>">更新缓存</a>
				</li>
				<li>
					<select onchange="changeCategory(this)">
						<option value="0">==请选择类型==</option>
						<?php $hd["list"]["d"]["total"]=0;if(isset($parentdata) && !empty($parentdata)):$_id_d=0;$_index_d=0;$lastd=min(1000,count($parentdata));
$hd["list"]["d"]["first"]=true;
$hd["list"]["d"]["last"]=false;
$_total_d=ceil($lastd/1);$hd["list"]["d"]["total"]=$_total_d;
$_data_d = array_slice($parentdata,0,$lastd);
if(count($_data_d)==0):echo "";
else:
foreach($_data_d as $key=>$d):
if(($_id_d)%1==0):$_id_d++;else:$_id_d++;continue;endif;
$hd["list"]["d"]["index"]=++$_index_d;
if($_index_d>=$_total_d):$hd["list"]["d"]["last"]=true;endif;?>

							<option value="<?php echo $d['cid'];?>"<?php if($d['cat_id']==Q('cid')){?>selected=''<?php }?>><?php echo $d['cat_name'];?></option>
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
					<td class="w100">CID</td>
					<td class="w350">商品栏目名</td>
					<td class="w350">是否显示</td>
					<td class="w350">操作<td>
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
					<td><?php echo $d['cid'];?></td>
					<td><?php echo $d['_name'];?></td>
					<td><?php echo $d['is_show_text'];?></td>
					<td>
						<a href="<?php echo U('add',array('cid'=>$d['cid']));?>">添加子栏目</a> | 
						<a href="<?php echo U('edit',array('cid'=>$d['cid'],'pid'=>$d['pid']));?>">编辑</a> | 
						<a href="<?php echo U('delete',array('cid'=>$d['cid']));?>">删除</a>
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
	<script type="text/javascript" src="http://localhost/product/ymgshop/YMGSHOP/Admin/View/Category/Js/js.js"></script>
</body>
</html>