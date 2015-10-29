<?php if(!defined("HDPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
<title>货品管理</title>
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
URL = 'http://localhost/ymgshop/index.php/Admin/Product/index/gid/4';
APP = 'http://localhost/ymgshop/YMGSHOP';
COMMON = 'http://localhost/ymgshop/YMGSHOP/Common';
HDPHP = 'http://localhost/hdphp/hdphp';
HDPHPDATA = 'http://localhost/hdphp/hdphp/Data';
HDPHPEXTEND = 'http://localhost/hdphp/hdphp/Extend';
MODULE = 'http://localhost/ymgshop/index.php/Admin';
CONTROLLER = 'http://localhost/ymgshop/index.php/Admin/Product';
ACTION = 'http://localhost/ymgshop/index.php/Admin/Product/index';
STATIC = 'http://localhost/ymgshop/Static';
HDPHPTPL = 'http://localhost/hdphp/hdphp/Lib/Tpl';
VIEW = 'http://localhost/ymgshop/YMGSHOP/Admin/View';
PUBLIC = 'http://localhost/ymgshop/YMGSHOP/Admin/View/Public';
CONTROLLERVIEW = 'http://localhost/ymgshop/YMGSHOP/Admin/View/Product';
HISTORY = 'http://localhost/ymgshop/index.php/Admin/Goods/index';
</script>
<link rel="stylesheet" href="http://localhost/ymgshop/YMGSHOP/Admin/View/Product/Css/css.css"/>
</head>
<body>
	<div class="warp">
		<div class="menu_list">
			<ul>
				<li><a href="">货品列表</a></li>
				<li><a href="<?php echo U('Goods/index');?>">商品列表</a></li>
			</ul>
		</div>
		<form action="" method="post">
		<input type="hidden" name="gid" value="<?php echo $_GET['gid'];?>" />
			<table class="table2 hd-form">
				<thead>
					<tr>
					<td class="w100">ID</td>
					<!-- 动态获取商品规格属性名称 -->
						<?php $hd["list"]["d"]["total"]=0;if(isset($attrdata) && !empty($attrdata)):$_id_d=0;$_index_d=0;$lastd=min(1000,count($attrdata));
$hd["list"]["d"]["first"]=true;
$hd["list"]["d"]["last"]=false;
$_total_d=ceil($lastd/1);$hd["list"]["d"]["total"]=$_total_d;
$_data_d = array_slice($attrdata,0,$lastd);
if(count($_data_d)==0):echo "";
else:
foreach($_data_d as $key=>$d):
if(($_id_d)%1==0):$_id_d++;else:$_id_d++;continue;endif;
$hd["list"]["d"]["index"]=++$_index_d;
if($_index_d>=$_total_d):$hd["list"]["d"]["last"]=true;endif;?>

							<td class="w200"><?php echo $d[0]['attr_name'];?></td>
						<?php $hd["list"]["d"]["first"]=false;
endforeach;
endif;
else:
echo "";
endif;?>
						<td class="w200">货号</td>
						<td class="w200">库存</td>
						<td class="w200">操作</td>
					</tr>
				</thead>
				<tbody>
				<?php $hd["list"]["d"]["total"]=0;if(isset($Productdata) && !empty($Productdata)):$_id_d=0;$_index_d=0;$lastd=min(1000,count($Productdata));
$hd["list"]["d"]["first"]=true;
$hd["list"]["d"]["last"]=false;
$_total_d=ceil($lastd/1);$hd["list"]["d"]["total"]=$_total_d;
$_data_d = array_slice($Productdata,0,$lastd);
if(count($_data_d)==0):echo "";
else:
foreach($_data_d as $key=>$d):
if(($_id_d)%1==0):$_id_d++;else:$_id_d++;continue;endif;
$hd["list"]["d"]["index"]=++$_index_d;
if($_index_d>=$_total_d):$hd["list"]["d"]["last"]=true;endif;?>

					<tr>
						<td class="w100"><?php echo $d['product_id'];?></td>
						<!-- 动态获取属性数据 -->
						<?php $hd["list"]["m"]["total"]=0;if(isset($d['attr_value_str']) && !empty($d['attr_value_str'])):$_id_m=0;$_index_m=0;$lastm=min(1000,count($d['attr_value_str']));
$hd["list"]["m"]["first"]=true;
$hd["list"]["m"]["last"]=false;
$_total_m=ceil($lastm/1);$hd["list"]["m"]["total"]=$_total_m;
$_data_m = array_slice($d['attr_value_str'],0,$lastm);
if(count($_data_m)==0):echo "";
else:
foreach($_data_m as $key=>$m):
if(($_id_m)%1==0):$_id_m++;else:$_id_m++;continue;endif;
$hd["list"]["m"]["index"]=++$_index_m;
if($_index_m>=$_total_m):$hd["list"]["m"]["last"]=true;endif;?>

							<td ><?php echo $m;?></td>
						<?php $hd["list"]["d"]["first"]=false;
endforeach;
endif;
else:
echo "";
endif;?>
						<td><?php echo $d['product_sn'];?></td>
						<td><?php echo $d['product_number'];?></td>
						<td class="sub"><a href="javascript:;" onclick="deleteProduct(this,<?php echo $d['product_id'];?>)" ><i class="iconfont">&#xf0176;</i></a></td>
					</tr>
				<?php $hd["list"]["m"]["first"]=false;
endforeach;
endif;
else:
echo "";
endif;?>
				<tr>
					<td></td>
					<!-- 商品属性 -->
					<?php $hd["list"]["d"]["total"]=0;if(isset($attrdata) && !empty($attrdata)):$_id_d=0;$_index_d=0;$lastd=min(1000,count($attrdata));
$hd["list"]["d"]["first"]=true;
$hd["list"]["d"]["last"]=false;
$_total_d=ceil($lastd/1);$hd["list"]["d"]["total"]=$_total_d;
$_data_d = array_slice($attrdata,0,$lastd);
if(count($_data_d)==0):echo "";
else:
foreach($_data_d as $key=>$d):
if(($_id_d)%1==0):$_id_d++;else:$_id_d++;continue;endif;
$hd["list"]["d"]["index"]=++$_index_d;
if($_index_d>=$_total_d):$hd["list"]["d"]["last"]=true;endif;?>
 
						<td>
							<select name="attr[<?php echo $d[0]['attr_id'];?>][]" >
								<option value="0">==请选择属性==</option>
								<?php $hd["list"]["m"]["total"]=0;if(isset($d) && !empty($d)):$_id_m=0;$_index_m=0;$lastm=min(1000,count($d));
$hd["list"]["m"]["first"]=true;
$hd["list"]["m"]["last"]=false;
$_total_m=ceil($lastm/1);$hd["list"]["m"]["total"]=$_total_m;
$_data_m = array_slice($d,0,$lastm);
if(count($_data_m)==0):echo "";
else:
foreach($_data_m as $key=>$m):
if(($_id_m)%1==0):$_id_m++;else:$_id_m++;continue;endif;
$hd["list"]["m"]["index"]=++$_index_m;
if($_index_m>=$_total_m):$hd["list"]["m"]["last"]=true;endif;?>

								<option value="<?php echo $m['id'];?>"><?php echo $m['attr_value'];?></option>
								<?php $hd["list"]["d"]["first"]=false;
endforeach;
endif;
else:
echo "";
endif;?>
							</select>
						</td>
					<?php $hd["list"]["m"]["first"]=false;
endforeach;
endif;
else:
echo "";
endif;?>
					<td><input type="text" name="product_sn[]" /></td>
					<td><input type="text" name="product_number[]"  /></td>
					<td class="add"><a href="javascript:;" onclick="addProduct(this)"><i class="iconfont">&#xf0175;</i></a></td>
				</tr>
				</list>
				</tbody>
			</table>
			<div class="position-bottom">
				<input type="submit" value="确定"  class="hd-success" />
			</div>
			
		</form>

	</div>
	<script type="text/javascript" src="http://localhost/ymgshop/YMGSHOP/Admin/View/Product/Js/js.js"></script>
</body>
</html>