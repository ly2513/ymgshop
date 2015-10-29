<?php if(!defined("HDPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
<title><?php echo $goods['goods_name'];?></title>
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
URL = 'http://localhost/product/ymgshop/index.php/Index/Index/detail/gid/30';
APP = 'http://localhost/product/ymgshop/YMGSHOP';
COMMON = 'http://localhost/product/ymgshop/YMGSHOP/Common';
HDPHP = 'http://localhost/product/hdphp/hdphp';
HDPHPDATA = 'http://localhost/product/hdphp/hdphp/Data';
HDPHPEXTEND = 'http://localhost/product/hdphp/hdphp/Extend';
MODULE = 'http://localhost/product/ymgshop/index.php/Index';
CONTROLLER = 'http://localhost/product/ymgshop/index.php/Index/Index';
ACTION = 'http://localhost/product/ymgshop/index.php/Index/Index/detail';
STATIC = 'http://localhost/product/ymgshop/Static';
HDPHPTPL = 'http://localhost/product/hdphp/hdphp/Lib/Tpl';
VIEW = 'http://localhost/product/ymgshop/YMGSHOP/Index/View';
PUBLIC = 'http://localhost/product/ymgshop/YMGSHOP/Index/View/Public';
CONTROLLERVIEW = 'http://localhost/product/ymgshop/YMGSHOP/Index/View/Index';
HISTORY = 'http://localhost/product/ymgshop/index.php/Index/Index/index';
</script>
<link rel="stylesheet" href="http://localhost/product/ymgshop/YMGSHOP/Index/View/Index/css/detail.css" />
<link rel="stylesheet" href="http://localhost/product/ymgshop/YMGSHOP/Index/View/Index/css/public.css" />

<script type="text/javascript" src="http://localhost/product/ymgshop/YMGSHOP/Index/View/Index/js/detail.js"></script>
<script type="text/javascript" src="http://localhost/product/ymgshop/YMGSHOP/Index/View/Index/js/public.js"></script>
</head>
<body>
	<!-- header start-->
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
	<!-- header end-->
	<!-- big start -->
	<div id="big">
		<div id="main">
			<div class="main">
			<!-- left start -->
				<div class="main_left">
					<!-- title start -->
					<div class="title_nav">
						<a href="<?php echo U('index');?>">首页</a> >
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

						<a href="<?php echo U('lists',array('cid'=>$d['cid']));?>"><?php echo $d['cat_name'];?></a> >
						<?php $hd["list"]["d"]["first"]=false;
endforeach;
endif;
else:
echo "";
endif;?>
						<a href="javascript:;" class="last"><?php echo $goods['goods_name'];?></a>
					</div>
					<!-- title end -->

					<!-- left image start -->
					<div class="thumb_list">
						<div class="thumb_img_list  spec-scroll">
							<!-- 箭头 -->
							<div class="jiantou_left next"><i class="icon">&#xf02aa;</i></div>
							<div class="jiantou_right prev"><i class="icon">&#xf02a9;</i></div>

							<div class="ul items">
								<ul class="list">
								<!-- 小图 -->
										 			<?php
	 				$gid=Q('gid');
	 				//获得当前商品的详情页图片
	 				$data=M('goods_gallery')->where("goods_gid=$gid")->all();
					foreach ($data as $field):
	 			?>
									<li>
										<a href="javascript:;" onclick="bigimg(this)" 
										bigimg="<?php echo $field['img_original'];?>" img="<?php echo $field['img_url'];?>"><img src="http://localhost/product/ymgshop/<?php echo $field['thumb_url'];?>" alt=""  />
										</a>
									</li>
									<?php endforeach;?>
								<!-- 小图 -->
								</ul>
							</div>
						</div>
					</div>
					<!-- left image end -->
					<div class="pic_thumb">
						<ul>
								<!-- 中图 start -->
							<li >
								<a href=""><img src="http://localhost/product/ymgshop/<?php echo $goods['goods_img'];?>" alt="" id="img_url" /></a>	
							</li>
							<!-- 中图 end -->
						</ul>
						
						<div id="fangdajing"></div>
						<div id="left1"></div>
						<!-- 大图 start -->
						<div id="right">
							<img src="http://localhost/product/ymgshop/<?php echo $goods['original_img'];?>" alt="" id="img"></img>
						</div>
						<!-- 大图end -->
						<div class="share">
							<span class="sc">
								<a href="javascript:;" style="display:block" onclick="sc(this,'<?php echo $goods['gid'];?>','<?php echo $_SESSION['uid'];?>')"><i class="star">&#xf0145;</i><span >收藏</span></a>
							</span>
						</div>
					</div>
				</div>
			<!-- left end -->

			<!-- right start -->
				<div class="main_right">
					<h2>
						<em><?php echo $goods['goods_name'];?></em>
						<span>(184012304)</span>
					</h2>
					<div class="look_up">
						<div class="price">
							<b class="detailprice">¥<?php echo $goods['goods_price'];?> </b>
							<del>¥<?php echo $goods['market_price'];?></del>
							<i>
								<a href="">查看VIP特惠价</a>
							</i>
						</div>	
					</div>
					<div class="yhpj">
						<span class="redstar">
							<em>
								<i class="star1">&#xf0144;</i>
								<i class="star1">&#xf0144;</i>
								<i class="star1">&#xf0144;</i>
								<i class="star1">&#xf0144;</i>
								<i class="star1">&#xf0144;</i>
								<b>5.0</b>
							</em>
							<i class="yonghu">用户评分</i>
						</span>
						<span>

							<a href="">
								<span class="count">96</span>
								累计评价
							</a>

						</span>
					</div>
					<!-- shopcar start -->
					<div class="shopcar">
						<div class="color_size">
							<div class="color attr">
								<ul class="ul_1">
									
									<?php $hd["list"]["d"]["total"]=0;if(isset($goodsattr) && !empty($goodsattr)):$_id_d=0;$_index_d=0;$lastd=min(1000,count($goodsattr));
$hd["list"]["d"]["first"]=true;
$hd["list"]["d"]["last"]=false;
$_total_d=ceil($lastd/1);$hd["list"]["d"]["total"]=$_total_d;
$_data_d = array_slice($goodsattr,0,$lastd);
if(count($_data_d)==0):echo "";
else:
foreach($_data_d as $key=>$d):
if(($_id_d)%1==0):$_id_d++;else:$_id_d++;continue;endif;
$hd["list"]["d"]["index"]=++$_index_d;
if($_index_d>=$_total_d):$hd["list"]["d"]["last"]=true;endif;?>

									<?php if($d['attr_name']=='颜色'){?>
									<li class="title"><?php echo $d['attr_name'];?></li>
									<li class="txt">
									<?php $hd["list"]["c"]["total"]=0;if(isset($d['value']) && !empty($d['value'])):$_id_c=0;$_index_c=0;$lastc=min(1000,count($d['value']));
$hd["list"]["c"]["first"]=true;
$hd["list"]["c"]["last"]=false;
$_total_c=ceil($lastc/1);$hd["list"]["c"]["total"]=$_total_c;
$_data_c = array_slice($d['value'],0,$lastc);
if(count($_data_c)==0):echo "";
else:
foreach($_data_c as $key=>$c):
if(($_id_c)%1==0):$_id_c++;else:$_id_c++;continue;endif;
$hd["list"]["c"]["index"]=++$_index_c;
if($_index_c>=$_total_c):$hd["list"]["c"]["last"]=true;endif;?>

										<p id="<?php echo $c['id'];?>">
											<span>
												<a href="javascript:;"><img src="http://localhost/product/ymgshop/<?php echo $goods['goods_thumb'];?>" alt="" /></a>
											</span>
											<a href="javascript:;" class="s1" ><?php echo $c['attr_value'];?></a>
										</p>
									<?php $hd["list"]["d"]["first"]=false;
endforeach;
endif;
else:
echo "";
endif;?>
									</li>
									<?php }?>
									<?php $hd["list"]["c"]["first"]=false;
endforeach;
endif;
else:
echo "";
endif;?>
								</ul>
							</div>
							<div class="size attr">
								<ul >
									<?php $hd["list"]["d"]["total"]=0;if(isset($goodsattr) && !empty($goodsattr)):$_id_d=0;$_index_d=0;$lastd=min(1000,count($goodsattr));
$hd["list"]["d"]["first"]=true;
$hd["list"]["d"]["last"]=false;
$_total_d=ceil($lastd/1);$hd["list"]["d"]["total"]=$_total_d;
$_data_d = array_slice($goodsattr,0,$lastd);
if(count($_data_d)==0):echo "";
else:
foreach($_data_d as $key=>$d):
if(($_id_d)%1==0):$_id_d++;else:$_id_d++;continue;endif;
$hd["list"]["d"]["index"]=++$_index_d;
if($_index_d>=$_total_d):$hd["list"]["d"]["last"]=true;endif;?>

									
									<?php if($d['attr_name']=='尺寸'){?>
									<li class="title"><?php echo $d['attr_name'];?></li>
									<li class="txt">
										<span>
										<?php $hd["list"]["c"]["total"]=0;if(isset($d['value']) && !empty($d['value'])):$_id_c=0;$_index_c=0;$lastc=min(1000,count($d['value']));
$hd["list"]["c"]["first"]=true;
$hd["list"]["c"]["last"]=false;
$_total_c=ceil($lastc/1);$hd["list"]["c"]["total"]=$_total_c;
$_data_c = array_slice($d['value'],0,$lastc);
if(count($_data_c)==0):echo "";
else:
foreach($_data_c as $key=>$c):
if(($_id_c)%1==0):$_id_c++;else:$_id_c++;continue;endif;
$hd["list"]["c"]["index"]=++$_index_c;
if($_index_c>=$_total_c):$hd["list"]["c"]["last"]=true;endif;?>

										<a href="javascript:;" id="<?php echo $c['id'];?>"><?php echo $c['attr_value'];?></a>
										<?php $hd["list"]["d"]["first"]=false;
endforeach;
endif;
else:
echo "";
endif;?>
										</span>
										<a href="#contentbox2" class="check_size">查看尺码表</a>
									</li>
									<?php }?>
									<?php $hd["list"]["c"]["first"]=false;
endforeach;
endif;
else:
echo "";
endif;?>
								</ul>
							</div>
							<div class="size attr">
								<ul >
									<?php $hd["list"]["d"]["total"]=0;if(isset($goodsattr) && !empty($goodsattr)):$_id_d=0;$_index_d=0;$lastd=min(1000,count($goodsattr));
$hd["list"]["d"]["first"]=true;
$hd["list"]["d"]["last"]=false;
$_total_d=ceil($lastd/1);$hd["list"]["d"]["total"]=$_total_d;
$_data_d = array_slice($goodsattr,0,$lastd);
if(count($_data_d)==0):echo "";
else:
foreach($_data_d as $key=>$d):
if(($_id_d)%1==0):$_id_d++;else:$_id_d++;continue;endif;
$hd["list"]["d"]["index"]=++$_index_d;
if($_index_d>=$_total_d):$hd["list"]["d"]["last"]=true;endif;?>

									
									<?php if($d['attr_name']=='尺码'){?>
									<li class="title"><?php echo $d['attr_name'];?></li>
									<li class="txt">
										<span>
										<?php $hd["list"]["c"]["total"]=0;if(isset($d['value']) && !empty($d['value'])):$_id_c=0;$_index_c=0;$lastc=min(1000,count($d['value']));
$hd["list"]["c"]["first"]=true;
$hd["list"]["c"]["last"]=false;
$_total_c=ceil($lastc/1);$hd["list"]["c"]["total"]=$_total_c;
$_data_c = array_slice($d['value'],0,$lastc);
if(count($_data_c)==0):echo "";
else:
foreach($_data_c as $key=>$c):
if(($_id_c)%1==0):$_id_c++;else:$_id_c++;continue;endif;
$hd["list"]["c"]["index"]=++$_index_c;
if($_index_c>=$_total_c):$hd["list"]["c"]["last"]=true;endif;?>

											<a href="javascript:;" id="<?php echo $c['attr_id'];?>"><?php echo $c['attr_value'];?></a>	
										<?php $hd["list"]["d"]["first"]=false;
endforeach;
endif;
else:
echo "";
endif;?>
										</span>
										<a href="#contentbox2" class="check_size">查看尺码表</a>
									</li>
									<?php }?>
									<?php $hd["list"]["c"]["first"]=false;
endforeach;
endif;
else:
echo "";
endif;?>
								</ul>
							</div>
							<div class="num">
								<ul>
									<li class="title">数量</li>
									<li>
										<p>
											<i class="sub">-</i>
											<b class="countdata"> 1</b>
											<i class="add">+</i>
										</p>
										<span class="spancount"></span>
										<span class="product_num"></span>
									</li>
								</ul>
							</div>
						</div>
						<form action="" name="addcart" method="post">
							<input type="hidden" name="product_id" id="product_id"/>
							<input type="hidden" name="goods_gid" value="<?php echo $goods['gid'];?>" />
							
						</form>
						<div class="addcar">
							<span id="collect" ><i>立即购买</i></span>
							
							<span class="spanaddcart dengji" style="display:none"><i>缺货登记</i></span>
							
							<span class="spanaddcart add" ><i>加入购物车</i></span>
							
						</div>
						<div class="warm">
							服务支持：30 天无条件退货；满180元免运费<br/>
			                发 货 方：优美购
						</div>
					</div>

					<!-- shopcar end -->
				</div>
			<!-- right end -->
			</div>
		</div>
<!-- main_content start -->
		<div class="main_content">
			<!-- content_left start -->
			<div class="content_left">
				<div class="left_same">
					<div class="hotrecommend">
						<p>
							<a href=""><img src="http://localhost/product/ymgshop/YMGSHOP/Index/View/Index/image/recommend1.jpg" alt="" /></a>
							<a href=""><img src="http://localhost/product/ymgshop/YMGSHOP/Index/View/Index/image/recommend2.jpg" alt="" /></a>
						</p>
					</div>
					<p class="p"></p>
					<!-- 浏览此商品的顾客最终购买 -->
					<div class="liulanbuy">
						<div class="left_one">
							<h3>浏览此商品的顾客最终购买</h3>
							<div class="pp_list">
								<?php $hd["list"]["d"]["total"]=0;if(isset($relativegoods) && !empty($relativegoods)):$_id_d=0;$_index_d=0;$lastd=min(1000,count($relativegoods));
$hd["list"]["d"]["first"]=true;
$hd["list"]["d"]["last"]=false;
$_total_d=ceil($lastd/1);$hd["list"]["d"]["total"]=$_total_d;
$_data_d = array_slice($relativegoods,0,$lastd);
if(count($_data_d)==0):echo "";
else:
foreach($_data_d as $key=>$d):
if(($_id_d)%1==0):$_id_d++;else:$_id_d++;continue;endif;
$hd["list"]["d"]["index"]=++$_index_d;
if($_index_d>=$_total_d):$hd["list"]["d"]["last"]=true;endif;?>

								<ul>
									<li>
										<b><i>17.5%</i>购买</b>
										<a href="<?php echo U('detail',array('gid'=>$d['gid']));?>">
											<img src="http://localhost/product/ymgshop/<?php echo $d['goods_thumb'];?>" alt="" />
											<strong><?php echo $d['goods_name'];?></strong>
										</a>
										<span>
											<i>￥<?php echo $d['goods_price'];?>.00</i> <del class="d">￥<?php echo $d['market_price'];?></del>
										</span>
									</li>
								</ul>
								<?php $hd["list"]["d"]["first"]=false;
endforeach;
endif;
else:
echo "";
endif;?>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- content_left end -->
			<!-- content_right start -->
			<div class="content_right">

				<!-- 商品详情 -->
				<div class="rightItem">
					<div id="contentbox1">
						<h2>
							<a href="#contentbox1" class="cur">商品详情</a>
							<a href="#contentbox2">版型/尺码</a>
							<a href="#contentbox3">评价(96)</a>
							<a href="#contentbox4">如何支付</a>
							<a href="#contentbox5">30天无条件退货</a>
						</h2>
					</div>
					<div class="detailinfo">
						<div class="pro_info">
							<b class="info_title">商品属性</b>
							<div class="detail">
							<!-- 遍历普通属性 -->
												<?php
				// 获取某件商品的属性
					$sql="select *,ga.attr_value from shop_goods_attr ga join shop_attribute a on ga.attr_id=a.attr_id where ga.goods_gid=$gid";
					$data=M()->query($sql);
					foreach ($data as $field):
				?>

								<?php if($field['attr_type']==0){?>
									<em><b><?php echo $field['attr_name'];?>：</b><?php echo $field['attr_value'];?></em>
								<?php }?>
								<?php endforeach;?>
							</div>
						</div>
						<div class="pro_info">
							<b class="info_title">商品描述</b>
							<div class="detail">
								<p></p>
								<!-- 商品描述 -->
								<?php echo $goods['goods_desc'];?>
							</div>
						</div>
						<div class="pro_info">
							<div class="sunpro">
								<div class="box ad">
									<h4 class="hd">形象展示</h4>
									<div class="body">
									<!-- 商品详情 -->
										<?php echo $goods['goods_body'];?>
									</div>
								</div>
							</div>

						</div>
					</div>
				</div>
				<!-- 商品详情结束 -->
				<!-- 尺寸对照表 -->
				<div class="rightItem">
					<div id="contentbox2">
						<h2>
							<a href="#contentbox1" >商品详情</a>
							<a href="#contentbox2" class="cur">版型/尺码</a>
							<a href="#contentbox3">评价(96)</a>
							<a href="#contentbox4">如何支付</a>
							<a href="#contentbox5">30天无条件退货</a>
						</h2>
					</div>
					<div>
						<div class="sizereport">
							<div class="partA">
								<div class="partAcont">
									<h1><span>01</span>重要指引</h1>
									<p>
										<span >优美购品牌运用的是国际最先进的解构剪裁，请您购买时先停留半分钟，留意试穿报告的尺寸，并参考我们提供所然的尺寸表和度量方法平面图，进行购买。非常感谢您的光临！</span>
									</p>
								</div>
							</div>
							<div class="partB">
								<div class="partBcol">
									<h1><span>02</span>优美购尺寸表</h1>
									<div class="partBtable">
										<table class="table4">
											<tr>
												<th width="20%">尺寸(cm)</th>
												<th width="20%">S</th>
												<th width="20%">M</th>
												<th width="20%">L</th>
												<th width="20%">XL</th>
											</tr>
											<tr class="one">
												<td width="20%">型号</td>
												<td width="20%">155/80A</td>
												<td width="20%">160/84A</td>
												<td width="20%">165/88A</td>
												<td width="20%">170/92A</td>
											</tr>
											<tr>
												<td width="20%">后中长</td>
												<td width="20%">60</td>
												<td width="20%">61.5</td>
												<td width="20%">63</td>
												<td width="20%">64.5</td>
											</tr>
											<tr class="one">
												<td width="20%">腰围</td>
												<td width="20%">80</td>
												<td width="20%">83</td>
												<td width="20%">87</td>
												<td width="20%">91</td>
											</tr>
											<tr>
												<td width="20%">摆围</td>
												<td width="20%">90</td>
												<td width="20%">93</td>
												<td width="20%">97</td>
												<td width="20%">101</td>
											</tr>
											<tr class="one">
												<td width="20%">袖长</td>
												<td width="20%">21.2</td>
												<td width="20%">22</td>
												<td width="20%">22.8</td>
												<td width="20%">23.6</td>
											</tr>
											<tr>
												<td width="20%">袖口</td>
												<td width="20%">27</td>
												<td width="20%">28</td>
												<td width="20%">29</td>
												<td width="20%">30</td>
											</tr>
										</table>
									</div>
								</div>
								<div>
									<div class="parttitle">
										<span>03</span>
										平铺尺寸示意图
									</div>
									<div class="partimg">
										<img src="http://localhost/product/ymgshop/YMGSHOP/Index/View/Index/image/txsyt1.jpg" alt="" />
										<br />
									</div>
									<div style="width:358px;height:auto">
										<div class="celangchicun">
											<div class="chicun">
												测量尺寸
											</div>
											<div class="chicuninfo">
												<p>
													图示为测量服装尺寸的方法，测量尺寸是因手势各不同，可能会误差1-3cm。请根据自身测量的实际尺寸，再参考平面图相应部位的尺寸表，挑选适合您的尺码，一般衣服需要比身体需要大2-6cm松量。
												</p>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="partC">
								<div class="partccont">
									<div class="partcinfo">
										<h1><span class="sizereport">04</span>温馨提示</h1>
										<p>
											为了广大客户更清晰的了解穿着效果,所然品牌每个尺码是经过模特试穿的。以下表格的试穿报告,请先测量您的自身的尺寸,然后挑选与试衣模特数据接近的尺码
										</p>	
										<div class="partCtable">
											<table class="table4">
												<tr>
													<th width="10%">试穿人员</th>
													<th width="10%">身高(CM)</th>
													<th width="10%">体重(KG)</th>
													<th width="10%">肩宽</th>
													<th width="10%">胸围</th>
													<th width="10%">腰围</th>
													<th width="10%">臀围</th>
													<th width="10%">体型</th>
													<th width="10%">试穿尺码</th>
													<th width="10%">效果</th>
												</tr>
												<tr class="one">
													<td width="10%">Poplar</td>
													<td width="10%">163</td>						
													<td width="10%">48kg</td>
													<td width="10%">35</td>
													<td width="10%">83</td>
													<td width="10%">69</td>
													<td width="10%">89</td>
													<td width="10%">标准</td>
													<td width="10%">S</td>
													<td width="10%">合身</td>
												</tr>
												<tr>
													<td width="10%">Suzan</td>
													<td width="10%">164</td>
													<td width="10%">52kg</td>
													<td width="10%">39.5</td>
													<td width="10%">85</td>
													<td width="10%">69</td>
													<td width="10%">91</td>
													<td width="10%">标准</td>
													<td width="10%">M</td>
													<td width="10%">合身</td>
												</tr>
												<tr class="one">
													<td width="10%">Ellen</td>
													<td width="10%">156</td>
													<td width="10%">53kg</td>						
													<td width="10%">38</td>
													<td width="10%">87</td>
													<td width="10%">75</td>
													<td width="10%">90</td>
													<td width="10%">偏胖</td>
													<td width="10%">M</td>
													<td width="10%">合身</td>
												</tr>
												<tr>
													<td width="10%">Shirley</td>
													<td width="10%">160</td>
													<td width="10%">52kg</td>
													<td width="10%">40</td>
													<td width="10%">89</td>
													<td width="10%">78</td>
													<td width="10%">97</td>
													<td width="10%">标准</td>
													<td width="10%">L</td>
													<td width="10%">合身</td>
												</tr>
												<tr class="one">
													<td width="10%">Cora</td>
													<td width="10%">156</td>
													<td width="10%">60㎏</td> 
		 											<td width="10%">39</td>
													<td width="10%">95</td>
													<td width="10%">85</td>
													<td width="10%">100</td>
													<td width="10%">标准</td>
													<td width="10%">XL</td>
													<td width="10%">合身</td>
												</tr>
											</table>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- 尺寸对照表结束 -->
				<!-- 评价 -->
				<div class="rightItem">
					<div id="contentbox3">
						<h2>
							<a href="#contentbox1" >商品详情</a>
							<a href="#contentbox2" >版型/尺码</a>
							<a href="#contentbox3" class="cur">评价(96)</a>
							<a href="#contentbox4">如何支付</a>
							<a href="#contentbox5">30天无条件退货</a>
						</h2>
					</div>
					<div class="p_user">
						<div class="size_pingfen">
							<h3>用户评价</h3>
							<ul>
								<li>
									<label>适合度</label>
									<span>
										<i class="star1">&#xf0144;</i>
										<i class="star1">&#xf0144;</i>
										<i class="star1">&#xf0144;</i>
										<i class="star1">&#xf0144;</i>
										<i class="star1">&#xf0144;</i>
									</span>
								</li>
								<li>
									<label>外 观</label>
									<span>
										<i class="star1">&#xf0144;</i>
										<i class="star1">&#xf0144;</i>
										<i class="star1">&#xf0144;</i>
										<i class="star1">&#xf0144;</i>
										<i class="star1">&#xf0144;</i>
									</span>
								</li>
								<li>
									<label>性价比</label>
									<span>
										<i class="star1">&#xf0144;</i>
										<i class="star1">&#xf0144;</i>
										<i class="star1">&#xf0144;</i>
										<i class="star1">&#xf0144;</i>
										<i class="star1">&#xf0144;</i>
									</span>
								</li>
							</ul>
						</div>
						<div class="s_pftxt">
							<h3>尺码</h3>
							<ul>
								<li>
									<span>[偏小]</span>
									<p><b style="width:1.04px;"></b></p>
									<strong>0.8%用户</strong>
								</li>
								<li>
									<span>[适合]</span>
									<p><b style="width:117.26px;"></b></p>
									<strong>90.2%用户</strong>
								</li>
								<li>
									<span>[偏大]</span>
									<p><b style="width:11.7px;"></b></p>
									<strong>9.0%用户</strong>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<div class="selectItem">
					<p><a href="">已有<span class="red">12</span>人评价</a></p>
					<ul>
						<li class="tit">帅选:</li>
						<li>
							<select name="" >
								<option value="">颜色</option>
								<option value="深灰色">深灰色</option>
								<option value="米白色">米白色</option>
							</select>
						</li>
						<li>
							<select name="" >
								<option value="">尺码</option>
								<option value="L">L</option>
								<option value="M">M</option>
								<option value="S">S</option>
								<option value="XL">XL</option>
							</select>
						</li>
					</ul>
				</div>
				<div class="rightItem" >
					<div class="pl_lists">
						<div class="pl_user">
							<span style="float:left">
								<b>评分:</b>
								<span style="margin-right:10px">
									<i class="star1">&#xf0144;</i>
									<i class="star1">&#xf0144;</i>
									<i class="star1">&#xf0144;</i>
									<i class="star1">&#xf0144;</i>
									<i class="star1">&#xf0144;</i>
								</span>
								2014-11-18 13:04:58
							</span>
							<span style="float:right" class="time">
								sy-******63.com（IP: 59.44.61.2 辽宁省沈阳市）
							</span>
						</div>
						<div class="pltxt">
							标题：原创舒适拼料七分哈伦靴裤<br>
							评价：样式喜欢，码数偏大些！<br>
							<div class="pltxt_size">
								颜色：
									<font class="hs">深灰色</font>&nbsp;&nbsp; 
								尺码：<font class="hs">L</font>&nbsp;&nbsp;该用户认为实际尺码[合适]
							</div>
						</div>
					</div>
					<div class="pl_lists ">
						<div class="pl_user cur">
							<span style="float:left">
								<b>评分:</b>
								<span style="margin-right:10px">
									<i class="star1">&#xf0144;</i>
									<i class="star1">&#xf0144;</i>
									<i class="star1">&#xf0144;</i>
									<i class="star1">&#xf0144;</i>
									<i class="star1">&#xf0144;</i>
								</span>
								2014-11-18 13:04:58
							</span>
							<span style="float:right" class="time">
								sy-******63.com（IP: 59.44.61.2 辽宁省沈阳市）
							</span>
						</div>
						<div class="pltxt">
							标题：原创舒适拼料七分哈伦靴裤<br>
							评价：样式喜欢，码数偏大些！<br>
							<div class="pltxt_size">
								颜色：
									<font class="hs">深灰色</font>&nbsp;&nbsp; 
								尺码：<font class="hs">L</font>&nbsp;&nbsp;该用户认为实际尺码[合适]
							</div>
						</div>
					</div>
				</div>
				<!-- 评价结束 -->
				<!-- 如何支付 -->
				<div class="rightItem">
					<div id="contentbox4">
						<h2>
							<a href="#contentbox1" >商品详情</a>
							<a href="#contentbox2" >版型/尺码</a>
							<a href="#contentbox3" >评价(96)</a>
							<a href="#contentbox4" class="cur">如何支付</a>
							<a href="#contentbox5">30天无条件退货</a>
						</h2>
					</div>
					<div class="payment">
						<h3>支付方式</h3>
						<div class="paymentMain">
							<ul>
								<li>
									<b>1.在线支付</b>
									<span>
										优美购已开通“快钱”、“支付宝”、“网上银行”、“银联”等多家在线支付方式，支持包括招商银行在内的所有已开通网银功能的银行卡，可实时到帐。进行网上在线支付前，请确认您的银行卡是否开通网上在线支付功能。使用在线支付的顾客可享受优先发货的服务。
									</span> 
								</li>
								<li>
									<b>2.货到付款</b>
									<span>
										货到付款支持现金支付和移动POS刷卡支付两种方式，系统会自动根据您的收货地址提供可选择的支付方式。
									</span> 
									<span class="red">
										注：货到付款无需收取额外手续费，货到付款金额低于15元将不能享受此支付方式。
									</span>
								</li>
								<li style="border:none">
									<b>温馨提示:</b>
									<span>
										1.以上支付方式是目前顾客在优美购购物中最常见的支付方式。
									</span>
									<span>2.其他支付方式请登录优美购“<a target="_blank" href="">帮助中心</a>”查看。</span>
									<span>3.非优美购发货订单不支持货到付款</span>
								</li>
							</ul>
						</div>
					</div>
				</div>

				<!-- 如何支付结束 -->
				<!-- 30天无条件退货 -->
				<div class="rightItem">
					<div id="contentbox5">
						<h2>
							<a href="#contentbox1" >商品详情</a>
							<a href="#contentbox2" >版型/尺码</a>
							<a href="#contentbox3" >评价(96)</a>
							<a href="#contentbox4">如何支付</a>
							<a href="#contentbox5" class="cur">30天无条件退货</a>
						</h2>
					</div>
					<div class="returnMain">
						<ul>
							<li>
								<h3>优美购退换货规则</h3>
								<img src="http://localhost/product/ymgshop/YMGSHOP/Index/View/Index/image/return_img1.jpg">
							</li>
							<li>
								<h3>退换货办理流程</h3>
								<img src="http://localhost/product/ymgshop/YMGSHOP/Index/View/Index/image/return_img2.jpg">
								<div class="pay">
									<h3>退换货办理流程：</h3>
									<p>
										<span>
											因仓库无法接收到付，如您自行寄回退换货商品请先行垫付运费。收到退换货商品后，我们将以礼券形式返还运费，该礼券限下次订购时使用。
										</span>
										<span>
											未开通上门服务地区，返还礼券<font>￥10元</font>
										</span>
										<span>注：同张订单提供首次办理退换货时补贴运费</span>
									</p>
								</div>
							</li>
							<li style="border:none">
								<h3>温馨提示：</h3>
								<p>
									<span>
										1.目前开通退换货上门办理服务的地区包括：广东、北京、上海（崇明除外）,非优美购发货订单不支持。
									</span>
									<span>
										2.请您务必将退换货的服务单号置入退回的包裹内，一个包裹仅限寄回一张退换货服务单的商品。服务单号自生成之日起7日内有效，如未能在7日内将需要退回的商品寄回，需致电客服确认退、换货需求。
                        			</span>
                        			<span>
                        				3.港澳台及海外客户如需办理退、换货服务请先发邮件到：english@youmeigo.com与我们联系。
                        			</span>
								</p>

							</li>
						</ul>
					</div>
				</div>
				<!-- 30天无条件退货结束 -->
			</div>
			<!-- content_right end -->
		</div>
<!-- main_content end -->
	</div>
	<!-- big end -->
	<!-- 遮罩效果 -->
	<div class="zhezhao"></div>
	<!-- 加入购物车弹窗 -->
	<div id="tanchuang">
		<div class="content">
			<div class="top">
				<i class="icon delete" style="color:#D9347D; float:right;cursor: pointer;">&#xf00b3;</i>
			</div>
			<div class="cart">
				<p class="p1">该商品已成功放入购物车</p>
				<p> 购物车共<b >0</b>件商品</p>
				<p class="p2">
					<a href="javascript:;" id="xiaoshi"><img src="http://localhost/product/ymgshop/YMGSHOP/Index/View/Index/image/nextshop.gif" alt="" /></a>
					<a href="<?php echo U('Cart/index');?>"><img src="http://localhost/product/ymgshop/YMGSHOP/Index/View/Index/image/goshop.gif" alt="" /></a>
				</p>
			</div>
			<div class="fav">
				<p class="p1" style="font-weight:700">商品收藏成功</p>
				<p>
					您已收藏 <b>1</b>件商品<a href="">查看收藏夹</a>
				</p>
			</div>
			<div class="lost">
				<form action="" name="buhuo">
				<p>亲爱的顾客:</p>
				<p>您要购买的商品暂时缺货，请填写您的联系方式，以便我们到货后尽快通知您。感谢您光临优美购！</p>
				<p><span>Eamil:</span>
					<input type="text" name="" class="text" />
					<input type="submit" value="缺货登记" class="sub" />
				</p>
				</form>
			</div>
			<div class="box">
				<div class="title">
					购买此商品顾客还购买了
				</div>
			</div>
		</div>
	</div>

	<!-- 登录界面 -->
	<div id="login" style="display:none">
			<div class="memberlogin">
				<span class="membername">会员登录</span>
				<i class="iconfont" style="float:right;line-height:22px;color:#fff;cursor:pointer" id="guanbi">&#xf00b3;</i>
			</div>
			<div class="member_content "  id="userlogin">
				<h2 class="title">
					<img src="http://localhost/product/ymgshop/YMGSHOP/Index/View/Index/image/l_16_01.jpg" alt="" />
					<img src="http://localhost/product/ymgshop/YMGSHOP/Index/View/Index/image/l_16_02.jpg" alt="" id="img_register"/>
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
					<img src="http://localhost/product/ymgshop/YMGSHOP/Index/View/Index/image/l_17_01.jpg" alt="" id="img_login"/>
					<img src="http://localhost/product/ymgshop/YMGSHOP/Index/View/Index/image/l_17_02.jpg" alt="" />
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