<?php if(!defined("HDPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
		<title>操作失败</title>
		<link rel="stylesheet" type="text/css" href="http://localhost/hdphp/hdphp/Lib/Tpl/static/css.css"/>
        <style type="text/css">
            body{background: #f3f3f3;}
        </style>
	</head>
	<body>
		<div class="wrap">
			<div class="title">
				操作失败
			</div>
			<div class="content">
				<div class="icon"></div>
				<div class="message">
					<p>
						<?php echo $message;?>
					</p>
					<a href="javascript:<?php echo $url;?>" class="hd-cancel">
						返回
					</a>
				</div>
			</div>
		</div>
		<script type="text/javascript">
			window.setTimeout("<?php echo $url;?>",<?php echo $time;?>*1000);
		</script>
	</body>
</html>