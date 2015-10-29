<?php if(!defined("HDPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
<title>提交订单</title>
<link rel="stylesheet" href="http://localhost/product/ymgshop/YMGSHOP/Index/View/Order/css/order-success.css" />
<link rel="stylesheet" href="http://localhost/product/ymgshop/YMGSHOP/Index/View/Order/css/public.css" />
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
	<div id="big">
		<div class="logo">
			<img src="http://localhost/product/ymgshop/YMGSHOP/Index/View/Order/image/logo.png" alt=""  />
		</div>
		<div class="order_right"></div>
	</div>
	<!-- order start -->
	<div id="order">
		<div class="order_main">
			<div class="paytitle">
				<p>
					<span style="font-weight:700;font-size: 26px;color: #D60076;">
						<img src="http://localhost/product/ymgshop/YMGSHOP/Index/View/Order/image/tj1.jpg" alt="" style="vertical-align:middle" />
					</span>
					<span>为保证及时处理您的订单，请于24小时内支付，否则订单将被自动取消。</span>
				</p>
			</div>
			<div class="payxx">
				<div class="pay-info-line">
					应付金额:
					<span class="price-icon">￥</span><?php echo $totalprice;?>
					<span class="pay-line">|</span>
					<!-- 支付方式和总价 -->
					<font class="red">
					<?php if($payway == 2){?>
						货到付款
					<?php  }else{ ?>
						在线支付
					<?php }?>：<span class="price-icon">￥</span><?php echo $totalprice;?></font>
				</div>
				<div style="text-align:center">
					<table class="pay_table">
						<tbody>
							<tr>
								<td>订单号：<?php echo $order_sn;?> </td>
								<td>网上在线支付:
									<span class="price-icon">￥</span><?php echo $totalprice;?>
                                </td>
								<td>由优美购发货</td>
							</tr>
						</tbody>
					</table>
				</div>
				<!-- 订单信息 -->
				<div class="order_info">
					<a href="<?php echo U('Member/Index/index');?>" class="red"> 查看订单 </a>
					<span class="red_line">|</span>
					<a href="<?php echo U('Member/Index/index');?>" class="red">修改订单</a>
				</div>
			</div>
			<!-- 支付银行 -->
			<?php if($payway == 1){?>
			<div class="banks">
				<div class="bstitle">
					<ul>
						<li class="bb1"></li>
						<li class="bb3 on">全部支付方式</li>
						<li class="bb4"></li>
					</ul>
				</div>
				<div class="bks1">
					<!-- <div style="width: 960px;float: left;">
						<div class="t1">网上银行：</div>
						<label >
							<dl>
								<dt>
									<input type="radio" name="bank" id="" />
								</dt>
								<dd>
									<img src="http://localhost/product/ymgshop/YMGSHOP/Index/View/Order/image/gsbank.jpg" alt="" />
								</dd>
							</dl>
						</label>
						<label >
							<dl>
								<dt>
									<input type="radio" name="bank" id="" />
								</dt>
								<dd>
									<img src="http://localhost/product/ymgshop/YMGSHOP/Index/View/Order/image/jhbank.jpg" alt="" />
								</dd>
							</dl>
						</label>
						<label >
							<dl>
								<dt>
									<input type="radio" name="bank" id="" />
								</dt>
								<dd>
									<img src="http://localhost/product/ymgshop/YMGSHOP/Index/View/Order/image/nybank.jpg" alt="" />
								</dd>
							</dl>
						</label>
						<label >
							<dl>
								<dt>
									<input type="radio" name="bank" id="" />
								</dt>
								<dd>
									<img src="http://localhost/product/ymgshop/YMGSHOP/Index/View/Order/image/jtbank.jpg" alt="" />
								</dd>
							</dl>
						</label>
						<label >
							<dl>
								<dt>
									<input type="radio" name="bank" id="" />
								</dt>
								<dd>
									<img src="http://localhost/product/ymgshop/YMGSHOP/Index/View/Order/image/zgbank.jpg" alt="" />
								</dd>
							</dl>
						</label>
						<label >
							<dl>
								<dt>
									<input type="radio" name="bank" id="" />
								</dt>
								<dd>
									<img src="http://localhost/product/ymgshop/YMGSHOP/Index/View/Order/image/yzbank.jpg" alt="" />
								</dd>
							</dl>
						</label>
						<label >
							<dl>
								<dt>
									<input type="radio" name="bank" id="" />
								</dt>
								<dd>
									<img src="http://localhost/product/ymgshop/YMGSHOP/Index/View/Order/image/xybank.jpg" alt="" />
								</dd>
							</dl>
						</label>
						<label >
							<dl>
								<dt>
									<input type="radio" name="bank" id="" />
								</dt>
								<dd>
									<img src="http://localhost/product/ymgshop/YMGSHOP/Index/View/Order/image/msbank.jpg" alt="" />
								</dd>
							</dl>
						</label>
						<label >
							<dl>
								<dt>
									<input type="radio" name="bank" id="" />
								</dt>
								<dd>
									<img src="http://localhost/product/ymgshop/YMGSHOP/Index/View/Order/image/nbbank.jpg" alt="" />
								</dd>
							</dl>
						</label>
						<label >
							<dl>
								<dt>
									<input type="radio" name="bank" id="" />
								</dt>
								<dd>
									<img src="http://localhost/product/ymgshop/YMGSHOP/Index/View/Order/image/zxbank.jpg" alt="" />
								</dd>
							</dl>
						</label>
						<label >
							<dl>
								<dt>
									<input type="radio" name="bank" id="" />
								</dt>
								<dd>
									<img src="http://localhost/product/ymgshop/YMGSHOP/Index/View/Order/image/pfbank.gif" alt="" />
								</dd>
							</dl>
						</label>
					</div> -->
					<!-- 支付宝支付 -->
					<div style="width: 960px;float:left; _padding-bottom: 30px;">
						<div class="t2">支付平台：</div>
						<label >
							<dl>
								<dt>
									<input type="radio" name="bank" id="" value="alipay" />
								</dt>
								<dd>
									<img src="http://localhost/product/ymgshop/YMGSHOP/Index/View/Order/image/zfb.jpg" alt="" />
								</dd>
							</dl>
						</label>
						<!-- <label >
							<dl>
								<dt>
									<input type="radio" name="bank" id="" />
								</dt>
								<dd>
									<img src="http://localhost/product/ymgshop/YMGSHOP/Index/View/Order/image/zfbsm.gif" alt="" />
								</dd>
							</dl>
						</label> -->
					</div>
					<!-- 信用卡支付 -->
					<!-- <div style="width: 960px;float:left; _padding-bottom: 30px;">
						<div class="t2">信用卡快捷支付（无需开通网银）:</div>
						<label >
							<dl>
								<dt>
									<input type="radio" name="bank" id="" />
								</dt>
								<dd>
									<img src="http://localhost/product/ymgshop/YMGSHOP/Index/View/Order/image/gsbank.jpg" alt="" />
								</dd>
							</dl>
						</label>
						<label >
							<dl>
								<dt>
									<input type="radio" name="bank" id="" />
								</dt>
								<dd>
									<img src="http://localhost/product/ymgshop/YMGSHOP/Index/View/Order/image/jhbank.jpg" alt="" />
								</dd>
							</dl>
						</label>
					</div> -->
				</div>
				<div class="paynow">
					<form action="<?php echo U('Alipay/index');?>" method="post" name="alipay" onclick="submit(this)" >
						<input type="hidden" name="ordername" value="<?php echo $order_sn;?>" />
						<input type="hidden" name="total" value="<?php echo $totalprice;?>" />
						<input type="image" src="http://localhost/product/ymgshop/YMGSHOP/Index/View/Order/image/paynow.jpg" />	
					</form>
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
				<img src="http://localhost/product/ymgshop/YMGSHOP/Index/View/Order/image/web1.jpg" alt="" />
				<img src="http://localhost/product/ymgshop/YMGSHOP/Index/View/Order/image/web2.jpg" alt="" />
				<img src="http://localhost/product/ymgshop/YMGSHOP/Index/View/Order/image/web3.jpg" alt="" />
				<img src="http://localhost/product/ymgshop/YMGSHOP/Index/View/Order/image/web4.jpg" alt="" />
		</div>
		<div class="copyright">
			<p>Copyright © 2010-2019 优美购官方网站，北京华科网络科技有限公司 All Rights Reserved 京B2-20080069号 </p>
			<div class="footlogo">
				<img src="http://localhost/product/ymgshop/YMGSHOP/Index/View/Order/image/foot1.jpg" alt="" />
				<img src="http://localhost/product/ymgshop/YMGSHOP/Index/View/Order/image/foot2.jpg" alt="" />
				<img src="http://localhost/product/ymgshop/YMGSHOP/Index/View/Order/image/foot3.jpg" alt="" />
				<img src="http://localhost/product/ymgshop/YMGSHOP/Index/View/Order/image/foot4.jpg" alt="" />
				<img src="http://localhost/product/ymgshop/YMGSHOP/Index/View/Order/image/foot5.jpg" alt="" />
				<img src="http://localhost/product/ymgshop/YMGSHOP/Index/View/Order/image/foot6.jpg" alt="" />
				<img src="http://localhost/product/ymgshop/YMGSHOP/Index/View/Order/image/foot7.jpg" alt="" />
			</div>
		</div>
	</div>
	<!-- foot end -->
</body>
</html>