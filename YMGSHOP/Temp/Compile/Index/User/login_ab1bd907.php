<?php if(!defined("HDPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
<title>优美购登录</title>
<script type='text/javascript' src='http://www.youmeigou.com/D:/wamp/www/hdphp/hdphp/Extend/Org/Jquery/jquery-1.8.2.min.js'></script>
<link href='http://www.youmeigou.com/D:/wamp/www/hdphp/hdphp/Extend/Org/hdjs/hdui/css/hdui.css' rel='stylesheet' media='screen'>
<script src='http://www.youmeigou.com/D:/wamp/www/hdphp/hdphp/Extend/Org/hdjs/hdui/js/hdui.js'></script>
<link href='http://www.youmeigou.com/D:/wamp/www/hdphp/hdphp/Extend/Org/hdjs/hdvalidate/css/hdvalidate.css' rel='stylesheet' media='screen'>
<script src='http://www.youmeigou.com/D:/wamp/www/hdphp/hdphp/Extend/Org/hdjs/hdvalidate/js/hdvalidate.js'></script>
<script src='http://www.youmeigou.com/D:/wamp/www/hdphp/hdphp/Extend/Org/cal/lhgcalendar.min.js'></script>
<script src='http://www.youmeigou.com/D:/wamp/www/hdphp/hdphp/Extend/Org/hdjs/hdslide/js/hdslide.js'></script>
<script type='text/javascript'>
HOST = 'http://www.youmeigou.com';
ROOT = 'http://www.youmeigou.com';
WEB = 'http://www.youmeigou.com/index.php';
URL = 'http://www.youmeigou.com/index.php/Index/User/login';
APP = 'http://www.youmeigou.com/YMGSHOP';
COMMON = 'http://www.youmeigou.com/YMGSHOP/Common';
HDPHP = 'http://www.youmeigou.com/D:/wamp/www/hdphp/hdphp';
HDPHPDATA = 'http://www.youmeigou.com/D:/wamp/www/hdphp/hdphp/Data';
HDPHPEXTEND = 'http://www.youmeigou.com/D:/wamp/www/hdphp/hdphp/Extend';
MODULE = 'http://www.youmeigou.com/index.php/Index';
CONTROLLER = 'http://www.youmeigou.com/index.php/Index/User';
ACTION = 'http://www.youmeigou.com/index.php/Index/User/login';
STATIC = 'http://www.youmeigou.com/Static';
HDPHPTPL = 'http://www.youmeigou.com/D:/wamp/www/hdphp/hdphp/Lib/Tpl';
VIEW = 'http://www.youmeigou.com/YMGSHOP/Index/View';
PUBLIC = 'http://www.youmeigou.com/YMGSHOP/Index/View/Public';
CONTROLLERVIEW = 'http://www.youmeigou.com/YMGSHOP/Index/View/User';
HISTORY = 'http://www.youmeigou.com/index.php/Index/Index/detail/gid/3';
</script>
<link rel="stylesheet" href="http://www.youmeigou.com/YMGSHOP/Index/View/User/css/login.css" />
<script type="text/javascript" src="http://www.youmeigou.com/YMGSHOP/Index/View/User/js/register.js"></script>
</head>
<body>
	<!-- logo area -->
	<div class="head">
		<a href=""><img src="http://www.youmeigou.com/YMGSHOP/Index/View/User/image/logo.png" alt=""  /></a>
	</div>
	<!-- logo area -->
	<!-- login info start-->
	<div class="main">
		<div class="user_frame">
			<h2 class="title"> <img src="http://www.youmeigou.com/YMGSHOP/Index/View/User/image/login.jpg" alt="" /></h2>
			<div class="login_info">
				<div class="user_info">
					<form action="" method="post" name="login" class="hd-form">
						<div class="userinfo_input">
							<label class="i_label">邮箱:</label>
							<input type="text" class="i_text" name="email" placeholder="输入用户邮箱" />
						</div>
						<div class="userinfo_input">
							<label class="i_label">登录密码:</label>
							<input type="password" class="i_text" name="password" placeholder="输入用户密码"/>
						</div>
						<div class="userinfo_input">
							<label class="i_label">验证码:</label>
							<input type="text" class="i_text_code" name="code" placeholder="验证码"/>
							<span class="code_img">
								<img src="<?php echo U('User/code');?>" alt="" class="checkCode" />
								<span id="click_code" >看不清,换一张</span>
							</span>
						</div>
						<div class="userinfo_input">
							<label class="i_label"></label>
							<input type="submit" class="i_btn_ok" value="登录" class="i_btn_ok"  />
							<label class="i_forget_psw">忘记密码?</label>
						</div>
					</form>
				</div>
				<div class="user_info_right">
					<b>还不是优美购会员？</b>
					<a href="<?php echo U('User/register');?>" class="rsg">注册新用户</a>
				</div>
			</div>
			<div class="bian"></div>
		</div>
	</div>
	<!-- login info end -->
	<!-- foot start -->
	<div class="foot">
		<div class="footer">
			<p>首页 公司简介 网站地图 诚聘英才 零售店址 优美购网加盟 网店代理 友情链接 评论 图片 优美购俱乐部</p><br />
			<p>Copyright © 2010-2019 优美购官方网站, All Rights Reserved 京B2-20080069号 </p>
		</div>
	</div>
	<!-- foot end -->
</body>
</html>