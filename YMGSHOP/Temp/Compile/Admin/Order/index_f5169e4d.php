<?php if(!defined("HDPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>订单列表</title>
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
URL = 'http://localhost/product/ymgshop/index.php/Admin/Order/index';
APP = 'http://localhost/product/ymgshop/YMGSHOP';
COMMON = 'http://localhost/product/ymgshop/YMGSHOP/Common';
HDPHP = 'http://localhost/product/hdphp/hdphp';
HDPHPDATA = 'http://localhost/product/hdphp/hdphp/Data';
HDPHPEXTEND = 'http://localhost/product/hdphp/hdphp/Extend';
MODULE = 'http://localhost/product/ymgshop/index.php/Admin';
CONTROLLER = 'http://localhost/product/ymgshop/index.php/Admin/Order';
ACTION = 'http://localhost/product/ymgshop/index.php/Admin/Order/index';
STATIC = 'http://localhost/product/ymgshop/Static';
HDPHPTPL = 'http://localhost/product/hdphp/hdphp/Lib/Tpl';
VIEW = 'http://localhost/product/ymgshop/YMGSHOP/Admin/View';
PUBLIC = 'http://localhost/product/ymgshop/YMGSHOP/Admin/View/Public';
CONTROLLERVIEW = 'http://localhost/product/ymgshop/YMGSHOP/Admin/View/Order';
HISTORY = 'http://localhost/product/ymgshop/index.php/Admin/Index/index';
</script>
</head>
<body>
	<div class="warp">
		<div class="menu_list hd-form">
			<ul>
				<li>
					<a href="<?php echo U('index');?>">订单列表</a>
				</li>
				
			</ul>
		</div>
		<table class="table2">
			<thead>
				<tr>
					<td>id</td>
					<td>订单号</td>
					<td>收货人</td>
					<td>收货地址</td>
					<td>交易金额(元)</td>
					<td>订单状态</td>
					<td>下单时间</td>
					<td>手机联系方式</td>
					<td>座机联系方式</td>
					<td>邮政编码</td>
					<!-- <td>操作</td> -->
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
					<td><?php echo $d['order_id'];?></td>
					<td><?php echo $d['order_sn'];?></td>
					<td><?php echo $d['consignee'];?></td>
					<td><?php echo $d['address'];?></td>
					<td><?php echo $d['amount'];?></td>
					<td><?php echo $d['order_status_text'];?></td>
					<td><?php echo date('Y-m-d H:i:s',$d['add_time']);?></td>
					<td><?php echo $d['mobile'];?></td>
					<td><?php echo $d['tel'];?></td>
					<td><?php echo $d['zipcode'];?></td>
					<td>
						<!-- <?php if($d['order_status']){?>
						<a href="javascript:;" onclick="orderInfo(this,<?php echo $d['order_id'];?>)">查看订单</a>   |
						<?php  }else{ ?>  
						<a href="javascript:;" onclick="solve(this,<?php echo $d['order_id'];?>)" >订单处理</a> 
						  |  <?php }?> 
						<a href="<?php echo U('del',array('order_id'=>$d['order_id']));?>">删除</a> -->
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
		<!-- 分页 -->
		<div class="page1">
			<?php echo $page;?>
		</div>
	</div>
	<script type="text/javascript" src="http://localhost/product/ymgshop/YMGSHOP/Admin/View/Order/Js/js.js"></script>
</body>
</html>
