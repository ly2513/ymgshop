<?php if(!defined("HDPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="http://localhost/product/ymgshop/YMGSHOP/Member/View/Index/css/orderList.css">
    <!-- <script type='text/javascript' src='http://localhost/product/hdphp/hdphp/Extend/Org/Jquery/jquery-1.8.2.min.js'></script>
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
URL = 'http://localhost/product/ymgshop/index.php/Member/Index/orderList';
APP = 'http://localhost/product/ymgshop/YMGSHOP';
COMMON = 'http://localhost/product/ymgshop/YMGSHOP/Common';
HDPHP = 'http://localhost/product/hdphp/hdphp';
HDPHPDATA = 'http://localhost/product/hdphp/hdphp/Data';
HDPHPEXTEND = 'http://localhost/product/hdphp/hdphp/Extend';
MODULE = 'http://localhost/product/ymgshop/index.php/Member';
CONTROLLER = 'http://localhost/product/ymgshop/index.php/Member/Index';
ACTION = 'http://localhost/product/ymgshop/index.php/Member/Index/orderList';
STATIC = 'http://localhost/product/ymgshop/Static';
HDPHPTPL = 'http://localhost/product/hdphp/hdphp/Lib/Tpl';
VIEW = 'http://localhost/product/ymgshop/YMGSHOP/Member/View';
PUBLIC = 'http://localhost/product/ymgshop/YMGSHOP/Member/View/Public';
CONTROLLERVIEW = 'http://localhost/product/ymgshop/YMGSHOP/Member/View/Index';
HISTORY = 'http://localhost/product/ymgshop/index.php/Member/Index/index';
</script> -->
</head>
<body>
	<div class="h_section_R">
		<div style="padding-bottom: 13px;float: left;">
			<div class="R_formbox">
				<!-- <span>订单号：</span>
				<span><input type="text" name="order_sn" class="w80"></span>
				<span>收货人：</span>
				<span><input type="text" name="consignee" class="w80"></span>
				<span><input type="button" value="" class="btn" onclick="search('http://localhost/product/ymgshop/index.php/Member/Index')"></span> -->
				<h3>订单列表</h3>
			</div>
		</div>
		<div class="section_R_2">
			<div class="R_2_order">
				<table class="table3"  width="790" cellpadding="0" cellspacing="0">
					<thead>
						<tr>
							<td class="td6" height="33" >订单号</td>
							<td class="td6">订单日期</td>
							<td class="td7">订单商品</td>
							<td class="td8">订单金额</td>
							<td class="td6">订单状态</td>
							<td class="td6">预计出库时间</td>
							<td class="td8">详细信息</td>
							<td class="td9">操作</td>
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
							<td class="td6" height="33"><?php echo $d['order_sn'];?></td>
							<td class="td6"><?php echo date('Y-m-d',$d['add_time']);?></td>
							<td class="td7" style="text-align:left;float:left;">
								<?php $hd["list"]["c"]["total"]=0;if(isset($d['img']) && !empty($d['img'])):$_id_c=0;$_index_c=0;$lastc=min(1000,count($d['img']));
$hd["list"]["c"]["first"]=true;
$hd["list"]["c"]["last"]=false;
$_total_c=ceil($lastc/1);$hd["list"]["c"]["total"]=$_total_c;
$_data_c = array_slice($d['img'],0,$lastc);
if(count($_data_c)==0):echo "";
else:
foreach($_data_c as $key=>$c):
if(($_id_c)%1==0):$_id_c++;else:$_id_c++;continue;endif;
$hd["list"]["c"]["index"]=++$_index_c;
if($_index_c>=$_total_c):$hd["list"]["c"]["last"]=true;endif;?>

								<img src="http://localhost/product/ymgshop/<?php echo $c[0];?>" alt="">
								<?php $hd["list"]["d"]["first"]=false;
endforeach;
endif;
else:
echo "";
endif;?>
							</td>
							<td class="td8">￥<?php echo $d['amount'];?></td>
							<td class="td6"><?php echo $d['order_status_text'];?></td>
							<td class="td6">预计出库时间</td>
							<td class="td8"><a href="<?php echo U('orderinfo',array('order_id'=>$d['order_id']));?>">详细信息</a></td>
							<td>
								<?php if($d['order_status']==0){?>
								<a href="javascript:;" onclick="pay(this,<?php echo $d['order_id'];?>,'http://localhost/product/ymgshop/index.php/Member/Index')">支付</a>
								<a href="javascript:;" onclick="cancel(this,<?php echo $d['order_id'];?>,'http://localhost/product/ymgshop/index.php/Member/Index')">取消</a>
								<?php }?>
								<?php if($d['order_status']==1){?>
								<a href="javascript:;" onclick="del(this,<?php echo $d['order_id'];?>,'http://localhost/product/ymgshop/index.php/Member/Index')">删除</a>
								<a href="javascript:;" onclick="comment(this,<?php echo $d['gid'];?>,'http://localhost/product/ymgshop/index.php/Member/Index')">评论</a>
								<?php }?>
								<?php if($d['order_status']==2){?>
								<a href="javascript:;" onclick="del(this,<?php echo $d['order_id'];?>,'http://localhost/product/ymgshop/index.php/Member/Index')">删除</a>
								<?php }?>
							</td>
						</tr>
						<?php $hd["list"]["c"]["first"]=false;
endforeach;
endif;
else:
echo "";
endif;?>
					</tbody>
				</table>
			</div>
		</div>
		<div class="page1">
			<?php echo $page;?>
		</div>
	</div>
	<script type="text/javascript" src="http://localhost/product/ymgshop/YMGSHOP/Member/View/Index/js/jquery.js"></script>
	<script type="text/javascript" src="http://localhost/product/ymgshop/YMGSHOP/Member/View/Index/js/orderList.js"></script>
</body>
</html>