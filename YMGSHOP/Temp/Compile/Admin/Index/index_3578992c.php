<?php if(!defined("HDPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
    <title>YMGSHOP后台管理中心</title>
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
URL = 'http://localhost/product/ymgshop/index.php/Admin/Index/index';
APP = 'http://localhost/product/ymgshop/YMGSHOP';
COMMON = 'http://localhost/product/ymgshop/YMGSHOP/Common';
HDPHP = 'http://localhost/product/hdphp/hdphp';
HDPHPDATA = 'http://localhost/product/hdphp/hdphp/Data';
HDPHPEXTEND = 'http://localhost/product/hdphp/hdphp/Extend';
MODULE = 'http://localhost/product/ymgshop/index.php/Admin';
CONTROLLER = 'http://localhost/product/ymgshop/index.php/Admin/Index';
ACTION = 'http://localhost/product/ymgshop/index.php/Admin/Index/index';
STATIC = 'http://localhost/product/ymgshop/Static';
HDPHPTPL = 'http://localhost/product/hdphp/hdphp/Lib/Tpl';
VIEW = 'http://localhost/product/ymgshop/YMGSHOP/Admin/View';
PUBLIC = 'http://localhost/product/ymgshop/YMGSHOP/Admin/View/Public';
CONTROLLERVIEW = 'http://localhost/product/ymgshop/YMGSHOP/Admin/View/Index';
HISTORY = 'http://localhost/product/ymgshop/index.php/Admin/Login/index';
</script>
    <script type="text/javascript">
        $(function(){
            //*********左侧导航效果*************
            $('.left_menu a').click(function(){
                //去掉所有
                $('.left_menu a').removeClass('action');
                //当前添加
                $(this).addClass('action');
            });

            $('.left_menu dt').toggle(function() {
                $(this).nextAll('dd').show(500);
            },function(){
                $(this).nextAll('dd').hide(500);
            });

        })
    </script>
    <link rel="stylesheet" type="text/css" href="http://localhost/product/ymgshop/YMGSHOP/Admin/View/Index/css/css.css">
    <link rel="stylesheet" type="text/css" href="http://localhost/product/ymgshop/YMGSHOP/Admin/View/Index/css/quick_menu.css">
    <base target="iframe"/>
</head>
<body>
<div class="nav">
    <!--头部左侧导航-->
    <!-- <div class="top_menu"></div> -->
    <!--头部左侧导航-->
    <!--头部右侧导航-->
    <div class="r_menu">
        <i class="iconfont">&#xf017c;</i>
         <a href="<?php echo U(('Login/out'));?>" target="_self">[退出]</a><span>|</span>
         <span><i class="iconfont" style="margin-right:5px">&#xf00ec;</i>管理员</span>
         <span style="color:#c40000;"><?php echo $_SESSION['adminname'];?></span>
        <span>|</span>
        <i class="iconfont">&#xf012b;</i>
        <a href="http://localhost/product/ymgshop/index.php" target="_blank">前台首页</a>
    </div>
    <!--头部右侧导航-->    
</div>
<!--左侧导航-->
<div class="main">
    <!--主体左侧导航-->
    <div class="left_menu" style="overflow-y:auto;">
        <div class="nid_0">
            <dl>
                <div>
                    <dt><i class="iconfont" style="margin-right:10px">&#xf00e1;</i>类型管理</dt>
                    <dd>
                        <a href="<?php echo U(('GoodsType/index'));?>">商品类型列表</a>
                    </dd>
                    <dd>
                        <a href="<?php echo U(('GoodsType/add'));?>" <?php if(METHOD == 'add'){?>class="action"<?php }?>>添加分类</a>
                    </dd>
                </div>
                <div>
                <div>
                    <dt><i class="iconfont" style="margin-right:10px">&#xf0161;</i>栏目管理</dt>
                    <dd>
                        <a href="<?php echo U(('Category/index'));?>">栏目列表</a>
                    </dd>
                    <dd>
                        <a href="<?php echo U(('Category/add'));?>">添加栏目</a>
                    </dd>
                 </div>
                    <dt><i class="iconfont" style="margin-right:10px">&#xf0046;</i>品牌管理</dt>
                    <dd>
                        <a href="<?php echo U(('Brand/index'));?>">品牌列表</a>
                    </dd>
                    <dd>
                        <a href="<?php echo U(('Brand/add'));?>">添加品牌</a>
                    </dd>
                    
                </div>
            
                <div>
                    <dt><i class="iconfont" style="margin-right:10px">&#xf0144;</i>商品中心</dt>
                     <dd>
                        <a href="<?php echo U('Goods/index');?>">商品列表</a>
                    </dd>
                    <dd>
                        <a href="<?php echo U('Goods/add');?>">添加商品</a>
                    </dd>
                </div>
                <div>
                    <dt><i class="iconfont" style="margin-right:10px">&#xf013f;</i>回收站</dt>
                     <dd>
                        <a href="<?php echo U('Recycle/index');?>">回收列表</a>
                    </dd>
                    
                </div>
                <div>
                     <dt><i class="iconfont" style="margin-right:10px">&#xf010d;</i>站点配置</dt>
                     <dd>
                        <a href="<?php echo U('WebSet/index');?>">站点配置</a>
                    </dd>
                </div>
                <div>
                    <dt><i class="iconfont" style="margin-right:10px">&#xf0130;</i>数据备份</dt>
                     <dd>
                        <a href="<?php echo U('BackUp/backList');?>">备份列表</a>
                    </dd>
                    <dd>
                        <a href="<?php echo U('BackUp/index');?>">数据备份</a>
                    </dd>
                </div>
                <div>
                    <dt><i class="iconfont" style="margin-right:10px">&#xf0148;</i>订单管理</dt>
                     <dd>
                        <a href="<?php echo U('Order/index');?>">订单列表</a>
                        <a href="<?php echo U('Order/solve');?>">已付款订单</a>
                        <a href="<?php echo U('Order/cancel');?>">已取消订单</a>
                    </dd>
                </div>
                <div>
                    <dt><i class="iconfont" style="margin-right:10px">&#xf0105;</i>评论管理</dt>
                     <dd>
                        <a href="<?php echo U('Comment/index');?>">评论列表</a>
                    </dd>
                </div>
                <div>
                    <dt><i class="iconfont" style="margin-right:10px">&#xf00ec;</i>用户管理</dt>
                     <dd>
                        <a href="<?php echo U('User/index');?>">前台用户</a>
                        <a href="<?php echo U('Role/index');?>">角色分配</a>
                        <a href="<?php echo U('User/admin_index');?>">后台用户</a>
                    </dd>
                </div>
                <div>
                    <dt><i class="iconfont" style="margin-right:10px">&#xf013e;</i>支付宝设置</dt>
                     <dd>
                        <a href="<?php echo U('Alipay/index');?>">支付宝设置</a>
                        <!-- <a href="<?php echo U('Role/index');?>">角色分配</a>
                        <a href="<?php echo U('User/admin_index');?>">后台用户</a> -->
                    </dd>
                </div>
               <!--  <div>
                     <dt><i class="iconfont" style="margin-right:10px">&#xf01ae;</i>友情链接</dt>
                     <dd>
                        <a href="<?php echo U('FirendLink/index');?>">导航列表</a>
                        <a href="<?php echo U('FirendLink/add');?>">添加导航</a>
                    </dd>
                </div> -->
             </dl>
        </div>
    </div>
    <!--主体左侧导航-->
    <!--内容显示区域-->

    <div class="top_content">
        <iframe src="<?php echo U(('Index/welcome'));?>" scrolling="auto" frameborder="0" style="height:100%;width:100%;" name="iframe"></iframe>
    </div>
    <!--内容显示区域-->
</div>

</body>
</html>