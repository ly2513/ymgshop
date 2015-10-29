<?php if(!defined("HDPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
<title>添加商品</title>
</head>
<body>
	<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>添加商品</title>
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
URL = 'http://localhost/ymgshop/index.php/Admin/Goods/add';
APP = 'http://localhost/ymgshop/YMGSHOP';
COMMON = 'http://localhost/ymgshop/YMGSHOP/Common';
HDPHP = 'http://localhost/hdphp/hdphp';
HDPHPDATA = 'http://localhost/hdphp/hdphp/Data';
HDPHPEXTEND = 'http://localhost/hdphp/hdphp/Extend';
MODULE = 'http://localhost/ymgshop/index.php/Admin';
CONTROLLER = 'http://localhost/ymgshop/index.php/Admin/Goods';
ACTION = 'http://localhost/ymgshop/index.php/Admin/Goods/add';
STATIC = 'http://localhost/ymgshop/Static';
HDPHPTPL = 'http://localhost/hdphp/hdphp/Lib/Tpl';
VIEW = 'http://localhost/ymgshop/YMGSHOP/Admin/View';
PUBLIC = 'http://localhost/ymgshop/YMGSHOP/Admin/View/Public';
CONTROLLERVIEW = 'http://localhost/ymgshop/YMGSHOP/Admin/View/Goods';
HISTORY = 'http://localhost/ymgshop/index.php/Admin/Index/index';
</script>

<link rel="stylesheet" href="http://localhost/ymgshop/YMGSHOP/Admin/View/Goods/Css/add.css" />
</head>
<body>
	<form action="" method='post' enctype='multipart/form-data'>
	<div class="warp">
		<div class="menu_list">
			<ul>
				<li><a href="<?php echo U('index');?>">商品列表</a></li>
				<li><a href="<?php echo U('add');?>">添加商品</a></li>
			</ul>
		</div>
	</div>
	<div class="tab">
	    <ul class="tab_menu">
	        <li lab="base">
	            <a> 基本设置 </a>
	        </li>
	        <li lab="other" class="action">
	            <a>其他</a>
	        </li>
	        <li lab="content">
	            <a>详情 </a>
	        </li>
	        <li lab="image">
	            <a>图片列表 </a>
	        </li>
	         <li lab="attribute">
	            <a>商品属性</a>
	        </li>
	    </ul>
    	<div class="tab_content  hd-form">
        	<div id="base">
	            <table class="table1">
	                <tr>
	                    <th class='w100'>商品名称</th>
	                    <td>
	                        <input type="text" name="goods_name" class='w200'/>
	                    </td>
	                </tr>
	                <tr>
	                	<th>栏目</th>
	                	<td>
	                		<select name="cid">
	                			<option value="0">==选择栏目==</option>
	                			<?php $hd["list"]["c"]["total"]=0;if(isset($category) && !empty($category)):$_id_c=0;$_index_c=0;$lastc=min(1000,count($category));
$hd["list"]["c"]["first"]=true;
$hd["list"]["c"]["last"]=false;
$_total_c=ceil($lastc/1);$hd["list"]["c"]["total"]=$_total_c;
$_data_c = array_slice($category,0,$lastc);
if(count($_data_c)==0):echo "";
else:
foreach($_data_c as $key=>$c):
if(($_id_c)%1==0):$_id_c++;else:$_id_c++;continue;endif;
$hd["list"]["c"]["index"]=++$_index_c;
if($_index_c>=$_total_c):$hd["list"]["c"]["last"]=true;endif;?>

	                				<option value="<?php echo $c['cid'];?>"><?php echo $c['_name'];?></option>
	                			<?php $hd["list"]["c"]["first"]=false;
endforeach;
endif;
else:
echo "";
endif;?>
	                		</select>
	                	</td>
	                </tr>
	                <tr>
	                    <th>商品货号</th>
	                    <td>
	                        <input type="text" name="goods_sn" class='w200'/>
	                    </td>
	                </tr>
	                <tr>
	                    <th>属性</th>
	                    <td>
	                        <label><input type="checkbox" name="is_hot" value="1"/> 热门</label>
	                        <label><input type="checkbox" name="is_new" value="1"/> 新品</label>
	                        <label><input type="checkbox" name="is_best" value="1"/> 精品</label>
	                    </td>
	                </tr>
	                <tr>
	                	<th>图片</th>
	                	<td>
	                		<input type="file" name='original_img'/>
	                	</td>
	                </tr>
	                <tr>
	                    <th>状态</th>
	                    <td>
	                        <label><input type="radio" name="is_on_sale" value='1' checked=""/> 上架</label>
	                        <label><input type="radio" name="is_on_sale" value='0'/> 下架</label>
	                    </td>
	                </tr>
	                 <tr>
	                    <th>商城价</th>
	                    <td>
	                        <input type="text" name="goods_price" class='w200'/>
	                    </td>
	                </tr>
	                 <tr>
	                    <th>市场价</th>
	                    <td>
	                        <input type="text" name="market_price" class='w200'/>
	                    </td>
	                </tr>
	            </table>
        	</div>
        	<div id="other">
           		<table class='table1'>
	           		<tr>
	           			<th class='w100'>重量</th>
	           			<td>
	           				<input type="text" name='goods_weight' class='w200'>
	           				<select name="weight_unit">
	           					<option value="千克">千克</option>
	           					<option value="克">克</option>
	           					<option value="市斤">市斤</option>
	           				</select>
	           			</td>
	           		</tr>
	           		<tr>
	           			<th class='w100'>上架时间</th>
	           			<td>
	           				<input type="text" readonly="readonly" id="sale_time" name="sale_time" value="<?php echo date('Y/m/d h:i:s');?>" class="w150"/>
						<script>
							$('#sale_time').calendar({format: 'yyyy/MM/dd HH:mm:ss'});
						 </script>
	           			</td>
	           		</tr>
	           		<tr>
	           			<th>品牌</th>
	           			<td>
	           				<select name="brand_id">
	           					<?php $hd["list"]["b"]["total"]=0;if(isset($brand) && !empty($brand)):$_id_b=0;$_index_b=0;$lastb=min(1000,count($brand));
$hd["list"]["b"]["first"]=true;
$hd["list"]["b"]["last"]=false;
$_total_b=ceil($lastb/1);$hd["list"]["b"]["total"]=$_total_b;
$_data_b = array_slice($brand,0,$lastb);
if(count($_data_b)==0):echo "";
else:
foreach($_data_b as $key=>$b):
if(($_id_b)%1==0):$_id_b++;else:$_id_b++;continue;endif;
$hd["list"]["b"]["index"]=++$_index_b;
if($_index_b>=$_total_b):$hd["list"]["b"]["last"]=true;endif;?>

								<option value="<?php echo $b['bid'];?>"><?php echo $b['brand_name'];?></option>
	           					<?php $hd["list"]["b"]["first"]=false;
endforeach;
endif;
else:
echo "";
endif;?>
	           				</select>
	           			</td>
	           		</tr>
	           		<tr>
	           			<th>商品数量</th>
	           			<td>
	           				<input type="text" name='goods_number' class='w200'>
	           			</td>
	           		</tr>
	           		<tr>
	           			<th>查看</th>
	           			<td>
	           				<input type="text" name='goods_click' class='w200'> 次
	           			</td>
	           		</tr>
           		</table>
        	</div>
        	<div id='content'>
	        	<table class='table1'>
	        		<tr>
	        			<th class='w100'>关键字</th>
	        			<td>
	        				<input type="text" name='goods_key' class='w200'>
	        			</td>
	        		</tr>
	        		<tr>
	        			<th>描述</th>
	        			<td>
	        				<textarea name="goods_desc" class='w200 h100'></textarea>
	        			</td>
	        		</tr>
	        		<tr>
	        			<th>详情</th>
	        			<td>
	        				<script type="text/javascript" charset="utf-8" src="http://localhost/hdphp/hdphp/Extend/Org/Ueditor/ueditor.config.js"></script><script type="text/javascript" charset="utf-8" src="http://localhost/hdphp/hdphp/Extend/Org/Ueditor/ueditor.all.min.js"></script><script type="text/javascript">UEDITOR_HOME_URL="http://localhost/hdphp/hdphp/Extend/Org/Ueditor/"</script><script id="hd_goods_body" name="goods_body" type="text/plain"></script>
        <script type='text/javascript'>
        $(function(){
                var ue = UE.getEditor('hd_goods_body',{
                serverUrl:'http://localhost/ymgshop/index.php?m=Admin&c=Goods&a=ueditor_upload&water='//图片上传脚本
                ,zIndex : 1000
                ,initialFrameWidth:"100%" //宽度1000
                ,catchRemoteImageEnable:false//关闭远程图片自动保存到本地
                ,initialFrameHeight:"300" //宽度1000
                ,imagePath:''//图片修正地址
                ,autoHeightEnabled:false //是否自动长高,默认true
                ,autoFloatEnabled:false //是否保持toolbar的位置不动,默认true
                ,toolbars:[
            ['fullscreen', 'source', '|', 'undo', 'redo', '|',
            'bold', 'italic', 'underline', 'fontborder', 'strikethrough', 'removeformat', 'formatmatch', 'autotypeset',
            '|', 'forecolor', 'backcolor', 'insertorderedlist', 'insertunorderedlist', '|',
            'lineheight', '|','paragraph', 'fontfamily', 'fontsize', '|',
             'indent','justifyleft', 'justifycenter', 'justifyright', 'justifyjustify', '|',
            'link', 'unlink', '|', 'imagenone', 'imageleft', 'imageright', 'imagecenter', '|',
            'insertimage', 'emotion',   'map',  'insertcode',  'pagebreak','horizontal', '|',
            'inserttable', 'deletetable', 'insertparagraphbeforetable', 'insertrow',  'insertcol',  'mergecells', 'mergeright', 'mergedown', 'splittocells', 'splittorows', 'splittocols']
            ]//工具按钮
                ,enableAutoSave: false//关闭自动保存
                ,initialStyle:'p{line-height:1em; font-size: 14px; }'
            });
        })
        </script>
	        			</td>
	        		</tr>
	        	</table>
        	</div>
	        <div id='image'>
	        	<table class='table1'>
	        		<tr>
	        			<th class='w100'>详情页图片</th>
	        			<td>
	        				<ul id="img_list">
	        					<li>
	        						<a href="javascript:add();"   ><i class="iconfont ">&#xf0175;</i></a>
    								<input type="file" name='img_original[]' class='w100'>
    							</li>
	        				</ul>
	        			</td>
	        		</tr>
	        	</table>
	        </div>
	        <div id='attribute'>
	        	<table class='table1'>
	        		<tr>
	        			<th class='w100'>商品类型</th>
	        			<td>
	        				<select name="cat_id" id="cat_id" onchange="getAttr()">
	        					<option value="0">==请选择商品类型==</option>
	        					<?php $hd["list"]["gt"]["total"]=0;if(isset($goodstype) && !empty($goodstype)):$_id_gt=0;$_index_gt=0;$lastgt=min(1000,count($goodstype));
$hd["list"]["gt"]["first"]=true;
$hd["list"]["gt"]["last"]=false;
$_total_gt=ceil($lastgt/1);$hd["list"]["gt"]["total"]=$_total_gt;
$_data_gt = array_slice($goodstype,0,$lastgt);
if(count($_data_gt)==0):echo "";
else:
foreach($_data_gt as $key=>$gt):
if(($_id_gt)%1==0):$_id_gt++;else:$_id_gt++;continue;endif;
$hd["list"]["gt"]["index"]=++$_index_gt;
if($_index_gt>=$_total_gt):$hd["list"]["gt"]["last"]=true;endif;?>

								<option value="<?php echo $gt['cat_id'];?>"><?php echo $gt['cat_name'];?></option>
	        					<?php $hd["list"]["gt"]["first"]=false;
endforeach;
endif;
else:
echo "";
endif;?>
	        				</select>
	        			</td>
	        		</tr>
	        		<tr>
	        			<th>属性</th>
	        			<td>
	        				<div id="attr">
	        					
	        				</div>
	        			</td>
	        		</tr>
	        	</table>
	        </div>
    	</div>
	</div>
	<div class="position-bottom" style="width:58px;border:1px solid #AAAAAA ">
		<input type="submit" value='添加' class='hd-success ' >
	</div>
</form>
<script type="text/javascript" src="http://localhost/ymgshop/YMGSHOP/Admin/View/Goods/Js/add.js"></script>

</body>
</html>