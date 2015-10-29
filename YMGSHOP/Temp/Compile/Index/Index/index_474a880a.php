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