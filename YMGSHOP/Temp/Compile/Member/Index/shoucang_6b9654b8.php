<?php if(!defined("HDPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="http://localhost/product/ymgshop/YMGSHOP/Member/View/Index/css/orderList.css">
</head>
<body>
	<div class="h_section_R">
		<div style="padding-bottom: 13px;float: left;">
			<div class="R_formbox">
				<h3>收藏夹</h3>
			</div>
		</div>
		<div class="section_R_2">
			<div class="R_2_order">
				<table class="table3"  width="790" cellpadding="0" cellspacing="0">
					<thead>
						<tr>
							<td class="td6" height="33" >商品</td>
							<td class="td7">商品名称</td>
							<td class="td7">商品价格</td>
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

							<?php $hd["list"]["c"]["total"]=0;if(isset($d) && !empty($d)):$_id_c=0;$_index_c=0;$lastc=min(1000,count($d));
$hd["list"]["c"]["first"]=true;
$hd["list"]["c"]["last"]=false;
$_total_c=ceil($lastc/1);$hd["list"]["c"]["total"]=$_total_c;
$_data_c = array_slice($d,0,$lastc);
if(count($_data_c)==0):echo "";
else:
foreach($_data_c as $key=>$c):
if(($_id_c)%1==0):$_id_c++;else:$_id_c++;continue;endif;
$hd["list"]["c"]["index"]=++$_index_c;
if($_index_c>=$_total_c):$hd["list"]["c"]["last"]=true;endif;?>

						<tr>
							<td class="td7" height="33">
								<img src="http://localhost/product/ymgshop/<?php echo $c['goods_thumb'];?>" alt="">
							</td>
							<td class="td6">
									<a href="<?php echo U('Index/Index/detail',array('gid'=>$c['gid']));?>"><?php echo $c['goods_name'];?></a>
							</td>
							<td class="td8">￥<?php echo $c['goods_price'];?></td>
							<td>
								<a href="<?php echo U('Index/Index/detail',array('gid'=>$c['gid']));?>" target="_blank" >购买</a>   |   
								<a href="javascript:;" onclick="del()">删除</a>
							</td>
						</tr>
						<?php $hd["list"]["d"]["first"]=false;
endforeach;
endif;
else:
echo "";
endif;?>
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