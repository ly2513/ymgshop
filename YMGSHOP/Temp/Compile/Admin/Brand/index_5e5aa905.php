<?php if(!defined("HDPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><!-- @author 李勇 626375290@qq.com -->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
<title>商品品牌列表</title>
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
URL = 'http://localhost/ymgshop/index.php/Admin/Brand/index';
APP = 'http://localhost/ymgshop/YMGSHOP';
COMMON = 'http://localhost/ymgshop/YMGSHOP/Common';
HDPHP = 'http://localhost/hdphp/hdphp';
HDPHPDATA = 'http://localhost/hdphp/hdphp/Data';
HDPHPEXTEND = 'http://localhost/hdphp/hdphp/Extend';
MODULE = 'http://localhost/ymgshop/index.php/Admin';
CONTROLLER = 'http://localhost/ymgshop/index.php/Admin/Brand';
ACTION = 'http://localhost/ymgshop/index.php/Admin/Brand/index';
STATIC = 'http://localhost/ymgshop/Static';
HDPHPTPL = 'http://localhost/hdphp/hdphp/Lib/Tpl';
VIEW = 'http://localhost/ymgshop/YMGSHOP/Admin/View';
PUBLIC = 'http://localhost/ymgshop/YMGSHOP/Admin/View/Public';
CONTROLLERVIEW = 'http://localhost/ymgshop/YMGSHOP/Admin/View/Brand';
HISTORY = 'http://localhost/ymgshop/index.php/Admin/Index/index';
</script>
</head>
<body>
	<div class="warp">
		<div class="menu_list">
			<ul>
				<li>
					<a href="<?php echo U('add');?>">添加商品品牌</a>
				</li>
				<li>
					<a href="<?php echo U('updateCache');?>">更新缓存</a>
				</li>
			</ul>
		</div>
		<table class="table2">
			<thead>
				<tr>
					<td class="w100">BID</td>
					<td class="w350">商品品牌名</td>
					<td class="w350">品牌LOGO</td>
					<td class="w350">品牌排序</td>
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
	
				<tr id="tr">
					<td id="bid"><?php echo $d['bid'];?></td>
					<td><?php echo $d['brand_name'];?></td>
					<td><img src="http://localhost/ymgshop/<?php echo $d['brand_logo'];?>" alt="" style="height:40px" /></td>
					<td><input type="text" value="<?php echo $d['brand_order'];?>" class="w50 h30"style="text-align:center" name="brand_order"  /></td>
					<td>
						<a href="<?php echo U('edit',array('bid'=>$d['bid'],'bid'=>$d['bid']));?>">编辑</a> | 
						<a href="<?php echo U('delete',array('bid'=>$d['bid']));?>">删除</a>
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
	<script type="text/javascript" src="http://localhost/ymgshop/YMGSHOP/Admin/View/Brand/Js/js.js"></script>
</body>
</html>