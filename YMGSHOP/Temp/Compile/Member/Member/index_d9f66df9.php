<?php if(!defined("HDPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
<title>修改个人信息</title>
<link rel="stylesheet" href="http://localhost/ymgshop/YMGSHOP/Member/View/Member/css/userInfo.css" />
<script type="text/javascript" src="http://localhost/ymgshop/YMGSHOP/Member/View/Member/js/jquery.js"></script>
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
URL = 'http://localhost/ymgshop/index.php/Member/Member/index';
APP = 'http://localhost/ymgshop/YMGSHOP';
COMMON = 'http://localhost/ymgshop/YMGSHOP/Common';
HDPHP = 'http://localhost/hdphp/hdphp';
HDPHPDATA = 'http://localhost/hdphp/hdphp/Data';
HDPHPEXTEND = 'http://localhost/hdphp/hdphp/Extend';
MODULE = 'http://localhost/ymgshop/index.php/Member';
CONTROLLER = 'http://localhost/ymgshop/index.php/Member/Member';
ACTION = 'http://localhost/ymgshop/index.php/Member/Member/index';
STATIC = 'http://localhost/ymgshop/Static';
HDPHPTPL = 'http://localhost/hdphp/hdphp/Lib/Tpl';
VIEW = 'http://localhost/ymgshop/YMGSHOP/Member/View';
PUBLIC = 'http://localhost/ymgshop/YMGSHOP/Member/View/Public';
CONTROLLERVIEW = 'http://localhost/ymgshop/YMGSHOP/Member/View/Member';
HISTORY = 'http://localhost/ymgshop/index.php/Member/Index/index';
</script>
<script type="text/javascript" src="http://localhost/ymgshop/YMGSHOP/Member/View/Member/js/userInfo.js"></script>

</head>
<body>

	<div class="h_section_R">
		<div class="txtbox">
			<h2></h2>
			<form action="" method="post" onsubmit="return _userinfo(this)" >
				<div class="txt">
					<h3>修改个人信息</h3>
					<div class="txtsm">
						恭喜您成为优美购会员！请完整填写以下个人信息（<span class="red">*</span> 为必填）
            		</div>
            		<table  class="tleft" width="100%" border="0" cellpadding="0" cellspacing="0">
						<tbody>
							<tr >
								<td width="88" style="width:90px;">
									<span class="red">*</span>  邮箱：
								</td>
								<td colspan="2">
									<input type="text" name="tel" value="<?php echo $data['email'];?>" />
								</td>
							</tr>
							<tr>
								<td>
									<span class="red">*</span> 真实姓名：
								</td>
								<td colspan="2" style="text-align: left">
									<input type="text" name="name" value="<?php echo $data['name'];?>" />
									<label class="error" id="truenameinfo">请输入真实姓名</label>
								</td>
							</tr>
							<tr>
								<td>
									<span class="red">*</span> 省/市/区县：
								</td>
								<td colspan="2" style="text-align: left">
									<select name="province" id="province" onchange="_province(this)">
										<option value="0">请选择省份</option>
										<?php $hd["list"]["d"]["total"]=0;if(isset($province) && !empty($province)):$_id_d=0;$_index_d=0;$lastd=min(1000,count($province));
$hd["list"]["d"]["first"]=true;
$hd["list"]["d"]["last"]=false;
$_total_d=ceil($lastd/1);$hd["list"]["d"]["total"]=$_total_d;
$_data_d = array_slice($province,0,$lastd);
if(count($_data_d)==0):echo "";
else:
foreach($_data_d as $key=>$d):
if(($_id_d)%1==0):$_id_d++;else:$_id_d++;continue;endif;
$hd["list"]["d"]["index"]=++$_index_d;
if($_index_d>=$_total_d):$hd["list"]["d"]["last"]=true;endif;?>

											<option value="<?php echo $d['ProvinceID'];?>" <?php if($d['ProvinceName']==$data['province']){?> selected=""<?php }?>><?php echo $d['ProvinceName'];?></option>
										<?php $hd["list"]["d"]["first"]=false;
endforeach;
endif;
else:
echo "";
endif;?>
									</select>
									<select name="city" id="city" onclick="_city(this)">
										<option value="0">请选择城市</option>
										<?php $hd["list"]["d"]["total"]=0;if(isset($city) && !empty($city)):$_id_d=0;$_index_d=0;$lastd=min(1000,count($city));
$hd["list"]["d"]["first"]=true;
$hd["list"]["d"]["last"]=false;
$_total_d=ceil($lastd/1);$hd["list"]["d"]["total"]=$_total_d;
$_data_d = array_slice($city,0,$lastd);
if(count($_data_d)==0):echo "";
else:
foreach($_data_d as $key=>$d):
if(($_id_d)%1==0):$_id_d++;else:$_id_d++;continue;endif;
$hd["list"]["d"]["index"]=++$_index_d;
if($_index_d>=$_total_d):$hd["list"]["d"]["last"]=true;endif;?>

											<option value="<?php echo $d['CityID'];?>" <?php if($d['CityName']==$data['city']){?> selected=""<?php }?>><?php echo $d['CityName'];?></option>
										<?php $hd["list"]["d"]["first"]=false;
endforeach;
endif;
else:
echo "";
endif;?>
									</select>
									<select name="area" id="district">
										<option value="0">请选择区/县</option>
										<?php $hd["list"]["d"]["total"]=0;if(isset($area) && !empty($area)):$_id_d=0;$_index_d=0;$lastd=min(1000,count($area));
$hd["list"]["d"]["first"]=true;
$hd["list"]["d"]["last"]=false;
$_total_d=ceil($lastd/1);$hd["list"]["d"]["total"]=$_total_d;
$_data_d = array_slice($area,0,$lastd);
if(count($_data_d)==0):echo "";
else:
foreach($_data_d as $key=>$d):
if(($_id_d)%1==0):$_id_d++;else:$_id_d++;continue;endif;
$hd["list"]["d"]["index"]=++$_index_d;
if($_index_d>=$_total_d):$hd["list"]["d"]["last"]=true;endif;?>

											<option value="<?php echo $d['DistrictID'];?>" <?php if($d['DistrictName']==$data['area']){?> selected=""<?php }?>><?php echo $d['DistrictName'];?></option>
										<?php $hd["list"]["d"]["first"]=false;
endforeach;
endif;
else:
echo "";
endif;?>
									</select>

									<label  id="areainfo"></label>
								</td>
							</tr>
							<tr>
								<td>
									<span class="red">*</span> 联系地址：
								</td>
								<td colspan="2" style="text-align: left">
									<input type="text" class="px300" name="addr_content" value="北京市朝阳区小营路5号四方大厦1825" />
									<label  id="addressinfo"></label>
								</td>
							</tr>
							<tr>
								<td>
									<span class="red">*</span>  邮政编码：
								</td>
								<td colspan="2" style="text-align: left">
									<input type="text" name="postcode" id="postcode" value="1232131" />
									<label  id="postcodeinfo"></label>
								</td>
							</tr>
							<tr>
								<td>
									<span class="red">*</span>  手机：
								</td>
								<td colspan="2" style="text-align: left">
									<input type="text" name="phone"  value="15990531230" />
									<label  id="phoneinfo"></label>
								</td>
							</tr>
							<tr>
								<td>
									<span class="red">*</span>  手机：
								</td>
								<td colspan="2" style="text-align: left">
									<input type="text" name="phone"  value="010-132113121" />
									<label  id="telinfo"></label>
								</td>
							</tr>
							<tr>
								<td></td>
								<td colspan="2" style="text-align: left">
									<input type="submit"  value="提交" class="btn" id="savemessage"/>
									
								</td>
							</tr>
						</tbody>
					</table>
				</div>
				
			</form>
		</div>
	</div>
</body>
</html>