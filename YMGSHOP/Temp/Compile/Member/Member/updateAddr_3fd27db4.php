<?php if(!defined("HDPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
<title>修改收货地址</title>
<link rel="stylesheet" href="http://localhost/ymgshop/YMGSHOP/Member/View/Member/css/editAddr.css" />
</head>
<body>
	<div class="h_section_R">
		<div class="ucright_modef">
			<div class="functioninfo">
				<h3>修改收货地址</h3>
			</div>
			<div class="ucright_modef_con">
				<div class="modef_addr1">
					<p class="font_g2">本次更改将不会影响您正在处理的订单。</p>
				</div>
				<div class="modef_addr2">
					<table class="datalist" cellpadding="0" cellspacing="0">
						<thead>
							<th>收货人 </th>
							<th>地址 </th>
							<th>电话/手机 </th>
							<th>邮编 </th>
							<th>操作 </th>
						</thead>
						<tbody>
							<td>李勇</td>
							<td>北京市 北京市 朝阳区 北京市朝阳区小营路5号四方大厦1825 </td>
							<td>15990531230</td>
							<td>100011</td>
							<td>
								<input type="radio" name="defaultaddress" checked="" />  设为默认配送地址
								<input type="submit" value="修改" class="btn" onclick="<?php echo U('Index');?>" />
								<input type="submit" value="删除" class="btn" />
							</td>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</body>
</html>