<?php if(!defined("HDPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
<title>优美购首页</title>
<link rel="stylesheet" href="http://localhost/product/ymgshop/YMGSHOP/Index/View/Index/css/css.css" />
<link rel="stylesheet" href="http://localhost/product/ymgshop/YMGSHOP/Index/View/Index/css/public.css" />
<script type="text/javascript" src="http://localhost/product/ymgshop/YMGSHOP/Index/View/Index/js/jquery.js"></script>
<script type="text/javascript" src="http://localhost/product/ymgshop/YMGSHOP/Index/View/Index/js/js.js"></script>
<script type="text/javascript" src="http://localhost/product/ymgshop/YMGSHOP/Index/View/Index/js/public.js"></script>
</head>
<body>
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
	<!-- big start -->
	<div id="big">
		<!-- 轮播图区域开始 -->
		<div id="bigimg">
			<div class="lunul">
				<ul id="lunimg">
					<li><a href="javascript:;"><img src="http://localhost/product/ymgshop/YMGSHOP/Index/View/Index/image/bigimg1.jpg" alt="" /></a></li>
					<li><a href="javascript:;"><img src="http://localhost/product/ymgshop/YMGSHOP/Index/View/Index/image/bigimg2.jpg" alt="" /></a></li>
					<li><a href="javascript:;"><img src="http://localhost/product/ymgshop/YMGSHOP/Index/View/Index/image/bigimg3.jpg" alt="" /></a></li>
					<li><a href="javascript:;"><img src="http://localhost/product/ymgshop/YMGSHOP/Index/View/Index/image/bigimg4.jpg" alt="" /></a></li>
					<li><a href="javascript:;"><img src="http://localhost/product/ymgshop/YMGSHOP/Index/View/Index/image/bigimg5.jpg" alt="" /></a></li>
					<li><a href="javascript:;"><img src="http://localhost/product/ymgshop/YMGSHOP/Index/View/Index/image/bigimg6.jpg" alt="" /></a></li>
					<li><a href="javascript:;"><img src="http://localhost/product/ymgshop/YMGSHOP/Index/View/Index/image/bigimg1.jpg" alt="" /></a></li>
				</ul>
			</div>
			<!-- 小圆点 -->
			<ul class="round">
				<li class="cur">1</li>
				<li>2</li>
				<li>3</li>
				<li>4</li>
				<li>5</li>
				<li>6</li>
			</ul>
			<!-- 箭头 -->
			<i class="jiantou left">&#xf016e;</i>
			<i class="jiantou right">&#xf016d;</i>
		</div>
		<!-- 轮播图区域结束 -->
		
		<!-- 产品区域开始 -->
		<div id="main">	
		<!-- 产品活动区域开始 -->
			<div class="shopaction">
				<a href="#hotgoods"><img src="http://localhost/product/ymgshop/YMGSHOP/Index/View/Index/image/action1.jpg" alt="" /></a>
				<a href="#newgoods"><img src="http://localhost/product/ymgshop/YMGSHOP/Index/View/Index/image/1838.jpg" alt="" /></a>
				<a href="<?php echo U('lists',array('cid'=>206));?>"><img src="http://localhost/product/ymgshop/YMGSHOP/Index/View/Index/image/action2.jpg" alt="" /></a>
				<a href="<?php echo U('lists',array('cid'=>9));?>"><img src="http://localhost/product/ymgshop/YMGSHOP/Index/View/Index/image/action3.jpg" alt="" /></a>
				<a href="<?php echo U('lists',array('cid'=>20));?>"><img src="http://localhost/product/ymgshop/YMGSHOP/Index/View/Index/image/action4.jpg" alt="" /></a>
			</div>
		<!-- 产品活动区域结束 -->
		<!-- 原创热销区域开始 -->
			<div class="yc" id="hotgoods">
				<p><img src="http://localhost/product/ymgshop/YMGSHOP/Index/View/Index/image/ad1.jpg" alt="" /></p>
				<div class="more">
					<span><a href="javascript:;">T恤/毛衫/连衣裙</a></span>
				</div>
				<div class="hotgoogstop">
					<div class="line"></div>
					<span><a href="<?php echo U('detail',array('gid'=>34));?>"><img src="http://localhost/product/ymgshop/YMGSHOP/Index/View/Index/image/1836.jpg" alt="" /></a></span>
					<span><a href="<?php echo U('detail',array('gid'=>35));?>"><img src="http://localhost/product/ymgshop/YMGSHOP/Index/View/Index/image/1837.jpg" alt="" /></a></span>
				</div>
				<div class="hotgoods" >
					<?php $hd["list"]["d"]["total"]=0;if(isset($hotgoods) && !empty($hotgoods)):$_id_d=0;$_index_d=0;$lastd=min(1000,count($hotgoods));
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

					<dl>
						<dt><a href="<?php echo U('detail',array('gid'=>$d['gid']));?>"><img src="http://localhost/product/ymgshop/<?php echo $d['goods_thumb'];?>" alt="" style=" height:262px; width:193px" /></a></dt>
						<dd class="dd">
							<p>
								<span class="goods_num">总销
									<span>17584</span>件
								</span>
								<span class="goods_list">1</span>
							</p>
							<p>
								<a href="<?php echo U('detail',array('gid'=>$d['gid']));?>"><?php echo $d['goods_name'];?></a>
								<span class="price">RMB:<span><?php echo $d['goods_price'];?></span></span>
							</p>
						</dd>
					</dl>
					<?php $hd["list"]["d"]["first"]=false;
endforeach;
endif;
else:
echo "";
endif;?>
				</div>
			</div>
		<!-- 原创热销区域结束 -->
		<!-- 原创折扣区域开始 -->
			<div class="yc" id="newgoods">
				<p><img src="http://localhost/product/ymgshop/YMGSHOP/Index/View/Index/image/ad2.jpg" alt="" /></p>
				<div class="more">
					<span><a href="<?php echo U('lists',array('cid'=>1));?>">更多/MORE ></a></span>
				</div>
				<div class="zkgoods">
					<?php $hd["list"]["d"]["total"]=0;if(isset($newgoods) && !empty($newgoods)):$_id_d=0;$_index_d=0;$lastd=min(1000,count($newgoods));
$hd["list"]["d"]["first"]=true;
$hd["list"]["d"]["last"]=false;
$_total_d=ceil($lastd/1);$hd["list"]["d"]["total"]=$_total_d;
$_data_d = array_slice($newgoods,0,$lastd);
if(count($_data_d)==0):echo "";
else:
foreach($_data_d as $key=>$d):
if(($_id_d)%1==0):$_id_d++;else:$_id_d++;continue;endif;
$hd["list"]["d"]["index"]=++$_index_d;
if($_index_d>=$_total_d):$hd["list"]["d"]["last"]=true;endif;?>

					<dl>
						<dt >
							<a href="<?php echo U('detail',array('gid'=>$d['gid']));?>" ><img src="http://localhost/product/ymgshop/<?php echo $d['goods_img'];?>" alt="" /></a>
							<!-- 这盖标题 -->
							<span class="title" style="display:none">
								<p class="t">
									<a href=""><?php echo $d['goods_name'];?></a>
								</p>
								<p class="s">已售:428件</p>
							</span>
							<span class="titlebg" style="display:none"></span>
						</dt>
						<dd>
							<div class="sales">
								<p class="rmb">
									￥<?php echo $d['goods_price'];?>
									<del>￥<?php echo $d['market_price'];?></del>
								</p>
								<p class="getto">
									<a href="<?php echo U('detail',array('gid'=>$d['gid']));?>"><img src="http://localhost/product/ymgshop/YMGSHOP/Index/View/Index/image/qianggou.jpg" alt="" /></a>
								</p>
							</div>
						</dd>
					</dl>
					<?php $hd["list"]["d"]["first"]=false;
endforeach;
endif;
else:
echo "";
endif;?>
					
				</div>
			</div>
		<!-- 原创新品区域结束 -->
		<!-- 商品类型导航图片开始-->
			<div class="imgnav">
				<a href="<?php echo U('lists',array('cid'=>10));?>"><img src="http://localhost/product/ymgshop/YMGSHOP/Index/View/Index/image/nav1.jpg" alt="" /></a>
				<a href="<?php echo U('lists',array('cid'=>14));?>"><img src="http://localhost/product/ymgshop/YMGSHOP/Index/View/Index/image/nav2.jpg" alt="" /></a>
				<a href="<?php echo U('lists',array('cid'=>33));?>"><img src="http://localhost/product/ymgshop/YMGSHOP/Index/View/Index/image/nav3.jpg" alt="" /></a>
				<a href="<?php echo U('lists',array('cid'=>206));?>"><img src="http://localhost/product/ymgshop/YMGSHOP/Index/View/Index/image/nav4.jpg" alt="" /></a>
				<a href="<?php echo U('lists',array('cid'=>42));?>"><img src="http://localhost/product/ymgshop/YMGSHOP/Index/View/Index/image/nav5.jpg" alt="" /></a>
				<a href="<?php echo U('lists',array('cid'=>20));?>"><img src="http://localhost/product/ymgshop/YMGSHOP/Index/View/Index/image/nav6.jpg" alt="" /></a>
			</div>
		<!-- 商品类型导航图片结束 -->
		<!-- 针织衫产品区域开始 -->
			<div class="zzs">
				<div id="zzs">
					<a href="<?php echo U('lists',array('cid'=>206));?>"><img src="http://localhost/product/ymgshop/YMGSHOP/Index/View/Index/image/zzs.jpg" alt="" /></a>
				</div>
				<div class="proimg">
									<?php 
					$cid=206;
					$row=5;
					//获得所有的栏目数据
					$allcate=M('category')->all();
					// 找到当前栏目的所有子栏目数据
					$allcid=Data::channelList($allcate,$cid);
					//获得当前栏目的子栏目cid
					$allcid = array_keys($allcid);
					//将当前的栏目的cid压入
					$allcid[]=$cid;
					$map['cid']=array('IN',$allcid);
					//获得当前栏目的所有子栏目的商品数据
					$data=M('goods')->where($map)->limit($row)->all();
					foreach ($data as $field) :
						// p($field);
					?>
					<dl>
						<dt>
							<a href="<?php echo U('detail',array('gid'=>$field['gid']));?>"><img src="http://localhost/product/ymgshop/<?php echo $field['goods_thumb'];?>" alt="" /></a>
						</dt>
						<dd>
							<p class="title">
								<a href="<?php echo U('detail',array('gid'=>$field['gid']));?>"><?php echo $field['goods_name'];?></a>
							</p>
							<p class="sales">
								<a href="<?php echo U('detail',array('gid'=>$field['gid']));?>">
									<span class="rmb">￥<?php echo $field['goods_price'];?></span>
									<del>￥<?php echo $field['market_price'];?></del>
								</a>
							</p>
						</dd>
					</dl>
					<?php endforeach; ?>
				</div>
			</div>
		<!-- 针织衫产品区域开始 -->
		<!-- 外套产品区域开始 -->
			<div class="zzs">
				<div id="zzs">
					<a href="<?php echo U('lists',array('cid'=>20));?>">
						<img src="http://localhost/product/ymgshop/YMGSHOP/Index/View/Index/image/wt.jpg" alt="" />
					</a>
				</div>
				<div class="proimg">
									<?php 
					$cid=20;
					$row=5;
					//获得所有的栏目数据
					$allcate=M('category')->all();
					// 找到当前栏目的所有子栏目数据
					$allcid=Data::channelList($allcate,$cid);
					//获得当前栏目的子栏目cid
					$allcid = array_keys($allcid);
					//将当前的栏目的cid压入
					$allcid[]=$cid;
					$map['cid']=array('IN',$allcid);
					//获得当前栏目的所有子栏目的商品数据
					$data=M('goods')->where($map)->limit($row)->all();
					foreach ($data as $field) :
						// p($field);
					?>
					<dl>
						<dt>
							<a href="<?php echo U('detail',array('gid'=>$field['gid']));?>"><img src="http://localhost/product/ymgshop/<?php echo $field['goods_thumb'];?>" alt="" /></a>
						</dt>
						<dd>
							<p class="title">
								<a href=""><?php echo $field['goods_name'];?></a>
							</p>
							<p class="sales">
								<a href="<?php echo U('detail',array('gid'=>$field['gid']));?>">
									<span class="rmb">￥<?php echo $field['goods_price'];?></span>
									<del>￥<?php echo $field['market_price'];?></del>
								</a>
							</p>
						</dd>
					</dl>
					<?php endforeach; ?>
				</div>
			</div>
		<!-- 外套产品区域结束 -->
		<!-- 体恤产品区域开始 -->
			<div class="zzs">
				<div id="zzs">
					<a href="<?php echo U('lists',array('cid'=>10));?>"><img src="http://localhost/product/ymgshop/YMGSHOP/Index/View/Index/image/tx.jpg" alt="" /></a>
				</div>
				<div class="proimg">
									<?php 
					$cid=10;
					$row=5;
					//获得所有的栏目数据
					$allcate=M('category')->all();
					// 找到当前栏目的所有子栏目数据
					$allcid=Data::channelList($allcate,$cid);
					//获得当前栏目的子栏目cid
					$allcid = array_keys($allcid);
					//将当前的栏目的cid压入
					$allcid[]=$cid;
					$map['cid']=array('IN',$allcid);
					//获得当前栏目的所有子栏目的商品数据
					$data=M('goods')->where($map)->limit($row)->all();
					foreach ($data as $field) :
						// p($field);
					?>
					<dl>
						<dt>
							<a href="<?php echo U('detail',array('gid'=>$field['gid']));?>"><img src="http://localhost/product/ymgshop/<?php echo $field['goods_thumb'];?>" alt="" /></a>
						</dt>
						<dd>
							<p class="title">
								<a href=""><?php echo $field['goods_name'];?></a>
							</p>
							<p class="sales">
								<a href="<?php echo U('detail',array('gid'=>$field['gid']));?>">
									<span class="rmb">￥<?php echo $field['goods_price'];?></span>
									<del>￥<?php echo $field['market_price'];?></del>
								</a>
							</p>
						</dd>
					</dl>
					<?php endforeach; ?>

				</div>
			</div>
		<!-- 体恤产品区域结束 -->
		<!-- 衬衫产品区域开始 -->
			<div class="zzs">
				<div id="zzs">
					<a href="<?php echo U('lists',array('cid'=>14));?>"><img src="http://localhost/product/ymgshop/YMGSHOP/Index/View/Index/image/cs.jpg" alt="" /></a>
				</div>
				<div class="proimg">
									<?php 
					$cid=14;
					$row=10;
					//获得所有的栏目数据
					$allcate=M('category')->all();
					// 找到当前栏目的所有子栏目数据
					$allcid=Data::channelList($allcate,$cid);
					//获得当前栏目的子栏目cid
					$allcid = array_keys($allcid);
					//将当前的栏目的cid压入
					$allcid[]=$cid;
					$map['cid']=array('IN',$allcid);
					//获得当前栏目的所有子栏目的商品数据
					$data=M('goods')->where($map)->limit($row)->all();
					foreach ($data as $field) :
						// p($field);
					?>
					<dl>
						<dt>
							<a href="<?php echo U('detail',array('gid'=>$field['gid']));?>"target="_brank"> <img src="http://localhost/product/ymgshop/<?php echo $field['goods_img'];?>" alt="" /></a>
						</dt>
						<dd>
							<p class="title">
								<a href="<?php echo U('detail',array('gid'=>$field['gid']));?>" target="_brank"><?php echo $field['goods_name'];?></a>
							</p>
							<p class="sales">
								<a href="<?php echo U('detail',array('gid'=>$field['gid']));?>" target="_brank">
									<span class="rmb">￥<?php echo $field['goods_price'];?></span>
									<del>￥<?php echo $field['market_price'];?></del>
								</a>
							</p>
						</dd>
					</dl>
					<?php endforeach; ?>
				</div>
			</div>
		<!-- 衬衫产品区域结束 -->
		<!-- 连衣裙区域开始 -->
			<div class="zzs">
				<div id="zzs">
					<a href="<?php echo U('lists',array('cid'=>33));?>"><img src="http://localhost/product/ymgshop/YMGSHOP/Index/View/Index/image/lyq.jpg" alt="" /></a>
				</div>
				<div class="proimg">
								<?php 
					$cid=33;
					$row=5;
					//获得所有的栏目数据
					$allcate=M('category')->all();
					// 找到当前栏目的所有子栏目数据
					$allcid=Data::channelList($allcate,$cid);
					//获得当前栏目的子栏目cid
					$allcid = array_keys($allcid);
					//将当前的栏目的cid压入
					$allcid[]=$cid;
					$map['cid']=array('IN',$allcid);
					//获得当前栏目的所有子栏目的商品数据
					$data=M('goods')->where($map)->limit($row)->all();
					foreach ($data as $field) :
						// p($field);
					?>
					<dl>
						<dt>
							<a href="<?php echo U('detail',array('gid'=>$field['gid']));?>"><img src="http://localhost/product/ymgshop/<?php echo $field['goods_thumb'];?>" alt="" /></a>
						</dt>
						<dd>
							<p class="title">
								<a href=""><?php echo $field['goods_name'];?></a>
							</p>
							<p class="sales">
								<a href="<?php echo U('detail',array('gid'=>$field['gid']));?>">
									<span class="rmb">￥<?php echo $field['goods_price'];?></span>
									<del>￥<?php echo $field['market_price'];?></del>
								</a>
							</p>
						</dd>
					</dl>
				<?php endforeach; ?>
				</div>
			</div>
		<!-- 连衣裙区域结束 -->
		<!-- 裤装区域开始 -->
			<div class="zzs">
				<div id="zzs">
					<a href="<?php echo U('lists',array('cid'=>42));?>"><img src="http://localhost/product/ymgshop/YMGSHOP/Index/View/Index/image/kz.jpg" alt="" /></a>
				</div>
				<div class="proimg">
								<?php 
					$cid=42;
					$row=5;
					//获得所有的栏目数据
					$allcate=M('category')->all();
					// 找到当前栏目的所有子栏目数据
					$allcid=Data::channelList($allcate,$cid);
					//获得当前栏目的子栏目cid
					$allcid = array_keys($allcid);
					//将当前的栏目的cid压入
					$allcid[]=$cid;
					$map['cid']=array('IN',$allcid);
					//获得当前栏目的所有子栏目的商品数据
					$data=M('goods')->where($map)->limit($row)->all();
					foreach ($data as $field) :
						// p($field);
					?>
					<dl>
						<dt>
							<a href="<?php echo U('detail',array('gid'=>$field['gid']));?>"><img src="http://localhost/product/ymgshop/<?php echo $field['goods_thumb'];?>" alt="" /></a>
						</dt>
						<dd>
							<p class="title">
								<a href=""><?php echo $field['goods_name'];?></a>
							</p>
							<p class="sales">
								<a href="<?php echo U('detail',array('gid'=>$field['gid']));?>">
									<span class="rmb">￥<?php echo $field['goods_price'];?></span>
									<del>￥<?php echo $field['market_price'];?></del>
								</a>
							</p>
						</dd>
					</dl>
				<?php endforeach; ?>

				</div>
			</div>
		<!-- 裤装区域结束 -->
		</div>
		<!-- 产品区域结束 -->
	</div>
	<!-- big end -->
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
</body>
</html>