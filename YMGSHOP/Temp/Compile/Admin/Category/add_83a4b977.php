<?php if(!defined("HDPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><!-- @author 李勇 626375290@qq.com -->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
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
URL = 'http://localhost/product/ymgshop/index.php/Admin/Category/add';
APP = 'http://localhost/product/ymgshop/YMGSHOP';
COMMON = 'http://localhost/product/ymgshop/YMGSHOP/Common';
HDPHP = 'http://localhost/product/hdphp/hdphp';
HDPHPDATA = 'http://localhost/product/hdphp/hdphp/Data';
HDPHPEXTEND = 'http://localhost/product/hdphp/hdphp/Extend';
MODULE = 'http://localhost/product/ymgshop/index.php/Admin';
CONTROLLER = 'http://localhost/product/ymgshop/index.php/Admin/Category';
ACTION = 'http://localhost/product/ymgshop/index.php/Admin/Category/add';
STATIC = 'http://localhost/product/ymgshop/Static';
HDPHPTPL = 'http://localhost/product/hdphp/hdphp/Lib/Tpl';
VIEW = 'http://localhost/product/ymgshop/YMGSHOP/Admin/View';
PUBLIC = 'http://localhost/product/ymgshop/YMGSHOP/Admin/View/Public';
CONTROLLERVIEW = 'http://localhost/product/ymgshop/YMGSHOP/Admin/View/Category';
HISTORY = 'http://localhost/product/ymgshop/index.php/Admin/Category/add/cid/42';
</script>
<title>添加商品栏目</title>
</head>
<body>
	<div class="warp">
	<div class="menu_list ">
		<ul>
			<li ><a href="<?php echo U('index');?>" class="action">商品栏目列表</a></li>
			<li><a href="<?php echo U('add');?>">添加商品栏目</a></li>
		</ul>
	</div>
		<div class="title-header">添加商品栏目</div>
		<form  method="post">
			<table class="table2 hd-form">
				<tr>
					<th class="w100">顶级栏目</th>
					<td>
						<select name="pid" id="">
						<option value="0">==顶级栏目==</option>
						<?php $hd["list"]["d"]["total"]=0;if(isset($category) && !empty($category)):$_id_d=0;$_index_d=0;$lastd=min(1000,count($category));
$hd["list"]["d"]["first"]=true;
$hd["list"]["d"]["last"]=false;
$_total_d=ceil($lastd/1);$hd["list"]["d"]["total"]=$_total_d;
$_data_d = array_slice($category,0,$lastd);
if(count($_data_d)==0):echo "";
else:
foreach($_data_d as $key=>$d):
if(($_id_d)%1==0):$_id_d++;else:$_id_d++;continue;endif;
$hd["list"]["d"]["index"]=++$_index_d;
if($_index_d>=$_total_d):$hd["list"]["d"]["last"]=true;endif;?>

							<option value="<?php echo $d['cid'];?>" <?php if($d['cid']==Q('cid')){?>selected=""<?php }?>><?php echo $d['_name'];?></option>
						<?php $hd["list"]["d"]["first"]=false;
endforeach;
endif;
else:
echo "";
endif;?>
						</select>
					</td>
				</tr>	
				<tr>
					<th class="w100">商品栏目名称</th>
					<td>
						<input type="text" class="w200"  name="cat_name" />
					</td>
				</tr>
				<tr>
					<th class="w100">显隐状态</th>
					<td>
						<lable>
							<input type="radio" class="w50"  name="is_show" value="0" />隐藏
						</lable>
						<lable>
							<input type="radio" class="w50"  name="is_show" value="1" />显示
						</lable>
					</td>
				</tr>
				<tr>
					<th class="w100">单位</th>
					<td>
						<input type="text" class="w200"  name="measure_unit" value="件" />
					</td>
				</tr>
				<tr>
					<th class="w100">价格区间</th>
					<td>
						<input type="text" class="w200"  name="grade"  />
					</td>
				</tr>
				<tr>
					<th class="w100">关键字</th>
					<td>
						<input type="text" class="w200"  name="cat_key"  />
					</td>
				</tr>
				<tr>
					<th class="w100">描述</th>
					<td>
						<textarea name="cat_desc"  clas="w300 h100"></textarea>
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