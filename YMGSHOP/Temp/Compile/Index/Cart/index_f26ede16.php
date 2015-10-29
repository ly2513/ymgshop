<?php if(!defined("HDPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
<title>购物车</title>
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
URL = 'http://localhost/product/ymgshop/index.php/Index/Cart/index';
APP = 'http://localhost/product/ymgshop/YMGSHOP';
COMMON = 'http://localhost/product/ymgshop/YMGSHOP/Common';
HDPHP = 'http://localhost/product/hdphp/hdphp';
HDPHPDATA = 'http://localhost/product/hdphp/hdphp/Data';
HDPHPEXTEND = 'http://localhost/product/hdphp/hdphp/Extend';
MODULE = 'http://localhost/product/ymgshop/index.php/Index';
CONTROLLER = 'http://localhost/product/ymgshop/index.php/Index/Cart';
ACTION = 'http://localhost/product/ymgshop/index.php/Index/Cart/index';
STATIC = 'http://localhost/product/ymgshop/Static';
HDPHPTPL = 'http://localhost/product/hdphp/hdphp/Lib/Tpl';
VIEW = 'http://localhost/product/ymgshop/YMGSHOP/Index/View';
PUBLIC = 'http://localhost/product/ymgshop/YMGSHOP/Index/View/Public';
CONTROLLERVIEW = 'http://localhost/product/ymgshop/YMGSHOP/Index/View/Cart';
HISTORY = 'http://localhost/product/ymgshop/index.php?m=Index&c=Order&a=index&price=813&payway=1';
</script>
<link rel="stylesheet" href="http://localhost/product/ymgshop/YMGSHOP/Index/View/Cart/css/mycart.css" />
<link rel="stylesheet" href="http://localhost/product/ymgshop/YMGSHOP/Index/View/Cart/css/public.css" />
<script type="text/javascript" src="http://localhost/product/ymgshop/YMGSHOP/Index/View/Cart/js/jquery.js"></script>
<script type="text/javascript" src="http://localhost/product/ymgshop/YMGSHOP/Index/View/Cart/js/mycart.js"></script>
</head>
<body>
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
	<!-- big start -->
	<div id="big">
		<div class="logo">
			<img src="http://localhost/product/ymgshop/YMGSHOP/Index/View/Cart/image/logo.png" alt=""  />
		</div>
		<div class="cart_right"></div>
	</div>
	<div class="cart_body">
		<div class="cart_main">
			<div class="title">
				<dl class="top">
					<dt>
						<input type="checkbox" name="" id="" onclick="select_all('.shop_list');" checked="" />
					</dt>
					<dd class="qb">全部</dd>
					<dd class="sp">商品</dd>
					<dd class="dj">单价</dd>
					<dd class="sl">数量</dd>
					<dd class="jexj">金额小计</dd>
					<dd class="cz">操作</dd>
				</dl>
			</div>
			<!-- 购买的商品列表 -->
			
			<div id="goods">
			
			<?php $_emptyVar =isset($_SESSION['cart'])?$_SESSION['cart']:null?><?php  if( empty($_emptyVar)){?>
			<!-- 购物车为空时显示 -->
				<div class="buygoods" style="margin-bottom:none;margin-bottom:50px">
					<div class="w980">
						<div class="section">
							<dl>
								<dt>您的购物车中没有商品，您可以：</dt>
								<dd>
									 1. 如果您还未登录，可能导致购物车为空，请&nbsp;<a href="<?php echo U('Index/User/login');?>">登录</a><br>                            2. <a href="<?php echo U('Index/Index/index');?>">立即选购商品&gt;&gt;</a> 
								</dd>
							</dl>
						</div>
					</div>
					<div style="float:left;height:50px;border-bottom:1px solid #EBEBEB; width:1198px"></div>
				</div>
			<?php }else{ ?>
				<div class="buygoods">
					<div class="shop">
						<div class="title">
							<span class="shangjia">下商品由 优美购 发货</span>
							<span class="yunfei">免配送费</span>
						</div>
						<!-- 购买的商品列表 -->
						<div class="shop_list">
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

							<div class="list" id="<?php echo $d['cartId'];?>" action="http://localhost/product/ymgshop/index.php/Index/Cart/index">
								<dl class="top">
									<dt>
										<input type="checkbox" name="" checked="" />
									</dt>
									<dd class="sp">
										<span class="left_img">
											<a href="">
											<img src="http://localhost/product/ymgshop/<?php echo $d['img'];?>" alt="" /></a>
										</span>
										<span class="goodsinfo">
											<span class="content">
												<a href="javascript:;"><?php echo $d['goods_name'];?>（180912436） </a>
											</span>
											<span class="info">
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

													   <?php echo $c['attr_name'];?>：<?php echo $c['attr_value'];?>  
												<?php $hd["list"]["d"]["first"]=false;
endforeach;
endif;
else:
echo "";
endif;?>　
											</span>
										</span>
									</dd>
									<dd class="dj">
										<p class="price">
											<span class="price_icon">￥</span>
											<span class="danjia"><?php echo $d['price'];?></span>
										</p>
									</dd>
									<dd class="sl">
										<a href="javascript:;" class="sub">-</a>
										<input type="text" value="<?php echo $d['num'];?>" name="jian"  />
										<a href="javascript:;"class="add">+</a>
									</dd>
									<dd class="jexj">
										<span class="price_icon">￥</span>
										<span class="total"><?php echo $d['totalPrice'];?></span>
									</dd>
									<dd class="cz">
										
										<p class="yichu"><a href="javascript:;" class="delete" onclick="del(this,'<?php echo $d['cartId'];?>')">移除</a></p>
									</dd>
								</dl>
							</div>
							<?php $hd["list"]["c"]["first"]=false;
endforeach;
endif;
else:
echo "";
endif;?>

						</div>	
					</div>
				</div>
				<!-- 结算 -->
				<div class="jiesuan">
					<div class="top"></div>
						<div class="goodsmoney">
							<div class="zj">
								商品数量总计：
								<span class="number"><?php echo $_SESSION['cart']['totalNum'];?>件</span>
								<span class="money"> 折后商品金额总计:</span>
								<span class="rmb">￥</span>
								<span class="allmoney"><?php echo $_SESSION['cart']['totalPrice'];?></span>
							</div>
						</div>
						<div class="jiesuansub">
							<div class="right">
								<a href="javascript:;" class="tijiaosub" onclick="jiesuan('<?php echo $_SESSION['username'];?>','<?php echo U('Cart/order');?>')">去结算</a>
							</div>
						</div>
					</div>
				</div>
			<?php }?>
			</div>
			

			
		</div>
	</div>
	<!-- big end -->
	<!-- 修改布局 -->
	<!-- <div id="xiugai">
		<div class="top">
			<span class="title">选择颜色尺码</span>
			<i class="icon i" >&#xf00b3;</i>
		</div>
		<div class="xiugai_content">
			<div class="body">
				<div class="shopimg">
					<img src="image/xiugaishoping.jpg" alt="" width="100" />
				</div>
				<div class="shop_info">
					<div class="color">
						<ul style="width:100%">
							<li><b>时尚印花两面穿呢绒大衣</b></li>
							<li class="tit">颜色:</li>
							<li></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div> -->
	
	<!-- 登录界面 -->
		<div id="login" style="display:none">
			<div class="memberlogin">
				<span class="membername">会员登录</span>
				<i class="iconfont" style="float:right;line-height:22px;color:#fff;cursor:pointer" id="guanbi">&#xf00b3;</i>
			</div>
			<div class="member_content "  id="userlogin">
				<h2 class="title">
					<img src="http://localhost/product/ymgshop/YMGSHOP/Index/View/Cart/image/l_16_01.jpg" alt="" />
					<img src="http://localhost/product/ymgshop/YMGSHOP/Index/View/Cart/image/l_16_02.jpg" alt="" id="img_register"/>
				</h2>
				<!-- 用户登录信息 -->
				<form method="post" name="login"  onsubmit="return _login(this,'<?php echo U('Cart/order');?>')" >
					<div class="user_info">
						<div class="user_info_l">
							<div id="loginMsg"></div>
							<div class="f_item">
								<label class="i_label">邮箱:</label>
								<input name="email" id="email" class="i_text" placeholder="请输入邮箱" type="text">
							</div>
							<div class="f_item">
								<label class="i_label">登录密码:</label>
								<input name="password" id="password" class="i_text" placeholder="请输入密码" type="password">
							</div>
							<div class="f_item">
								<label class="i_label">验证码:</label>
								<input name="code" id="code" class="i_text_checkCode" placeholder="请输入验证码" type="text">
								<span class="check_code">
									<img src="<?php echo U('Login/code');?>" alt="" class="checkCodeImg" />
									<span style="float:left;margin-left:10px;cursor: pointer;line-height:22px" id="clickcode"> 换一张</span>
								</span>
								
							</div>
							<div class="f_item" style="padding-top: 12px;height: 75px;">
								<label class="i_label"></label>
								<input type="submit" value="登录" class="i_btn_ok" />
							</div>
						</div>
					</div>
				</form>
			</div>

			<!-- 用户注册 -->
			<div class="member_content" id="register" style="display:none">
				<h2 class="title">
					<img src="http://localhost/product/ymgshop/YMGSHOP/Index/View/Cart/image/l_17_01.jpg" alt="" id="img_login"/>
					<img src="http://localhost/product/ymgshop/YMGSHOP/Index/View/Cart/image/l_17_02.jpg" alt="" />
				</h2>
				<!-- 用户注册信息 -->
				<div class="user_info">
					<div class="user_info_l">
						<form  method="post" name="register" onsubmit="return _registers(this)">
							<div id="loginMsg"></div>
							<div class="f_item">
								<label class="i_label">用户名:</label>
								<input name="username" id="username" class="i_text" placeholder="请输入用户名" type="text">
							</div>
							<div class="f_item">
								<label class="i_label">邮箱:</label>
								<input name="email" id="email" class="i_text" placeholder="请输入邮箱" type="text">
							</div>
							<div class="f_item">
								<label class="i_label">设置密码:</label>
								<input name="password" id="password" class="i_text" placeholder="请输入密码" type="password">
							</div>
							<div class="f_item">
								<label class="i_label">确认密码:</label>
								<input name="repassword" id="repassword" class="i_text" placeholder="请输入确认密码" type="password">
							</div>
							<div class="f_item">
								<label class="i_label">验证码:</label>
								<input name="code" id="code" class="i_text_checkCode" placeholder="请输入验证码" type="text">
								<span class="check_code">
									<img src="<?php echo U('Login/code');?>" alt="" class="checkCodeImg" />
									<span style="float:left;margin-left:10px;cursor: pointer; line-height:22px" id="clickcode"> 换一张</span>
								</span>
								
							</div>
							<div class="f_item" style="padding-top: 12px;height: 75px;">
								<label class="i_label"></label>
								<input type="submit" value="注册" class="i_btn_ok" />
							</div>

						</form>

					</div>
				</div>
			</div>
        </div>
	<!-- 登录界面结束 -->
	<!-- 遮罩 -->
	<div class="zhezhao"></div>

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
				<img src="http://localhost/product/ymgshop/YMGSHOP/Index/View/Cart/image/web1.jpg" alt="" />
				<img src="http://localhost/product/ymgshop/YMGSHOP/Index/View/Cart/image/web2.jpg" alt="" />
				<img src="http://localhost/product/ymgshop/YMGSHOP/Index/View/Cart/image/web3.jpg" alt="" />
				<img src="http://localhost/product/ymgshop/YMGSHOP/Index/View/Cart/image/web4.jpg" alt="" />
		</div>
		<div class="copyright">
			<p>Copyright © 2010-2019 优美购官方网站，北京华科网络科技有限公司 All Rights Reserved 京B2-20080069号 </p>
			<div class="footlogo">
				<img src="http://localhost/product/ymgshop/YMGSHOP/Index/View/Cart/image/foot1.jpg" alt="" />
				<img src="http://localhost/product/ymgshop/YMGSHOP/Index/View/Cart/image/foot2.jpg" alt="" />
				<img src="http://localhost/product/ymgshop/YMGSHOP/Index/View/Cart/image/foot3.jpg" alt="" />
				<img src="http://localhost/product/ymgshop/YMGSHOP/Index/View/Cart/image/foot4.jpg" alt="" />
				<img src="http://localhost/product/ymgshop/YMGSHOP/Index/View/Cart/image/foot5.jpg" alt="" />
				<img src="http://localhost/product/ymgshop/YMGSHOP/Index/View/Cart/image/foot6.jpg" alt="" />
				<img src="http://localhost/product/ymgshop/YMGSHOP/Index/View/Cart/image/foot7.jpg" alt="" />
			</div>
		</div>
	</div>
	<!-- foot end -->
</body>
</html>