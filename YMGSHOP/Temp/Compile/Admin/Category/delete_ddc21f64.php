<?php if(!defined("HDPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
		<title>操作成功</title>
		<link rel="stylesheet" type="text/css" href="http://localhost/11/hdphp/hdphp/Lib/Tpl/static/css.css"/>
        <style type="text/css">
            body{background: #f3f3f3;}
        </style>
	</head>
	<body>
		<div class="wrap">
			<div class="title">
				操作成功
			</div>
			<div class="content">
				<div class="icon"></div>
				<div class="message">
					<div style="margin-top:10px;margin-bottom:15px;">
						<?php echo $message;?>
					</div>
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