<?php if(!defined("HDPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
<title>回收站</title>
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
URL = 'http://localhost/ymgshop/index.php/Admin/Recycle/index';
APP = 'http://localhost/ymgshop/YMGSHOP';
COMMON = 'http://localhost/ymgshop/YMGSHOP/Common';
HDPHP = 'http://localhost/hdphp/hdphp';
HDPHPDATA = 'http://localhost/hdphp/hdphp/Data';
HDPHPEXTEND = 'http://localhost/hdphp/hdphp/Extend';
MODULE = 'http://localhost/ymgshop/index.php/Admin';
CONTROLLER = 'http://localhost/ymgshop/index.php/Admin/Recycle';
ACTION = 'http://localhost/ymgshop/index.php/Admin/Recycle/index';
STATIC = 'http://localhost/ymgshop/Static';
HDPHPTPL = 'http://localhost/hdphp/hdphp/Lib/Tpl';
VIEW = 'http://localhost/ymgshop/YMGSHOP/Admin/View';
PUBLIC = 'http://localhost/ymgshop/YMGSHOP/Admin/View/Public';
CONTROLLERVIEW = 'http://localhost/ymgshop/YMGSHOP/Admin/View/Recycle';
HISTORY = 'http://localhost/ymgshop/index.php/Admin/Recycle/restore/gid/1';
</script>
</head>
<body>
	<div class="wrap">
		<div class="menu_list">	
			<ul>
				<li><a href="<?php echo U('index');?>">回收站商品列表</a></li>
			</ul>
		</div>
		<table class="table2">
			<thead>
				<tr>
					<td class="w50">ID</td>
					<td class="w250">商品名称</td>
					<td class="w100">商品类型</td>
					<td class="w100">货号</td>
					<td class="w50">价格</td>
					<td class="w50">热销</td>
					<td class="w50">新品</td>
					<td class="w50">精品</td>
					<td class="w50">上架</td>
					<td class="w150">库存</td>
					<td class="w150">操作</td>
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

				<tr Tpl="http://localhost/ymgshop/YMGSHOP/Admin/View/Recycle">
					<td class="w50 gid"><?php echo $d['gid'];?></td>
					<td class="w200"><?php echo $d['goods_name'];?></td>
					<td class="w100"><?php echo $d['cat_name'];?></td>
					<td><?php echo $d['goods_sn'];?></td>
					<td><?php echo $d['goods_price'];?></td>
					<td class="w50" >
						<?php if($d['is_hot']==1){?>
						<!-- <i class="icon true">&#xf00b2;</i> -->
						<img src="http://localhost/ymgshop/YMGSHOP/Admin/View/Recycle/Image/yes.gif" alt="" class="ishot" ishot="0"/>
						<?php  }else{ ?>
					<!-- <i class="icon false">&#xf00b3;</i> -->
						<img src="http://localhost/ymgshop/YMGSHOP/Admin/View/Recycle/Image/no.gif" alt="" class="ishot" ishot="1"/>
						<?php }?>
					</td>
					<td class="w50"><?php if($d['is_new']==1){?>
						<img src="http://localhost/ymgshop/YMGSHOP/Admin/View/Recycle/Image/yes.gif" alt="" class="isnew" isnew="0"/>
					<?php  }else{ ?>
						<img src="http://localhost/ymgshop/YMGSHOP/Admin/View/Recycle/Image/no.gif" alt="" class="isnew" isnew="1"/>
					<?php }?></td>
					<td class="w50"><?php if($d['is_best']==1){?>
						<img src="http://localhost/ymgshop/YMGSHOP/Admin/View/Recycle/Image/yes.gif" alt=""class="isbest" isbest="0"/>
					<?php  }else{ ?>
						<img src="http://localhost/ymgshop/YMGSHOP/Admin/View/Recycle/Image/no.gif" alt="" class="isbest"isbest="1"/>
					<?php }?></td>

					<td class="w50">
						<?php if($d['is_on_sale_text']=='上架'){?>
							<img src="http://localhost/ymgshop/YMGSHOP/Admin/View/Recycle/Image/yes.gif" alt="" class="isonsale" isonsale="0"/>
							<?php  }else{ ?>
							<img src="http://localhost/ymgshop/YMGSHOP/Admin/View/Recycle/Image/no.gif" alt="" class="isonsale" isonsale="1"/>
						<?php }?>
					</td>
					<td class="w50"><?php echo $d['goods_number'];?></td>
					<td class="w150">
						<a href="<?php echo U('restore',array('gid'=>$d['gid']));?>">还原</a> |  
						<a href="<?php echo U('del',array('gid'=>$d['gid']));?>">删除</a>
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
			<div class="page1"><?php echo $page;?></div> 
	</div>
</body>
</html>