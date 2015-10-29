<?php if(!defined("HDPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
<title>用户信息核对</title>
<link rel="stylesheet" href="http://localhost/ymgshop/YMGSHOP/Index/View/Cart/css/order.css" />
<link rel="stylesheet" href="http://localhost/ymgshop/YMGSHOP/Index/View/Cart/css/public.css" />
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
URL = 'http://localhost/ymgshop/index.php/Index/Cart&a=edit_addr';
APP = 'http://localhost/ymgshop/YMGSHOP';
COMMON = 'http://localhost/ymgshop/YMGSHOP/Common';
HDPHP = 'http://localhost/hdphp/hdphp';
HDPHPDATA = 'http://localhost/hdphp/hdphp/Data';
HDPHPEXTEND = 'http://localhost/hdphp/hdphp/Extend';
MODULE = 'http://localhost/ymgshop/index.php/Index';
CONTROLLER = 'http://localhost/ymgshop/index.php/Index/Cart';
ACTION = 'http://localhost/ymgshop/index.php/Index/Cart/edit_addr';
STATIC = 'http://localhost/ymgshop/Static';
HDPHPTPL = 'http://localhost/hdphp/hdphp/Lib/Tpl';
VIEW = 'http://localhost/ymgshop/YMGSHOP/Index/View';
PUBLIC = 'http://localhost/ymgshop/YMGSHOP/Index/View/Public';
CONTROLLERVIEW = 'http://localhost/ymgshop/YMGSHOP/Index/View/Cart';
HISTORY = 'http://localhost/ymgshop/index.php/Index/Cart/order';
</script>
<script type="text/javascript" src="http://localhost/ymgshop/YMGSHOP/Index/View/Cart/js/order.js"></script>
</head>
<body>
	<!-- top start-->
	<div id="top">
		<div class="top">
			<div class="left">
				<?php if($_SESSION['username']==''){?>
				<span>欢迎光临优美购！</span>
				<a href="<?php echo U('User/login');?>">登录</a>  |  <a href="<?php echo U('User/register');?>">注册</a>
				<?php  }else{ ?>
				<!-- 管理员登录后 -->
				<span>欢迎<?php echo $_SESSION['username'];?>光临优美购！</span>
				<a href="<?php echo U('User/out');?>">退出</a>
			<?php }?>
			</div>
		</div>
	</div>
	<!-- top end -->
	<div id="big" url="http://localhost/ymgshop/index.php">
		<div class="logo">
			<img src="http://localhost/ymgshop/YMGSHOP/Index/View/Cart/image/logo.png" alt=""  />
		</div>
		<div class="order_right"></div>
	</div>
	<!-- order start -->
	<div id="order">
		<div class="order_main" >
		<?php if($data['addr_content']!=''){?>
		<!-- 有用户信息时，显示的界面 -->
			<div class="order_buy" >
				<div class="order_body" >
					<div class="userinfo">
						<span class="address_title"></span>
						<a href="javascript:;" class="edit_option" id="edit_addr">[修改]</a>
						<a href="javascript:;" class="edit_option" id="edit_addr_quxiao" style="display:none">[取消修改]</a>
					</div>
					<div class='shouhuoxinxi'>
						<div class="dizhi">
						<!-- 收货地址 -->
							<dl class="j_dl1">
								<dd class="msg ">
	                                <?php echo $data['name'];?>   <?php echo $data['province'];?>&nbsp;&nbsp;<?php echo $data['city'];?>&nbsp;&nbsp;<?php echo $data['area'];?>&nbsp;&nbsp;<?php echo $data['addr_content'];?>&nbsp;&nbsp;<?php echo $data['postcode'];?>&nbsp;&nbsp;<?php echo $data['tel'];?>&nbsp;&nbsp;<?php echo $data['phone'];?>
								</dd>
							</dl>
							<!-- 修改收货地址 -->
							<div class="addAddr" style="display:none">
								<?php $hd["list"]["d"]["total"]=0;if(isset($address) && !empty($address)):$_id_d=0;$_index_d=0;$lastd=min(1000,count($address));
$hd["list"]["d"]["first"]=true;
$hd["list"]["d"]["last"]=false;
$_total_d=ceil($lastd/1);$hd["list"]["d"]["total"]=$_total_d;
$_data_d = array_slice($address,0,$lastd);
if(count($_data_d)==0):echo "";
else:
foreach($_data_d as $key=>$d):
if(($_id_d)%1==0):$_id_d++;else:$_id_d++;continue;endif;
$hd["list"]["d"]["index"]=++$_index_d;
if($_index_d>=$_total_d):$hd["list"]["d"]["last"]=true;endif;?>

								<dl class="j_dl" >
									<dt><input type="radio" name="address" <?php if($d['status']==1){?>  checked=""<?php }?> /></dt>
									<dd class="msg"> <?php echo $d['name'];?>   <?php echo $d['province'];?>&nbsp;&nbsp;<?php echo $d['city'];?>&nbsp;&nbsp;<?php echo $d['area'];?>&nbsp;&nbsp;<?php echo $d['addr_content'];?>&nbsp;&nbsp;<?php echo $d['postcode'];?>&nbsp;&nbsp;<?php echo $d['tel'];?>&nbsp;&nbsp;<?php echo $d['phone'];?></dd>
									<dd class="xg"><a href="javascript:;" onclick="edit_xg(this,<?php echo $d['addr_id'];?>)">修改</a></dd>
									<dd class="sc"><a href="javascript:;" onclick="del_addr(this,<?php echo $d['addr_id'];?>)">删除</a></dd>
								</dl>
								<?php $hd["list"]["d"]["first"]=false;
endforeach;
endif;
else:
echo "";
endif;?>
								
								<!-- 新增收货地址 -->
								<div class="newadd">
									<a href="javascript:;" class="new_address" onclick="add_tianjia(this)" id="tianjia">
										<span class="add_btn">+</span>  新增收货地址
									</a>
									<a href="javascript:;" class="new_address" onclick="del_tianjia(this)" id="quxiaotainjia" style="display:none">
										<span class="add_btn">-</span>  取消新增收货地址
									</a>
								</div>
							</div>
						</div>
						<!-- 修改地址 -->
						<div class="usermessage edituseraddr" style="display:none">
							<form method="post" onsubmit="return edit_addr(this)">
								<input type="hidden" value="<?php echo $data['addr_id'];?>" name="addr_id"/>
								<input type="hidden" value="<?php echo $data['uid'];?>" name="uid"/>
								<div class="addr">
									<div class="sh">
										<div class="shr">
											<div class="tarea_title">
												<span class="star">*</span>
												收 货 人 ：
											</div>
											<div class="shrname">
												<input type="text" value="<?php echo $data['name'];?>" name="name"class="name" />
											</div>
										</div>
									</div>
									<!-- 选择城市 -->
									<div class="dizhi1">
										<div class="tarea_title">
											<span class="star">*</span>
												选择地区：
										</div>
										<div class="shrname">
											<select name="province" id="" onchange="_province(this)">
												<option value="0">请选择省份</option>
												<?php $hd["list"]["d"]["total"]=0;if(isset($province) && !empty($province)):$_id_d=0;$_index_d=0;$lastd=min(1000,count($province));
$hd["list"]["d"]["first"]=true;
$hd["list"]["d"]["last"]=false;
$_total_d=ceil($lastd/1);$hd["list"]["d"]["total"]=$_total_d;
$_data_d = array_slice($province,0,$lastd);
if(count($_data_d)==0):echo "";
else:
foreach($_data_d as $key=>$d):
if(($_id_d)%1==0):$_id_d++;else:$_id_d++;continue;endif;
$hd["list"]["d"]["index"]=++$_index_d;
if($_index_d>=$_total_d):$hd["list"]["d"]["last"]=true;endif;?>

													<option value="<?php echo $d['ProvinceID'];?>" <?php if($d['ProvinceName']==$addr_data['province']){?> selected=""<?php }?>><?php echo $d['ProvinceName'];?></option>
												<?php $hd["list"]["d"]["first"]=false;
endforeach;
endif;
else:
echo "";
endif;?>
											</select>
											<select name="city" onclick="_city(this)">
												<option value="0" class="city">请选择城市</option>
												<?php $hd["list"]["d"]["total"]=0;if(isset($city) && !empty($city)):$_id_d=0;$_index_d=0;$lastd=min(1000,count($city));
$hd["list"]["d"]["first"]=true;
$hd["list"]["d"]["last"]=false;
$_total_d=ceil($lastd/1);$hd["list"]["d"]["total"]=$_total_d;
$_data_d = array_slice($city,0,$lastd);
if(count($_data_d)==0):echo "";
else:
foreach($_data_d as $key=>$d):
if(($_id_d)%1==0):$_id_d++;else:$_id_d++;continue;endif;
$hd["list"]["d"]["index"]=++$_index_d;
if($_index_d>=$_total_d):$hd["list"]["d"]["last"]=true;endif;?>

													<option value="<?php echo $d['CityID'];?>" <?php if($d['CityName']==$addr_data['city']){?> selected=""<?php }?>><?php echo $d['CityName'];?></option>
												<?php $hd["list"]["d"]["first"]=false;
endforeach;
endif;
else:
echo "";
endif;?>
											</select>
											<select name="area" >
												<option value="0" class="area">请选择区/县</option>
												<?php $hd["list"]["d"]["total"]=0;if(isset($area) && !empty($area)):$_id_d=0;$_index_d=0;$lastd=min(1000,count($area));
$hd["list"]["d"]["first"]=true;
$hd["list"]["d"]["last"]=false;
$_total_d=ceil($lastd/1);$hd["list"]["d"]["total"]=$_total_d;
$_data_d = array_slice($area,0,$lastd);
if(count($_data_d)==0):echo "";
else:
foreach($_data_d as $key=>$d):
if(($_id_d)%1==0):$_id_d++;else:$_id_d++;continue;endif;
$hd["list"]["d"]["index"]=++$_index_d;
if($_index_d>=$_total_d):$hd["list"]["d"]["last"]=true;endif;?>

													<option value="<?php echo $d['DistrictID'];?>" <?php if($d['DistrictName']==$addr_data['area']){?> selected=""<?php }?>><?php echo $d['DistrictName'];?></option>
												<?php $hd["list"]["d"]["first"]=false;
endforeach;
endif;
else:
echo "";
endif;?>
											</select>
										</div>
									</div>
									<!-- 详细地址 -->
									<div class="xxdz">
										<div class="tarea_title">
											<span class="star">*</span>
												详细地址：
										</div>
										<div class="shrname">
											<input type="text" class="dzxx" name="addr_content" value="<?php echo $data['addr_content'];?>" />
										</div>
									</div>
									<!-- 邮政编码 -->
									<div class="yzbm">
										<div class="tarea_title">
											<span class="star">*</span>
												邮政编码：
										</div>
										<div class="shrname">
											<input name="postcode" type="text" value="<?php echo $data['postcode'];?>" class="name"/>	
										</div>
									</div>
									<!-- 电子邮箱 -->
									<div class="email">
										<div class="tarea_title">
											<span class="star"></span>
												电子邮箱：
										</div>
										<div class="shrname">
											<input type="text" class="name" name="email" value="<?php echo $data['email'];?>" />
										</div>
									</div>
									<!-- 手机 -->
									<div class="phone">
										<div class="tarea_title">
											<span class="star">*</span>
												手 机：
										</div>
										<div class="shrname">
											<input type="text" class="name" name="phone" value="<?php echo $data['phone'];?>" />
										</div>
									</div>
									<!-- 电话 -->
									<div class="dh">
										<div class="tarea_title">
											<span class="star">*</span>
												电 话：
										</div>
										<div class="shrname">
											<input type="text" class="name" name="tel" value="<?php echo $data['tel'];?>" />
											 <span class="format">电话格式：如：010-65690100-021</span>
										</div>
									</div>
									<!-- 确定按钮 -->
									<div class="surebtn" >
										<input type="submit" value="确定" />
									</div>
								</div>
							</form>
						</div>
						<!-- 添加新地址 -->
						<div class="usermessage adduseraddr" style="display:none">
						<form method="post" onsubmit="return add_info(this)">
							<input type="hidden" name="uid" value="<?php echo $_SESSION['username'];?>" />
							<div class="addr">
								<div class="sh">
									<div class="shr">
										<div class="tarea_title">
											<span class="star">*</span>
											收 货 人 ：
										</div>
										<div class="shrname">
											<input type="text" placeholder="填写收货人的真实姓名" name="name"class="name" />
										</div>
									</div>
								</div>
								<!-- 选择城市 -->
								<div class="dizhi1">
									<div class="tarea_title">
										<span class="star">*</span>
											选择地区：
									</div>
									<div class="shrname">
										<select name="province" onchange="_province(this)">
											<option value="0">请选择省份</option>
											<?php $hd["list"]["d"]["total"]=0;if(isset($province) && !empty($province)):$_id_d=0;$_index_d=0;$lastd=min(1000,count($province));
$hd["list"]["d"]["first"]=true;
$hd["list"]["d"]["last"]=false;
$_total_d=ceil($lastd/1);$hd["list"]["d"]["total"]=$_total_d;
$_data_d = array_slice($province,0,$lastd);
if(count($_data_d)==0):echo "";
else:
foreach($_data_d as $key=>$d):
if(($_id_d)%1==0):$_id_d++;else:$_id_d++;continue;endif;
$hd["list"]["d"]["index"]=++$_index_d;
if($_index_d>=$_total_d):$hd["list"]["d"]["last"]=true;endif;?>

												<option value="<?php echo $d['ProvinceID'];?>"><?php echo $d['ProvinceName'];?></option>
											<?php $hd["list"]["d"]["first"]=false;
endforeach;
endif;
else:
echo "";
endif;?>
										</select>
										<select name="city" onclick="_city(this)">
											<option value="0" class="city">请选择城市</option>
										</select>
										<select name="area" >
											<option value="0" class="area">请选择区/县</option>
										</select>
									</div>
								</div>
								<!-- 详细地址 -->
								<div class="xxdz">
									<div class="tarea_title">
										<span class="star">*</span>
											详细地址：
									</div>
									<div class="shrname">
										<input type="text" class="dzxx" name="addr_content"placeholder="请您填写收货人详细地址" />
									</div>
								</div>
								<!-- 邮政编码 -->
								<div class="yzbm">
									<div class="tarea_title">
										<span class="star">*</span>
											邮政编码：
									</div>
									<div class="shrname">
										<input name="postcode" type="text" placeholder="请您填写邮政编码" class="name"/>	
									</div>
								</div>
								<!-- 电子邮箱 -->
								<div class="email">
									<div class="tarea_title">
										<span class="star">*</span>
											电子邮箱：
									</div>
									<div class="shrname">
										<input type="text" class="name" name="email"placeholder="请您填写电子邮箱" />
									</div>
								</div>
								<!-- 手机 -->
								<div class="phone">
									<div class="tarea_title">
										<span class="star">*</span>
											手 机：
									</div>
									<div class="shrname">
										<input type="text" class="name" name="phone" placeholder="请填写手机号码" />
									</div>
								</div>
								<!-- 电话 -->
								<div class="dh">
									<div class="tarea_title">
										<span class="star">*</span>
											电 话：
									</div>
									<div class="shrname">
										<input type="text" class="name" name="tel" placeholder="请填写电话号码" />
										 <span class="format">电话格式：如：010-65690100-021</span>
									</div>
								</div>
								<!-- 确定按钮 -->
								<div class="surebtn" >
									<input type="submit" value="确定" />
								</div>
							</div>
						</form>
						</div>
					</div>
				</div>
				<!-- 支付方式 -->
				<div class="fukuan">
					<div class="zftitle">
						<span class="pay_title"></span>
						<a href="javascript:;" class="edit_option" id="edit_pay" style="display: block;">[修改]</a>
						<a href="javascript:;" class="edit_option" id="cancel_pay" style="display: none;">[取消修改]</a>
					</div>
					<!-- 修改支付方式 -->
					<div id="J_o_pay_con">
						<div class="fn_none" >
							<div class="zffs">
								<div class="zffs2">
									<div class="zhifu">
									<form name="payway" >
										<div class="zhifutitle">支付方式</div>
										<div class="nr">
											<p class="xz1">
												<label>
												<span>
													<input type="radio" name="radio_PayType" onclick="checkeds();" checked="checked" value="COD" />	
												</span>
												<span>货到付款  　
													<font class="font-grey">送货上门后再收款，支持现金POS机 
													</font>                   
												</span>
												</label>
											</p>
											<p class="xz2">
											<label >
												<span>
													<input name="radio_COD" value="COD"  type="radio" checked="checked" way="现金支付">
												</span>
												<span class="csh">现金支付（<?php echo $_SESSION['cart']['num'];?>样商品）</span>
											</label>
											<label >
												<span>                                    
													<input name="radio_COD" value="MOVEPOS" type="radio">                       
												</span>
												<span>POS机刷卡</span>
												<span class="csh">（<?php echo $_SESSION['cart']['num'];?>样商品）</span>
											</label>
											</p>
										</div>
										<div class="nr2">
											<p class="xz">
												<label >
												<span>                                    
													<input name="radio_PayType" onclick="checkeds();" class="radio_PayType" value="ONLINE" type="radio" way="在线支付">                                
												</span>
												<span>在线支付</span>
												</label>
												<span> &nbsp;&nbsp;
													<font class="font-grey">即时到账，支持绝大多数银行借记卡及部分银行信用卡</font>
												</span>
											</p>
										</div>
										<div class="nr3">
											<p class="xz">
												<label >
												<span>                                    
													<input name="radio_PayType" onclick="checkeds();" class="radio_PayType" value="WEBBC" type="radio" way="线下银行电汇">                               
												</span>
												<span>线下银行电汇</span>
												</label>
												<span> &nbsp;&nbsp;
													<font class="font-grey">通过银行柜员机或ATM机汇款</font>
													<font class="font-red">（重要：请勿选择无卡存款）</font>
												</span>
											</p>
										</div>
										</form>
									</div>
									<div class="peisong">
										<div class="peisongtitle">配送方式：快递送货上门</div>
										<div class="peisongqr">
											<a href="javascript:;" class="area_btn">确定支付及配送方式</a>
											<!-- <input type="submit" value="确定支付及配送方式" /> -->
										</div>
									</div>
								</div>
								<!-- 默认显示支付方式 -->
								<div id="J_o_pay_con" style="display:block;float:left">
									<div id="J_pay_defualt">
										您选择使用
										<span class="red-txt payway" > 货到付款</span>
										<span class="red-txt">（现金支付）</span><br />
										<span class="red-txt"><?php echo $_SESSION['cart']['num'];?>样商品</span>
										：优美购快递运输
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- 商品单 -->
				<div class="clear"></div>
				<div class="spxx">
					<div id="J_shop_list">
						<div class="xxtitle">
							<span class="shop_title"></span>
							<a href="javascript:;" class="cart_back" onclick="go.history(-1)">
							返回修改购物车&gt;&gt;</a>
						</div>
						<div id="J_shop_list_con">
							<div class="shop_list shop">
								<div class="shopmsg">
									<span class="left">以下商品由 优美购 发货
										<span class="yunfei"> 
										 	<span class="red">免配送费</span>
										</span>                     
									</span>
								</div>
								<table class="godds_Block">
									<tbody>
										<tr>
											<th class="w_635">商品名称</th>
											<th class="w_117">优美购价</th>
											<th class="w_120">数量</th>
											<th>小计</th>
										</tr>
										<!-- 商品清单 -->
										<?php $hd["list"]["d"]["total"]=0;if(isset($_SESSION['cart']['goods']) && !empty($_SESSION['cart']['goods'])):$_id_d=0;$_index_d=0;$lastd=min(1000,count($_SESSION['cart']['goods']));
$hd["list"]["d"]["first"]=true;
$hd["list"]["d"]["last"]=false;
$_total_d=ceil($lastd/1);$hd["list"]["d"]["total"]=$_total_d;
$_data_d = array_slice($_SESSION['cart']['goods'],0,$lastd);
if(count($_data_d)==0):echo "";
else:
foreach($_data_d as $key=>$d):
if(($_id_d)%1==0):$_id_d++;else:$_id_d++;continue;endif;
$hd["list"]["d"]["index"]=++$_index_d;
if($_index_d>=$_total_d):$hd["list"]["d"]["last"]=true;endif;?>

										<tr>   
											<td> 
												<div class="f_l m_l65 t_al"> 
													<a href="<?php echo U('detail',array('gid'=>$d['gid']));?>">
														<img src="http://localhost/ymgshop/<?php echo $d['img'];?>" name="<?php echo $d['goods_name'];?>" height="53" width="39">
													</a>
												</div>
												<div class="f_l m_l10 t_al goods-list-content">
													<a href="<?php echo U('detail',array('gid'=>$d['gid']));?>" class="goods-link" target="_blank">	<?php echo $d['goods_name'];?>
													</a>
													<p class="m_t5 c_9c9c9c">
													品牌：<?php echo $d['brand'];?>　
													<?php $hd["list"]["c"]["total"]=0;if(isset($d['goods_attr']) && !empty($d['goods_attr'])):$_id_c=0;$_index_c=0;$lastc=min(1000,count($d['goods_attr']));
$hd["list"]["c"]["first"]=true;
$hd["list"]["c"]["last"]=false;
$_total_c=ceil($lastc/1);$hd["list"]["c"]["total"]=$_total_c;
$_data_c = array_slice($d['goods_attr'],0,$lastc);
if(count($_data_c)==0):echo "";
else:
foreach($_data_c as $key=>$c):
if(($_id_c)%1==0):$_id_c++;else:$_id_c++;continue;endif;
$hd["list"]["c"]["index"]=++$_index_c;
if($_index_c>=$_total_c):$hd["list"]["c"]["last"]=true;endif;?>

													<?php echo $c['attr_name'];?>：<?php echo $c['attr_value'];?>&nbsp&nbsp
													<?php $hd["list"]["d"]["first"]=false;
endforeach;
endif;
else:
echo "";
endif;?>
													</p>                                    
													<p></p>
												</div>
												<div class="clear"></div>
											</td>
											<td>
												<span class="price_icon">￥</span><?php echo $d['price'];?>
											</td>
											<td><?php echo $d['num'];?></td>
											<td>
												<span class="c_d90077">
													<b class="price_icon" >￥</b><?php echo $d['totalPrice'];?>.00
												</span>
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
					</div>
					<!-- 总价 -->
					<div class="zonge">
						<div class="right">
							<table class="Money_Block">
								<tbody>
									<tr>
										<td class="t_ar td_w1"><b>商品总价</b>：</td>
										<td class="t_ar">
											<span class="c_d90077">
												<span class="price_icon">￥</span> <?php echo $_SESSION['cart']['totalPrice'];?>.00
											</span> 
										</td>
									</tr>
									<tr>
										<td class="t_ar td_w1">配送费：</td>
										<td class="t_ar">
											<span class="c_d90077">免配送费</span>
										</td>
									</tr>
									<tr>
										<td class="t_ar td_w1">应付金额：</td>
										<td class="t_ar">
											<span class="c_d90077">
												<font class="rmb price_icon">￥</font> 
												<span class="jine"><?php echo $_SESSION['cart']['totalPrice'];?>.00</span>
											</span>
										</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
					<div class="dzfp" id="J_dzfp"> 
						<label >
							<span>
								<input type="radio" name="invoice_k" value="电子购物凭证" checked="" />
							</span>
							<span class="dzpz">
								<div class="v_left">参加环保购物活动，请用</div>
								<div class="voucher" id="J_voucher" >电子购物凭证</div>
							</span>
						</label>
						<label >
							<span>
								<input type="radio" name="invoice_k" value="索取发票"/>
							</span>
							<span class="fapiao">索取发票</span>
						</label>
					</div>
					<div class="hdxx J_order_line">
						<div class="queren">
							<span>
								<a href="javascript:;" class="submit-btn" id="J_submit_btn" onclick="successOrder('<?php echo $_SESSION['cart']['totalPrice'];?>')">提交订单</a>

							</span>
							<span class="tx">请核对以上信息，确认无误后点击"提交订单"</span>
						</div>
					</div>
				</div>
			</div>
		<?php  }else{ ?>
			<!-- 没有用户信息时显示 -->
			<div class="order_addr">
				<div class="title">
					<span class="address"></span>
				</div>
				<div class="buygoods">
					<div class="usermessage">
						<form method="post" name="addr_info" onsubmit="return add_info(this)">
						<input type="hidden" name="uid" value="<?php echo $_SESSION['uid'];?>" />
							<div class="addr">
								<div class="sh">
									<div class="shr">
										<div class="tarea_title">
											<span class="star">*</span>
											收 货 人 ：
										</div>
										<div class="shrname">
											<input type="text" placeholder="填写收货人的真实姓名" name="name"class="name" />
										</div>
									</div>
								</div>
								<!-- 选择城市 -->
								<div class="dizhi">
									<div class="tarea_title">
										<span class="star">*</span>
											选择地区：
									</div>
									<div class="shrname">
										<select name="province" id="" onchange="_province(this)"> 
											<option value="0">请选择省份</option>

											<?php $hd["list"]["d"]["total"]=0;if(isset($provincedata) && !empty($provincedata)):$_id_d=0;$_index_d=0;$lastd=min(1000,count($provincedata));
$hd["list"]["d"]["first"]=true;
$hd["list"]["d"]["last"]=false;
$_total_d=ceil($lastd/1);$hd["list"]["d"]["total"]=$_total_d;
$_data_d = array_slice($provincedata,0,$lastd);
if(count($_data_d)==0):echo "";
else:
foreach($_data_d as $key=>$d):
if(($_id_d)%1==0):$_id_d++;else:$_id_d++;continue;endif;
$hd["list"]["d"]["index"]=++$_index_d;
if($_index_d>=$_total_d):$hd["list"]["d"]["last"]=true;endif;?>

												<option value="<?php echo $d['ProvinceID'];?>"><?php echo $d['ProvinceName'];?></option>
											<?php $hd["list"]["d"]["first"]=false;
endforeach;
endif;
else:
echo "";
endif;?>
										</select>
										<select name="city" onchange="_city(this)">
											<option value="0" class="city">请选择城市</option>
										</select>
										<select name="area" >
											<option value="0" class="area">请选择区/县</option>
										</select>
									</div>
								</div>
								<!-- 详细地址 -->
								<div class="xxdz">
									<div class="tarea_title">
										<span class="star">*</span>
											详细地址：
									</div>
									<div class="shrname">
										<input type="text" class="dzxx" name="addr_content"placeholder="请您填写收货人详细地址" />
									</div>
								</div>
								<!-- 邮政编码 -->
								<div class="yzbm">
									<div class="tarea_title">
										<span class="star">*</span>
											邮政编码：
									</div>
									<div class="shrname">
										<input name="postcode" type="text" placeholder="请您填写邮政编码" class="name"/>	
									</div>
								</div>
								<!-- 电子邮箱 -->
								<div class="email">
									<div class="tarea_title">
										<span class="star"></span>
											电子邮箱：
									</div>
									<div class="shrname">
										<input type="text" class="name" name="email"placeholder="请您填写电子邮箱" />
									</div>
								</div>
								<!-- 手机 -->
								<div class="phone">
									<div class="tarea_title">
										<span class="star">*</span>
											手 机：
									</div>
									<div class="shrname">
										<input type="text" class="name" name="phone" placeholder="请填写手机号码" />
									</div>
								</div>
								<!-- 电话 -->
								<div class="dh">
									<div class="tarea_title">
										<span class="star">*</span>
											电 话：
									</div>
									<div class="shrname">
										<input type="text" class="name" name="tel" placeholder="请填写电话号码" />
										 <span class="format">电话格式：如：010-65690100-021</span>
									</div>
								</div>
								<!-- 确定按钮 -->
								<div class="surebtn" >
									<input type="submit" value="确定" />
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		<?php }?>
		</div>
	</div>

	<!-- order end -->
	<!-- foot start -->
	<?php if(!defined("HDPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><div id="foot">
		<div class="footinfo">
			<div class="footinfos">
				<ul>
					<li class="lititle"><a href="">新手指南</a></li>
					<li> <a href="">注册新用户</a> </li>
					<li> <a href="">如何订购</a> </li>
					<li> <a href="">如何修改订单</a> </li>
					<li> <a href="">尺码对照表</a> </li>
				</ul>
				
				<ul>
					<li class="lititle"><a href="">支付方式</a></li>
					<li> <a href="">支付方式</a> </li>
					<li> <a href="">账户提现及退款时效</a> </li>
					<li> <a href="">查看帐户余额</a> </li>
				</ul>
				<ul>
					<li class="lititle"><a href="">配送方式</a></li>
					<li> <a href="">配送费收取标准</a> </li>
					<li> <a href="">配送范围及配送时效</a> </li>
					<li> <a href="">签收注意事项</a> </li>
					<li> <a href="">海外订购</a> </li>
				</ul>
				<ul>
					<li class="lititle"><a href="">退换货服务</a></li>
					<li> <a href="">退换货政策</a> </li>
					<li> <a href="">退换货流程</a> </li>
					<li> <a href="">隐私申明</a> </li>
				</ul>
				<ul>
					<li class="lititle"><a href="">会员制度及优惠</a></li>
					<li> <a href="">优惠活动</a> </li>
					<li> <a href="">VIP优惠尊享</a> </li>
					<li> <a href="">大宗购物</a> </li>
					<li> <a href="">积分制度</a> </li>
				</ul>
				<ul>
					<li class="lititle"><a href="">帮助中心</a></li>
					<li> <a href="">忘记密码</a> </li>
					<li> <a href="">常见问题</a> </li>
					<li> <a href="">在线客服</a> </li>
					<li> <a href="">联系我们</a> </li>
				</ul>
				<ul>
					<li class="lititle"><a href="">咨询订购</a></li>
					<li> <a href="">400-716-2828</a> </li>
				</ul>
				<ul>
					<li class="lititle"><a href="">客户服务</a></li>
					<li> <a href="">400-716-7878</a> </li>
				</ul>
			</div>
		</div>
		<div class="webinfo">
				<img src="http://localhost/ymgshop/YMGSHOP/Index/View/Cart/image/web1.jpg" alt="" />
				<img src="http://localhost/ymgshop/YMGSHOP/Index/View/Cart/image/web2.jpg" alt="" />
				<img src="http://localhost/ymgshop/YMGSHOP/Index/View/Cart/image/web3.jpg" alt="" />
				<img src="http://localhost/ymgshop/YMGSHOP/Index/View/Cart/image/web4.jpg" alt="" />
		</div>
		<div class="copyright">
			<p>Copyright © 2010-2019 优美购官方网站，北京华科网络科技有限公司 All Rights Reserved 京B2-20080069号 </p>
			<div class="footlogo">
				<img src="http://localhost/ymgshop/YMGSHOP/Index/View/Cart/image/foot1.jpg" alt="" />
				<img src="http://localhost/ymgshop/YMGSHOP/Index/View/Cart/image/foot2.jpg" alt="" />
				<img src="http://localhost/ymgshop/YMGSHOP/Index/View/Cart/image/foot3.jpg" alt="" />
				<img src="http://localhost/ymgshop/YMGSHOP/Index/View/Cart/image/foot4.jpg" alt="" />
				<img src="http://localhost/ymgshop/YMGSHOP/Index/View/Cart/image/foot5.jpg" alt="" />
				<img src="http://localhost/ymgshop/YMGSHOP/Index/View/Cart/image/foot6.jpg" alt="" />
				<img src="http://localhost/ymgshop/YMGSHOP/Index/View/Cart/image/foot7.jpg" alt="" />
			</div>
		</div>
	</div>
	<!-- foot end -->
</body>
</html>