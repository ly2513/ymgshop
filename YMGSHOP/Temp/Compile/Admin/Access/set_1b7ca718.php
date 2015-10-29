<?php if(!defined("HDPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
<title>权限设置</title>
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
URL = 'http://localhost/product/ymgshop/index.php/Admin/Access/set/rid/1';
APP = 'http://localhost/product/ymgshop/YMGSHOP';
COMMON = 'http://localhost/product/ymgshop/YMGSHOP/Common';
HDPHP = 'http://localhost/product/hdphp/hdphp';
HDPHPDATA = 'http://localhost/product/hdphp/hdphp/Data';
HDPHPEXTEND = 'http://localhost/product/hdphp/hdphp/Extend';
MODULE = 'http://localhost/product/ymgshop/index.php/Admin';
CONTROLLER = 'http://localhost/product/ymgshop/index.php/Admin/Access';
ACTION = 'http://localhost/product/ymgshop/index.php/Admin/Access/set';
STATIC = 'http://localhost/product/ymgshop/Static';
HDPHPTPL = 'http://localhost/product/hdphp/hdphp/Lib/Tpl';
VIEW = 'http://localhost/product/ymgshop/YMGSHOP/Admin/View';
PUBLIC = 'http://localhost/product/ymgshop/YMGSHOP/Admin/View/Public';
CONTROLLERVIEW = 'http://localhost/product/ymgshop/YMGSHOP/Admin/View/Access';
HISTORY = 'http://localhost/product/ymgshop/index.php/Admin/Role/index';
</script>
<style type="text/css">
	ul{
		margin-left: 50px;
	}
	li{
		list-style: none;
		float: left;
		margin-right: 10px;
	}
</style>
</head>
<body>
	<div class="warp">
		<div class="hd-title"></div>
		<form method="post" >
		<input type="hidden" name="rid" value="<?php echo $_GET['rid'];?>" />
		<table class="table2">
			<tbody>
				<?php $hd["list"]["d"]["total"]=0;if(isset($node) && !empty($node)):$_id_d=0;$_index_d=0;$lastd=min(1000,count($node));
$hd["list"]["d"]["first"]=true;
$hd["list"]["d"]["last"]=false;
$_total_d=ceil($lastd/1);$hd["list"]["d"]["total"]=$_total_d;
$_data_d = array_slice($node,0,$lastd);
if(count($_data_d)==0):echo "";
else:
foreach($_data_d as $key=>$d):
if(($_id_d)%1==0):$_id_d++;else:$_id_d++;continue;endif;
$hd["list"]["d"]["index"]=++$_index_d;
if($_index_d>=$_total_d):$hd["list"]["d"]["last"]=true;endif;?>
	
				<?php $hd["list"]["c"]["total"]=0;if(isset($d['_data']) && !empty($d['_data'])):$_id_c=0;$_index_c=0;$lastc=min(1000,count($d['_data']));
$hd["list"]["c"]["first"]=true;
$hd["list"]["c"]["last"]=false;
$_total_c=ceil($lastc/1);$hd["list"]["c"]["total"]=$_total_c;
$_data_c = array_slice($d['_data'],0,$lastc);
if(count($_data_c)==0):echo "";
else:
foreach($_data_c as $key=>$c):
if(($_id_c)%1==0):$_id_c++;else:$_id_c++;continue;endif;
$hd["list"]["c"]["index"]=++$_index_c;
if($_index_c>=$_total_c):$hd["list"]["c"]["last"]=true;endif;?>

				<tr>
					<td>
						<label >
						<input type="checkbox" class="w30" <?php if(in_array($c['name'],$controller)){?> checked=""<?php }?>  /><?php echo $c['title'];?></label>
						<ul>
							<?php $hd["list"]["m"]["total"]=0;if(isset($c['_data']) && !empty($c['_data'])):$_id_m=0;$_index_m=0;$lastm=min(1000,count($c['_data']));
$hd["list"]["m"]["first"]=true;
$hd["list"]["m"]["last"]=false;
$_total_m=ceil($lastm/1);$hd["list"]["m"]["total"]=$_total_m;
$_data_m = array_slice($c['_data'],0,$lastm);
if(count($_data_m)==0):echo "";
else:
foreach($_data_m as $key=>$m):
if(($_id_m)%1==0):$_id_m++;else:$_id_m++;continue;endif;
$hd["list"]["m"]["index"]=++$_index_m;
if($_index_m>=$_total_m):$hd["list"]["m"]["last"]=true;endif;?>

								<li>
								<label >
								<input type="checkbox" class="w40" name="access[<?php echo $c['name'];?>][]" value="<?php echo $m['name'];?>" <?php if(in_array($m['name'],$action[$c['name']])){?> checked="" <?php }?>  /><?php echo $m['title'];?></label>
								</li>
							<?php $hd["list"]["d"]["first"]=false;
endforeach;
endif;
else:
echo "";
endif;?>
						</ul>
					</td>
				</tr>
				<?php $hd["list"]["c"]["first"]=false;
endforeach;
endif;
else:
echo "";
endif;?>
				<?php $hd["list"]["m"]["first"]=false;
endforeach;
endif;
else:
echo "";
endif;?>
			</tbody>
		</table>
		<input type="submit" class="hd-success" value="确定" />
		</form>
	</div>
</body>
</html>
