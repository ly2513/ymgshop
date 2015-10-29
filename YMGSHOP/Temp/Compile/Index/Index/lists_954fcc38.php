<?php if(!defined("HDPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
<title>商城列表</title>
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
URL = 'http://localhost/product/ymgshop/index.php/Index/Index/lists/cid/128/s/0-0-0-0-0-0-0-0-0-0-0-0-0-0-0-0-0-0';
APP = 'http://localhost/product/ymgshop/YMGSHOP';
COMMON = 'http://localhost/product/ymgshop/YMGSHOP/Common';
HDPHP = 'http://localhost/product/hdphp/hdphp';
HDPHPDATA = 'http://localhost/product/hdphp/hdphp/Data';
HDPHPEXTEND = 'http://localhost/product/hdphp/hdphp/Extend';
MODULE = 'http://localhost/product/ymgshop/index.php/Index';
CONTROLLER = 'http://localhost/product/ymgshop/index.php/Index/Index';
ACTION = 'http://localhost/product/ymgshop/index.php/Index/Index/lists';
STATIC = 'http://localhost/product/ymgshop/Static';
HDPHPTPL = 'http://localhost/product/hdphp/hdphp/Lib/Tpl';
VIEW = 'http://localhost/product/ymgshop/YMGSHOP/Index/View';
PUBLIC = 'http://localhost/product/ymgshop/YMGSHOP/Index/View/Public';
CONTROLLERVIEW = 'http://localhost/product/ymgshop/YMGSHOP/Index/View/Index';
HISTORY = 'http://localhost/product/ymgshop/index.php/Index/Index/lists/cid/129/s/0-0-0-0-0-0-0-0-0-0-0-0-0-0-0-0-0-0';
</script>
<link rel="stylesheet" href="http://localhost/product/ymgshop/YMGSHOP/Index/View/Index/css/list.css" />
<link rel="stylesheet" href="http://localhost/product/ymgshop/YMGSHOP/Index/View/Index/css/public.css" />
<script type="text/javascript" src="http://localhost/product/ymgshop/YMGSHOP/Index/View/Index/js/jquery.js"></script>
<script type="text/javascript" src="http://localhost/product/ymgshop/YMGSHOP/Index/View/Index/js/list.js"></script>
<script type="text/javascript" src="http://localhost/product/ymgshop/YMGSHOP/Index/View/Index/js/public.js"></script>
</head>
<body>
	<!-- header start -->
	<?php if(!defined("HDPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><!-- top start--> 
	<div id="top">
		<div class="top">
			<div class="left">
				<?php if($_SESSION['username']==''){?>
				<span>欢迎光临优美购！</span>
				<a href="<?php echo U('User/login');?>">登录</a>  |  <a href="<?php echo U('User/register');?>">注册</a>
				<?php  }else{ ?>
				<!-- 管理员登录后 -->
					<span style="">^~^<?php echo $_SESSION['username'];?>,</span><span>欢迎光临优美购！</span><a href="<?php echo U('Member/Index/index');?>">个人中心</a>
				<a href="<?php echo U('User/out');?>">退出</a>
			<?php }?>
			</div>
		</div>
	</div>
	<!-- top end -->

	<!-- search start -->
	<div class="searchpro">
		<div id="search">
			<div class="logo">
				<a href="<?php echo U('Index/index');?>"><img src="http://localhost/product/ymgshop/YMGSHOP/Index/View/Index/image/logo.png" alt="" style="height:117px; width:310px " /></a>
			</div>

			<form action="" name="search">
			<div class="search">
				<span ><input type="text"  class="keyworks" /></span>
				<span calss="sub"><input type="submit" value="搜索"  class="sub" /> </span>
			</div>
			</form>

			<!-- shop car -->
			<div class="car">
				<div class="top_car">
					<div class="cart">
					<?php if($_SESSION['cart']['num']==''){?>
						<span id="CartCount" mola="totalqty">0</span>
					<?php  }else{ ?>
						<span id="CartCount" mola="totalqty"><?php echo $_SESSION['cart']['num'];?></span>
					<?php }?>
						<i class="iconfont">&#xf0179;</i>
							<a href="<?php echo U('Cart/index');?>">购物车</a>
						<i class="iconfont">&#xf02af;</i>
					</div>
					<?php $_emptyVar =isset($_SESSION['cart']['goods'])?$_SESSION['cart']['goods']:null?><?php  if( empty($_emptyVar)){?>
						<!--  购物车没商品时显示，有就不显示-->
						<div class="car_box">
							<span>您的购物车里还没有商品，欢迎选购！</span>	
						</div>
						<?php }else{ ?>
						<!-- 购物车商品布局 -->
						<div class="car_list">
							<ul class="topnav">
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

								<li>
									<a href="{|U:'detail',array('gid'=>$d['gid'])" class="pro_img">
										<img src="http://localhost/product/ymgshop/<?php echo $d['img'];?>" alt="">
									</a>
									<a href="<?php echo U('detail',array('gid'=>$d['gid']));?>" class="pro_name"><?php echo $d['goods_name'];?></a>
									<span class="pro_price"><?php echo $d['price'];?></span>
									<div class="num_box">
										<label class="shop_num">X<?php echo $d['num'];?></label>
										<a href="javascript:;" class="del" id="<?php echo $d['cartId'];?>" MODULE="http://localhost/product/ymgshop/index.php/Index">删除</a>
									</div>
								</li>
							<?php $hd["list"]["d"]["first"]=false;
endforeach;
endif;
else:
echo "";
endif;?>
							</ul>
							<div class="checkout_box">
								<br /><br />
								<p><span>共<strong><?php echo $_SESSION['cart']['totalNum'];?></strong>件商品</span>
									合计：<strong>￥<?php echo $_SESSION['cart']['totalPrice'];?>.00</strong>
								</p>
								<a href="<?php echo U('Cart/index');?>" class="check_btn">去结算</a>
							</div>
						</div>
					<?php }?>	
				</div>
			</div>
		</div>
	</div>
	<!-- search end -->
	<!-- nev start -->
	<div id="nev">
		<ul class="topnav">
			<li class="stone"><a href="<?php echo U('index');?>">优美购首页</a></li>
			<!-- 栏目数据 -->
			<?php $hd["list"]["d"]["total"]=0;if(isset($catedata) && !empty($catedata)):$_id_d=0;$_index_d=0;$lastd=min(1000,count($catedata));
$hd["list"]["d"]["first"]=true;
$hd["list"]["d"]["last"]=false;
$_total_d=ceil($lastd/1);$hd["list"]["d"]["total"]=$_total_d;
$_data_d = array_slice($catedata,0,$lastd);
if(count($_data_d)==0):echo "";
else:
foreach($_data_d as $key=>$d):
if(($_id_d)%1==0):$_id_d++;else:$_id_d++;continue;endif;
$hd["list"]["d"]["index"]=++$_index_d;
if($_index_d>=$_total_d):$hd["list"]["d"]["last"]=true;endif;?>

			<li><a href="<?php echo U('lists',array('cid'=>$d['cid']));?>"><?php echo $d['cat_name'];?></a></li>
			<?php $hd["list"]["d"]["first"]=false;
endforeach;
endif;
else:
echo "";
endif;?>
			<!-- 所有商品分类开始 -->
			<li class="last">
				<div id="last_nav">
					<div class="allshop">
						<a href="<?php echo U('index');?>" class="topnava">所有商品分类</a>
					</div>
					<div class="cata_group">
					<!-- girl start -->
						<dl class="cata_group_dl">
							<dt class="cata_group_dt">
								<h3><a href="javascript:;"><del></del><i class="nav_font">&#x3465;</i>女装</a></h3>
							</dt>
							<dd class="cata_group_dd">
								<div class="son_group">
									<dl>
														<?php
					$cid=1;
					$row=20;
					//实例化栏目模型对象
					$db=M('category');
					//获得当前栏目的子栏目
					$data=$db->where('pid='.$cid)->order("cid asc")->limit($row)->all();
					foreach ($data as  $field):
						
				?>
										<div class="float">
										<dt>
											<a href="<?php echo U('lists',array('cid'=>$field['cid']));?>"><?php echo $field['cat_name'];?></a>
										</dt>
											<dd>
															<?php
					$cid=$field['cid'];
					$row=20;
					//实例化栏目模型对象
					$db=M('category');
					//获得当前栏目的子栏目
					$data=$db->where('pid='.$cid)->order("cid asc")->limit($row)->all();
					foreach ($data as  $field):
						
				?>
												<a href="<?php echo U('lists',array('cid'=>$field['cid']));?>"><span><?php echo $field['cat_name'];?></span><span style="padding:0px 3px;">|</span>  </a>  
												<?php endforeach;?>
											</dd>
										</div>
										<?php endforeach;?>
									</dl>
								</div>
							</dd>
						</dl>
					<!-- girl end -->
					<!-- 内衣 -->
						<dl class="cata_group_dl huibg">
							<dt class="cata_group_dt">
								<h3><a href="javascript:;"><del></del><i class="nav_font">&#xe603;</i>内衣</a></h3>
							</dt>
							<dd class="cata_group_dd">
								<div class="son_group">
									<dl>
														<?php
					$cid=2;
					$row=20;
					//实例化栏目模型对象
					$db=M('category');
					//获得当前栏目的子栏目
					$data=$db->where('pid='.$cid)->order("cid asc")->limit($row)->all();
					foreach ($data as  $field):
						
				?>
										<div class="float">
										<dt>
											<a href="<?php echo U('lists',array('cid'=>$field['cid']));?>"><?php echo $field['cat_name'];?></a>
										</dt>
											<dd>
															<?php
					$cid=$field['cid'];
					$row=20;
					//实例化栏目模型对象
					$db=M('category');
					//获得当前栏目的子栏目
					$data=$db->where('pid='.$cid)->order("cid asc")->limit($row)->all();
					foreach ($data as  $field):
						
				?>
												<a href="<?php echo U('lists',array('cid'=>$field['cid']));?>"><span><?php echo $field['cat_name'];?></span><span style="padding:0px 3px;">|</span>  </a>  
												<?php endforeach;?>
											</dd>
										</div>
										<?php endforeach;?>
									</dl>
								</div>
							</dd>
						</dl>
						<!-- 男装 -->
						<dl class="cata_group_dl ">
							<dt class="cata_group_dt">
								<h3><a href="javascript:;"><del></del><i class="nav_font">&#x3461;</i>男装</a></h3>
							</dt>
							<dd class="cata_group_dd">
								<div class="son_group">
									<dl>
														<?php
					$cid=3;
					$row=20;
					//实例化栏目模型对象
					$db=M('category');
					//获得当前栏目的子栏目
					$data=$db->where('pid='.$cid)->order("cid asc")->limit($row)->all();
					foreach ($data as  $field):
						
				?>
										<div class="float">
										<dt>
											<a href="<?php echo U('lists',array('cid'=>$field['cid']));?>"><?php echo $field['cat_name'];?></a>
										</dt>
											<dd>
															<?php
					$cid=$field['cid'];
					$row=20;
					//实例化栏目模型对象
					$db=M('category');
					//获得当前栏目的子栏目
					$data=$db->where('pid='.$cid)->order("cid asc")->limit($row)->all();
					foreach ($data as  $field):
						
				?>
												<a href="<?php echo U('lists',array('cid'=>$field['cid']));?>"><span><?php echo $field['cat_name'];?></span><span style="padding:0px 3px;">|</span>  </a>  
												<?php endforeach;?>
											</dd>
										</div>
										<?php endforeach;?>
									</dl>
								</div>
							</dd>
						</dl>
						<!-- 童装 -->
						<dl class="cata_group_dl huibg">
							<dt class="cata_group_dt">
								<h3><a href="javascript:;"><del></del><i class="nav_font">&#xf01db;</i>童装</a></h3>
							</dt>
							<dd class="cata_group_dd">
								<div class="son_group">
									<dl>
														<?php
					$cid=4;
					$row=20;
					//实例化栏目模型对象
					$db=M('category');
					//获得当前栏目的子栏目
					$data=$db->where('pid='.$cid)->order("cid asc")->limit($row)->all();
					foreach ($data as  $field):
						
				?>
										<div class="float">
										<dt>
											<a href="<?php echo U('lists',array('cid'=>$field['cid']));?>"><?php echo $field['cat_name'];?></a>
										</dt>
											<dd>
															<?php
					$cid=$field['cid'];
					$row=20;
					//实例化栏目模型对象
					$db=M('category');
					//获得当前栏目的子栏目
					$data=$db->where('pid='.$cid)->order("cid asc")->limit($row)->all();
					foreach ($data as  $field):
						
				?>
												<a href="<?php echo U('lists',array('cid'=>$field['cid']));?>"><span><?php echo $field['cat_name'];?></span><span style="padding:0px 3px;">|</span>  </a>  
												<?php endforeach;?>
											</dd>
										</div>
										<?php endforeach;?>
									</dl>
								</div>
							</dd>
						</dl>
						<!-- 鞋子 -->
						<dl class="cata_group_dl ">
							<dt class="cata_group_dt">
								<h3><a href="javascript:;"><del></del><i class="nav_font">&#xf009a;</i>鞋子</a></h3>
							</dt>
							<dd class="cata_group_dd cata_group_dd1 ">
								<div class="son_group ">
									<dl>
														<?php
					$cid=5;
					$row=20;
					//实例化栏目模型对象
					$db=M('category');
					//获得当前栏目的子栏目
					$data=$db->where('pid='.$cid)->order("cid asc")->limit($row)->all();
					foreach ($data as  $field):
						
				?>
										<div class="float">
										<dt>
											<a href="<?php echo U('lists',array('cid'=>$field['cid']));?>"><?php echo $field['cat_name'];?></a>
										</dt>
											<dd>
															<?php
					$cid=$field['cid'];
					$row=20;
					//实例化栏目模型对象
					$db=M('category');
					//获得当前栏目的子栏目
					$data=$db->where('pid='.$cid)->order("cid asc")->limit($row)->all();
					foreach ($data as  $field):
						
				?>
												<a href="<?php echo U('lists',array('cid'=>$field['cid']));?>"><span><?php echo $field['cat_name'];?></span><span style="padding:0px 3px;">|</span>  </a>  
												<?php endforeach;?>
											</dd>
										</div>
										<?php endforeach;?>
									</dl>
								</div>
							</dd>
						</dl>
						<!-- 化妆品 -->
						<dl class="cata_group_dl huibg">
							<dt class="cata_group_dt">
								<h3><a href="javascript:;"><del></del><i class="nav_font">&#xe638;</i>化妆品</a></h3>
							</dt>
							<dd class="cata_group_dd cata_group_dd2">
								<div class="son_group">
									<dl>
														<?php
					$cid=6;
					$row=20;
					//实例化栏目模型对象
					$db=M('category');
					//获得当前栏目的子栏目
					$data=$db->where('pid='.$cid)->order("cid asc")->limit($row)->all();
					foreach ($data as  $field):
						
				?>
										<div class="float">
											<dt>
												<a href="<?php echo U('lists',array('cid'=>$field['cid']));?>"><?php echo $field['cat_name'];?></a>
											</dt>
												<dd>
																<?php
					$cid=$field['cid'];
					$row=20;
					//实例化栏目模型对象
					$db=M('category');
					//获得当前栏目的子栏目
					$data=$db->where('pid='.$cid)->order("cid asc")->limit($row)->all();
					foreach ($data as  $field):
						
				?>
													<a href="<?php echo U('lists',array('cid'=>$field['cid']));?>"><span><?php echo $field['cat_name'];?></span><span style="padding:0px 3px;">|</span>  </a>  
													<?php endforeach;?>
												</dd>
										</div>
										<?php endforeach;?>
									</dl>
								</div>
							</dd>
						</dl>
						<!-- 饰品 -->
						<dl class="cata_group_dl ">
							<dt class="cata_group_dt">
								<h3><a href="javascript:;"><del></del><i class="nav_font">&#x3452;</i>饰品</a></h3>
							</dt>
							<dd class="cata_group_dd cata_group_dd3">
								<div class="son_group">
									<dl>
														<?php
					$cid=7;
					$row=20;
					//实例化栏目模型对象
					$db=M('category');
					//获得当前栏目的子栏目
					$data=$db->where('pid='.$cid)->order("cid asc")->limit($row)->all();
					foreach ($data as  $field):
						
				?>
										<div class="float">
										<dt>
											<a href="<?php echo U('lists',array('cid'=>$field['cid']));?>"><?php echo $field['cat_name'];?></a>
										</dt>
											<dd>
															<?php
					$cid=$field['cid'];
					$row=20;
					//实例化栏目模型对象
					$db=M('category');
					//获得当前栏目的子栏目
					$data=$db->where('pid='.$cid)->order("cid asc")->limit($row)->all();
					foreach ($data as  $field):
						
				?>
												<a href="<?php echo U('lists',array('cid'=>$field['cid']));?>"><span><?php echo $field['cat_name'];?></span><span style="padding:0px 3px;">|</span>  </a>  
												<?php endforeach;?>
											</dd>
										</div>
										<?php endforeach;?>
									</dl>
								</div>
							</dd>
						</dl>
						<!-- 包包 -->
						<dl class="cata_group_dl huibg">
							<dt class="cata_group_dt">
								<h3><a href="javascript:;"><del></del><i class="nav_font">&#x3464;</i>包包</a></h3>
							</dt>
							<dd class="cata_group_dd cata_group_dd4">
								<div class="son_group">
									<dl>
														<?php
					$cid=8;
					$row=20;
					//实例化栏目模型对象
					$db=M('category');
					//获得当前栏目的子栏目
					$data=$db->where('pid='.$cid)->order("cid asc")->limit($row)->all();
					foreach ($data as  $field):
						
				?>
										<div class="float">
										<dt>
											<a href="<?php echo U('lists',array('cid'=>$field['cid']));?>"><?php echo $field['cat_name'];?></a>
										</dt>
											<dd>
															<?php
					$cid=$field['cid'];
					$row=20;
					//实例化栏目模型对象
					$db=M('category');
					//获得当前栏目的子栏目
					$data=$db->where('pid='.$cid)->order("cid asc")->limit($row)->all();
					foreach ($data as  $field):
						
				?>
												<a href="<?php echo U('lists',array('cid'=>$field['cid']));?>"><span><?php echo $field['cat_name'];?></span><span style="padding:0px 3px;">|</span>  </a>  
												<?php endforeach;?>
											</dd>
										</div>
										<?php endforeach;?>
									</dl>
								</div>
							</dd>
						</dl>
					</div>

				</div>
				

			</li>
			<!-- 所有商品分类结束 -->
		</ul>
	</div>
	<!-- nev end
	<!-- header end -->
	<!-- big start -->
	<div id="big">
		<div id="main">
		<!-- 导航开始 -->
			<div class="title_list">
			
				<a href="">首页</a>  >
				<?php $hd["list"]["d"]["total"]=0;if(isset($allparent) && !empty($allparent)):$_id_d=0;$_index_d=0;$lastd=min(1000,count($allparent));
$hd["list"]["d"]["first"]=true;
$hd["list"]["d"]["last"]=false;
$_total_d=ceil($lastd/1);$hd["list"]["d"]["total"]=$_total_d;
$_data_d = array_slice($allparent,0,$lastd);
if(count($_data_d)==0):echo "";
else:
foreach($_data_d as $key=>$d):
if(($_id_d)%1==0):$_id_d++;else:$_id_d++;continue;endif;
$hd["list"]["d"]["index"]=++$_index_d;
if($_index_d>=$_total_d):$hd["list"]["d"]["last"]=true;endif;?>

			
				<a href=""><?php echo $d['cat_name'];?></a>  >
				<?php $hd["list"]["d"]["first"]=false;
endforeach;
endif;
else:
echo "";
endif;?>
				<span>(共39件)</span>
			</div>
			<!-- 导航结束 -->
			<!-- left start -->
			<div class="list_left">
				<div class="left">
					<!-- <h3><img src="http://localhost/product/ymgshop/YMGSHOP/Index/View/Index/image/ms.jpg" alt="" /></h3> -->
					<!-- 衣服款式分类 -->
					<div class="cate_list">
						<?php $hd["list"]["d"]["total"]=0;if(isset($categorydata) && !empty($categorydata)):$_id_d=0;$_index_d=0;$lastd=min(1000,count($categorydata));
$hd["list"]["d"]["first"]=true;
$hd["list"]["d"]["last"]=false;
$_total_d=ceil($lastd/1);$hd["list"]["d"]["total"]=$_total_d;
$_data_d = array_slice($categorydata,0,$lastd);
if(count($_data_d)==0):echo "";
else:
foreach($_data_d as $key=>$d):
if(($_id_d)%1==0):$_id_d++;else:$_id_d++;continue;endif;
$hd["list"]["d"]["index"]=++$_index_d;
if($_index_d>=$_total_d):$hd["list"]["d"]["last"]=true;endif;?>

						<dl>
							<dt><a href="<?php echo U('lists',array('cid'=>$d['cid']));?>"><?php echo $d['cat_name'];?></a></dt>
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

							<dd><a href="<?php echo U('lists',array('cid'=>$c['cid']));?>"><?php echo $c['cat_name'];?></a></dd>
							<?php $hd["list"]["d"]["first"]=false;
endforeach;
endif;
else:
echo "";
endif;?>
						</dl>
						<?php $hd["list"]["c"]["first"]=false;
endforeach;
endif;
else:
echo "";
endif;?>
					</div>
					<!-- hot recomment start-->
					<div class="hotrecomment">
						<h3>本站热卖推荐</h3>
						<p>
						<?php $hd["list"]["d"]["total"]=0;if(isset($hotgoods) && !empty($hotgoods)):$_id_d=0;$_index_d=0;$lastd=min(5,count($hotgoods));
$hd["list"]["d"]["first"]=true;
$hd["list"]["d"]["last"]=false;
$_total_d=ceil($lastd/1);$hd["list"]["d"]["total"]=$_total_d;
$_data_d = array_slice($hotgoods,5,$lastd);
if(count($_data_d)==0):echo "";
else:
foreach($_data_d as $key=>$d):
if(($_id_d)%1==0):$_id_d++;else:$_id_d++;continue;endif;
$hd["list"]["d"]["index"]=++$_index_d;
if($_index_d>=$_total_d):$hd["list"]["d"]["last"]=true;endif;?>

							<a href="<?php echo U('detail',array('gid'=>$d['gid']));?>"><img src="http://localhost/product/ymgshop/<?php echo $d['goods_img'];?>" alt="" /></a>
							<span class="goodsname">
								<a href="<?php echo U('detail',array('gid'=>$d['gid']));?>"><?php echo $d['goods_name'];?></a>
							</span>
							<span class="goodsprice">￥<?php echo $d['goods_price'];?></span>
						<?php $hd["list"]["d"]["first"]=false;
endforeach;
endif;
else:
echo "";
endif;?>
							
						</p>
					</div>
					<!-- hot recomment end-->
				</div>
				<!-- hot googs TOP  start-->
				<div class="hotTop">
					<h2>热卖排行榜</h2>
					<ul>
						<?php $hd["list"]["d"]["total"]=0;if(isset($hotgoods) && !empty($hotgoods)):$_id_d=0;$_index_d=0;$lastd=min(5,count($hotgoods));
$hd["list"]["d"]["first"]=true;
$hd["list"]["d"]["last"]=false;
$_total_d=ceil($lastd/1);$hd["list"]["d"]["total"]=$_total_d;
$_data_d = array_slice($hotgoods,0,$lastd);
if(count($_data_d)==0):echo "";
else:
foreach($_data_d as $key=>$d):
if(($_id_d)%1==0):$_id_d++;else:$_id_d++;continue;endif;
$hd["list"]["d"]["index"]=++$_index_d;
if($_index_d>=$_total_d):$hd["list"]["d"]["last"]=true;endif;?>

						<li>
							<a href="<?php echo U('detail',array('gid'=>$d['gid']));?>"><img src="http://localhost/product/ymgshop/<?php echo $d['goods_img'];?>" alt="" /></a>
							<span class="goodsname">
								<a href="<?php echo U('detail',array('gid'=>$d['gid']));?>"><?php echo $d['goods_name'];?></a>
							</span>
							<span class="goodsprice">￥<?php echo $d['goods_price'];?></span>
						</li>
						<?php $hd["list"]["d"]["first"]=false;
endforeach;
endif;
else:
echo "";
endif;?>
					</ul>
				</div>
				<!-- hot googs TOP  start-->
				<div class="hotTop">
					<h1>毛衫全部商品冬季专区</h1>
					<ul>
						<li class="description">
							毛衫全部商品冬季所然专区，专业毛衫全部商品冬季品牌名家设计，潮流新款引爆毛衫全部商品冬季风潮。毛衫全部商品冬季网购领先品牌，30天免费退换货，货到付款，欲购从速哦！
						</li>
					</ul>
				</div>
				<!-- 历史记录开始 -->
				<div class="hotTop">
					<h2>最近浏览记录</h2>
					<ul>
						<li>
							<a href=""><img src="http://localhost/product/ymgshop/YMGSHOP/Index/View/Index/image/hotgoods1.jpg" alt="" /></a>
							<span class="goodsname">
								<a href="">魅力时尚个性高领套头</a>
							</span>
							<span class="goodsprice">￥200:00</span>
						</li>
						<li>
							<a href=""><img src="http://localhost/product/ymgshop/YMGSHOP/Index/View/Index/image/hotgoods2.jpg" alt="" /></a>
							<span class="goodsname">
								<a href="">魅力时尚个性高领套头</a>
							</span>
							<span class="goodsprice">￥200:00</span>
						</li>
						<li>
							<a href=""><img src="http://localhost/product/ymgshop/YMGSHOP/Index/View/Index/image/hotgoods3.jpg" alt="" /></a>
							<span class="goodsname">
								<a href="">魅力时尚个性高领套头</a>
							</span>
							<span class="goodsprice">￥200:00</span>
						</li>
					</ul>
				</div>
				<!-- 历史记录结束 -->
			</div>
			<!-- left end -->
			<!-- right start -->
			<div class="list_right">
				<!--热卖推荐开始 -->
				<div class="hot_buy">
					<h3>热卖推荐</h3>
					<ul>
						<?php $hd["list"]["d"]["total"]=0;if(isset($hotdata) && !empty($hotdata)):$_id_d=0;$_index_d=0;$lastd=min(1000,count($hotdata));
$hd["list"]["d"]["first"]=true;
$hd["list"]["d"]["last"]=false;
$_total_d=ceil($lastd/1);$hd["list"]["d"]["total"]=$_total_d;
$_data_d = array_slice($hotdata,0,$lastd);
if(count($_data_d)==0):echo "";
else:
foreach($_data_d as $key=>$d):
if(($_id_d)%1==0):$_id_d++;else:$_id_d++;continue;endif;
$hd["list"]["d"]["index"]=++$_index_d;
if($_index_d>=$_total_d):$hd["list"]["d"]["last"]=true;endif;?>

						<li>
							<a href="<?php echo U('detail',array('gid'=>$d['gid']));?>"><img src="http://localhost/product/ymgshop/<?php echo $d['goods_thumb'];?>" alt="" /></a>
							<p>
								<span class="hottuijiantitle"><?php echo $d['goods_name'];?></span>
							<em>
								<i>￥</i>
								<span class="hottuijianprice"><?php echo $d['goods_price'];?></span>
							</em>
							<a href="<?php echo U('detail',array('gid'=>$d['gid']));?>" class="buy">立即抢购</a>
							</p>	
						</li>
						<?php $hd["list"]["d"]["first"]=false;
endforeach;
endif;
else:
echo "";
endif;?>
					</ul>
				</div>
				<!--热卖推荐结束 -->
				<!-- search start -->
				<div class="search">
					<div class="you_search">
						<?php $hd["list"]["d"]["total"]=0;if(isset($attr) && !empty($attr)):$_id_d=0;$_index_d=0;$lastd=min(1000,count($attr));
$hd["list"]["d"]["first"]=true;
$hd["list"]["d"]["last"]=false;
$_total_d=ceil($lastd/1);$hd["list"]["d"]["total"]=$_total_d;
$_data_d = array_slice($attr,0,$lastd);
if(count($_data_d)==0):echo "";
else:
foreach($_data_d as $key=>$d):
if(($_id_d)%1==0):$_id_d++;else:$_id_d++;continue;endif;
$hd["list"]["d"]["index"]=++$_index_d;
if($_index_d>=$_total_d):$hd["list"]["d"]["last"]=true;endif;?>

						<dl>
							<dt><?php echo $d['attr_name'];?>
								<span><?php echo getlink($hd['list']['d']['index'],0,'重置');?>	</span>  
							</dt>
								
							<dd>
								<div class="contentdd">
									<?php $hd["list"]["c"]["total"]=0;if(isset($d['_value']) && !empty($d['_value'])):$_id_c=0;$_index_c=0;$lastc=min(1000,count($d['_value']));
$hd["list"]["c"]["first"]=true;
$hd["list"]["c"]["last"]=false;
$_total_c=ceil($lastc/1);$hd["list"]["c"]["total"]=$_total_c;
$_data_c = array_slice($d['_value'],0,$lastc);
if(count($_data_c)==0):echo "";
else:
foreach($_data_c as $key=>$c):
if(($_id_c)%1==0):$_id_c++;else:$_id_c++;continue;endif;
$hd["list"]["c"]["index"]=++$_index_c;
if($_index_c>=$_total_c):$hd["list"]["c"]["last"]=true;endif;?>

									<span >
										<?php echo getlink($hd['list']['d']['index'],$c['id'],$c['attr_value']);?>
									</span>
									<?php $hd["list"]["d"]["first"]=false;
endforeach;
endif;
else:
echo "";
endif;?>
								</div>
							</dd>
						</dl>
						<?php $hd["list"]["c"]["first"]=false;
endforeach;
endif;
else:
echo "";
endif;?>

					</div>
					<div class="rollbut">
						<img src="http://localhost/product/ymgshop/YMGSHOP/Index/View/Index/image/rollup.jpg" alt=""  class="on"/><!-- 展开 -->
						<img src="http://localhost/product/ymgshop/YMGSHOP/Index/View/Index/image/rolldown.jpg" alt=""  class="down"/><!-- 收起 -->
					</div>
				</div>
				<!-- search end -->
				
				<!-- 右侧产品区域-->
				<div class="filter">
					<div class="topdiv">
						<div class="shping">
							<div class="topdiv_on">
								<a href="javascript:;" class="" onclick="paixu(this,1)">
									<span>默认</span>
									<i class="icon">&#xf0111;</i>
								</a>
							</div>
							<div class="topdiv_on">
								<a href="javascript:;" class="" onclick="paixu(this,2)">
									<span>销量</span>
									<i class="icon">&#xf0111;</i>
								</a>
							</div>
							<div class="topdiv_on">
								<a href="javascript:;" class="" onclick="paixu(this,3)">
									<span>好评</span>
									<i class="icon">&#xf0111;</i>
								</a>
							</div>
							<div class="topdiv_on">
								<a href="javascript:;" class="" onclick="paixu(this,4)">
									<span>最新</span>
									<i class="icon">&#xf0111;</i>
								</a>
							</div>
							<div class="topdiv_on">
								<a href="javascript:;" class="" onclick="paixu(this,5)">
									<span>价格</span>
									<i class="icon">&#xf0113;</i>
								</a>
							</div>
							<div class="topdiv_on">
								<a href="javascript:;" class="" onclick="paixu(this,6)">
									<span>价格</span>
									<i class="icon">&#xf0111;</i>
								</a>
							</div>
						</div>
						<!-- <div class="pricechoose">
							<div class="pricetext">
								<span>
									<input type="text" value="￥" maxlength="8" />
								</span>
								<i>-</i>
								<span>
									<input type="text" value="￥" maxlength="8" />
								</span>
							</div>
							<div class="checkbtn1">
								<a href="javascript:void(0)" class="close">清空</a>
								<a href="javascript:void(0)" class="ok">确定</a>
							</div>	
						</div> -->
						<!-- <div class="filtermenu">
							<input type="hidden" />
							<label >
								<input type="checkbox" />
								促销商品
							</label>
						</div> -->
					</div>
				</div>
				<!-- 右侧产品列表 -->
				<div class="goods_list">
					<?php $hd["list"]["d"]["total"]=0;if(isset($data_) && !empty($data_)):$_id_d=0;$_index_d=0;$lastd=min(1000,count($data_));
$hd["list"]["d"]["first"]=true;
$hd["list"]["d"]["last"]=false;
$_total_d=ceil($lastd/1);$hd["list"]["d"]["total"]=$_total_d;
$_data_d = array_slice($data_,0,$lastd);
if(count($_data_d)==0):echo "";
else:
foreach($_data_d as $key=>$d):
if(($_id_d)%1==0):$_id_d++;else:$_id_d++;continue;endif;
$hd["list"]["d"]["index"]=++$_index_d;
if($_index_d>=$_total_d):$hd["list"]["d"]["last"]=true;endif;?>

					
						<dl class="goods_list_dl">
							<dt>
								<a href="<?php echo U('detail',array('gid'=>$d['gid']));?>">
									<img src="http://localhost/product/ymgshop/<?php echo $d['goods_thumb'];?>" alt="" />
								</a>
								<p></p>
								<div class="sizebox">
									<!-- <span>
										<i>尺码:</i>
									</span> -->
									<img src="http://localhost/product/ymgshop/YMGSHOP/Index/View/Index/image/start.jpg" alt="" />
								</div>	
								<?php if($d['is_hot']==1){?>
								<div class="hot">热销</div>
								<?php }?>
								<div class="colorbox">
									<a href="<?php echo U('detail',array('gid'=>$d['gid']));?>" size="<b> M </b>"><img src="http://localhost/product/ymgshop/YMGSHOP/Index/View/Index/image/bluebox.jpg" alt="" /></a>
									<a href="<?php echo U('detail',array('gid'=>$d['gid']));?>" size="<b> S | M | L | XL</b>"><img src="http://localhost/product/ymgshop/<?php echo $d['goods_img'];?>" alt="" /></a>
								</div>
							</dt>
							<dd>
								<span>
									<i>￥<?php echo $d['goods_price'];?></i>
									<del>￥<?php echo $d['market_price'];?></del>
								</span>
								<a href="" style="display:block"><?php echo $d['goods_name'];?></a>
								<a href="">
									<strong>评论<b> <?php echo mt_rand(1000,9000);?>条</b></strong>
								</a>
							</dd>
						</dl>
					<?php $hd["list"]["d"]["first"]=false;
endforeach;
endif;
else:
echo "";
endif;?>
					
				</div>
				<div class="page1">
					<?php echo $page;?>
				</div>
			</div>
			<!-- right end -->
		</div>

	</div>
	<!-- big end -->
	<!-- foot start -->
		<?php if(!defined("HDPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?>	<!-- foot start -->
	<div id="foot">
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
				<img src="http://localhost/product/ymgshop/YMGSHOP/Index/View/Index/image/web1.jpg" alt="" />
				<img src="http://localhost/product/ymgshop/YMGSHOP/Index/View/Index/image/web2.jpg" alt="" />
				<img src="http://localhost/product/ymgshop/YMGSHOP/Index/View/Index/image/web3.jpg" alt="" />
				<img src="http://localhost/product/ymgshop/YMGSHOP/Index/View/Index/image/web4.jpg" alt="" />
		</div>
		<div class="copyright">
			<p>Copyright © 2010-2019 优美购官方网站，北京华科网络科技有限公司 All Rights Reserved 京B2-20080069号 </p>
			<div class="footlogo">
				<img src="http://localhost/product/ymgshop/YMGSHOP/Index/View/Index/image/foot1.jpg" alt="" />
				<img src="http://localhost/product/ymgshop/YMGSHOP/Index/View/Index/image/foot2.jpg" alt="" />
				<img src="http://localhost/product/ymgshop/YMGSHOP/Index/View/Index/image/foot3.jpg" alt="" />
				<img src="http://localhost/product/ymgshop/YMGSHOP/Index/View/Index/image/foot4.jpg" alt="" />
				<img src="http://localhost/product/ymgshop/YMGSHOP/Index/View/Index/image/foot5.jpg" alt="" />
				<img src="http://localhost/product/ymgshop/YMGSHOP/Index/View/Index/image/foot6.jpg" alt="" />
				<img src="http://localhost/product/ymgshop/YMGSHOP/Index/View/Index/image/foot7.jpg" alt="" />
			</div>
		</div>
	</div>
	<!-- foot end -->
	<!-- foot end -->

</body>
</html>



