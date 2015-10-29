<?php if(!defined("HDPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><!-- @author 李勇 626375290@qq.com -->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
<script type='text/javascript' src='http://localhost/hdphp/hdphp/Extend/Org/Jquery/jquery-1.8.2.min.js'></script>
<link href='http://localhost/hdphp/hdphp/Extend/Org/hdjs/hdui/css/hdui.css' rel='stylesheet' media='screen'>
<script src='http://localhost/hdphp/hdphp/Extend/Org/hdjs/hdui/js/hdui.js'></script>
<link href='http://localhost/hdphp/hdphp/Extend/Org/hdjs/hdvalidate/css/hdvalidate.css' rel='stylesheet' media='screen'>
<script src='http://localhost/hdphp/hdphp/Extend/Org/hdjs/hdvalidate/js/hdvalidate.js'></script>
<script src='http://localhost/hdphp/hdphp/Extend/Org/cal/lhgcalendar.min.js'></script>
<script src='http://localhost/hdphp/hdphp/Extend/Org/hdjs/hdslide/js/hdslide.js'></script>
<script type='text/javascript'>
HOST = 'http://localhost';
ROOT = 'http://localhost/ymgshop';
WEB = 'http://localhost/ymgshop/index.php';
URL = 'http://localhost/ymgshop/index.php/Admin/Brand/add';
APP = 'http://localhost/ymgshop/YMGSHOP';
COMMON = 'http://localhost/ymgshop/YMGSHOP/Common';
HDPHP = 'http://localhost/hdphp/hdphp';
HDPHPDATA = 'http://localhost/hdphp/hdphp/Data';
HDPHPEXTEND = 'http://localhost/hdphp/hdphp/Extend';
MODULE = 'http://localhost/ymgshop/index.php/Admin';
CONTROLLER = 'http://localhost/ymgshop/index.php/Admin/Brand';
ACTION = 'http://localhost/ymgshop/index.php/Admin/Brand/add';
STATIC = 'http://localhost/ymgshop/Static';
HDPHPTPL = 'http://localhost/hdphp/hdphp/Lib/Tpl';
VIEW = 'http://localhost/ymgshop/YMGSHOP/Admin/View';
PUBLIC = 'http://localhost/ymgshop/YMGSHOP/Admin/View/Public';
CONTROLLERVIEW = 'http://localhost/ymgshop/YMGSHOP/Admin/View/Brand';
HISTORY = 'http://localhost/ymgshop/index.php/Admin/Index/index';
</script>
<title>添加商品品牌</title>
</head>
<body>
	<div class="warp">
	<div class="menu_list ">
		<ul>
			<li ><a href="<?php echo U('index');?>" class="action">商品品牌列表</a></li>
			<li><a href="<?php echo U('add');?>">添加商品品牌</a></li>
		</ul>
	</div>
		<div class="title-header">添加商品品牌</div>
		<form  method="post">
			<table class="table2 hd-form">
				<tr>
					<th class="w100">商品品牌名称</th>
					<td>
						<input type="text" class="w200"  name="brand_name" />
					</td>
				</tr>
				<tr>
					<th class="w100">商品品牌LOGO</th>
					<td>
						<link rel="stylesheet" type="text/css" href="http://localhost/hdphp/hdphp/Extend/Org/Uploadify/uploadify.css" />
            <script type="text/javascript" src="http://localhost/hdphp/hdphp/Extend/Org/Uploadify/jquery.uploadify.min.js"></script>
            <script type="text/javascript">
            var HDPHP_CONTROL         = "http://localhost/ymgshop/index.php?m=Admin&c=Brand&a=hd_uploadify";
            var UPLOADIFY_URL    = "http://localhost/hdphp/hdphp/Extend/Org/Uploadify/";
            var HDPHP_UPLOAD_THUMB    ="";
HDPHP_UPLOAD_TOTAL = 0</script>
            <script type="text/javascript" src="http://localhost/hdphp/hdphp/Extend/Org/Uploadify/hd_uploadify.js"></script>
<script type="text/javascript">
    $(function() {
        hd_uploadify_options.removeTimeout  =0;//提示框消息时间
        hd_uploadify_options.fileSizeLimit  ="2MB";
        hd_uploadify_options.fileTypeExts   ="*.gif;*.jpg;*.png;*.jpeg";
        hd_uploadify_options.showalt        =0;
        hd_uploadify_options.uploadLimit    =1;
        hd_uploadify_options.input_type    ="input";
        hd_uploadify_options.elem_id    ="";
        hd_uploadify_options.success_msg    ="正在上传...";//上传成功提示文字
        hd_uploadify_options.formData ={type:"*.gif;*.jpg;*.png;*.jpeg",water : "0",fileSizeLimit:2097152, someOtherKey:1,PHPSESSID:"3u1iqc88aku735b7mn6a7c3ij7",upload_dir:"",hdphp_upload_thumb:""};
        hd_uploadify_options.thumb_width =200;
        hd_uploadify_options.thumb_height          =150;
        hd_uploadify_options.uploadsSuccessNums = 0;
        $("#hd_uploadify_brand_logo").uploadify(hd_uploadify_options);
        });
</script>
<input type="file" name="up" id="hd_uploadify_brand_logo"/><div class="hd_uploadify_brand_logo_msg num_upload_msg"><span></span>单文件最大<strong>2MB，允许上传类型*.gif;*.jpg;*.png;*.jpeg</strong></div><div id="hd_uploadify_brand_logo_queue"></div>
        <div class="hd_uploadify_brand_logo_files uploadify_upload_files" input_file_id ="hd_uploadify_brand_logo">
            <ul></ul>
            <div style="clear:both;"></div>
        </div>
					</td>
				</tr>
				<tr>
					<th class="w100">品牌排序</th>
					<td>
						<input type="text" class="w200"  name="brand_order" value="1" />
					</td>
				</tr>
				<tr>
					<th></th>
					<td><input type="submit" value="添加" class="hd-success" /></td>
				</tr>
			</table>
			
		</form>
	</div>
</body>
</html>