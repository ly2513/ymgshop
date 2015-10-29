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
URL = 'http://localhost/ymgshop/index.php/Admin/Category/edit/cid/14/pid/1';
APP = 'http://localhost/ymgshop/YMGSHOP';
COMMON = 'http://localhost/ymgshop/YMGSHOP/Common';
HDPHP = 'http://localhost/hdphp/hdphp';
HDPHPDATA = 'http://localhost/hdphp/hdphp/Data';
HDPHPEXTEND = 'http://localhost/hdphp/hdphp/Extend';
MODULE = 'http://localhost/ymgshop/index.php/Admin';
CONTROLLER = 'http://localhost/ymgshop/index.php/Admin/Category';
ACTION = 'http://localhost/ymgshop/index.php/Admin/Category/edit';
STATIC = 'http://localhost/ymgshop/Static';
HDPHPTPL = 'http://localhost/hdphp/hdphp/Lib/Tpl';
VIEW = 'http://localhost/ymgshop/YMGSHOP/Admin/View';
PUBLIC = 'http://localhost/ymgshop/YMGSHOP/Admin/View/Public';
CONTROLLERVIEW = 'http://localhost/ymgshop/YMGSHOP/Admin/View/Category';
HISTORY = 'http://localhost/ymgshop/index.php/Admin/Category/index';
</script>
<title>修改商品栏目</title>
</head>
<body>
	<div class="warp">
	<div class="menu_list ">
		<ul>
			<li ><a href="<?php echo U('index');?>" class="action">商品栏目列表</a></li>
			<li><a href="<?php echo U('edit');?>">修改商品栏目</a></li>
		</ul>
	</div>
		<div class="title-header">修改商品栏目</div>
		<form  method="post">
			<input type="hidden" name="cid" value="<?php echo $data['cid'];?>" />
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

							<option value="<?php echo $d['cid'];?>" <?php if($d['cid']==Q('pid')){?>selected=""<?php }?>><?php echo $d['cat_name'];?></option>
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
						<input type="text" class="w200"  name="cat_name" value="<?php echo $data['cat_name'];?>" />
					</td>
				</tr>
				<tr>
					<th class="w100">显隐状态</th>
					<td>
						<lable>
							<input type="radio" class="w50"  name="is_show" value="0"<?php if($data['is_show']==0){?>checked=""<?php }?> />隐藏
						</lable>
						<lable>
							<input type="radio" class="w50"  name="is_show" value="1" <?php if($data['is_show']==1){?>checked=""<?php }?> />显示
						</lable>
					</td>
				</tr>
				<tr>
					<th class="w100">单位</th>
					<td>
						<input type="text" class="w200"  name="measure_unit" value="<?php echo $data['measure_unit'];?>" />
					</td>
				</tr>
				<tr>
					<th class="w100">价格区间</th>
					<td>
						<input type="text" class="w200"  name="grade"  value="<?php echo $data['grade'];?>" />
					</td>
				</tr>
				<tr>
					<th class="w100">关键字</th>
					<td>
						<input type="text" class="w200"  name="cat_key" value="<?php echo $data['cat_key'];?>" />
					</td>
				</tr>
				<tr>
					<th class="w100">描述</th>
					<td>
						<textarea name="cat_desc"  clas="w300 h100"><?php echo $data['cat_desc'];?></textarea>
					</td>
				</tr>
				<tr>
					<th></th>
					<td><input type="submit" value="确定" class="hd-success" /></td>
				</tr>
			</table>
			
		</form>
	</div>
</body>
</html>