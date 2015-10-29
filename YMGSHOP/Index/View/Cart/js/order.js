/**
 * 异步加载城市数据
 * @return {[type]} [description]
 */

function _province(obj){
		//获得省份id
		var id=$(obj).val();
		var html='';
		$.ajax({
			url: CONTROLLER+'&a=city',
			type: 'POST',
			dataType: 'json',
			data: {ProvinceID: id},
			success: function(json){
				for (var i = 0; i<json.length; i++) {
					html+="<option value="+json[i]['CityID']+">"+json[i]['CityName']+"</option>";
				};
				$("select[name='city']").html(html);
				
			}
		})
	
};
	/**
	 * 异步加载城市数据
	 * @return {[type]} [description]
	 */
function _city(obj){
		//获得城市id
		var id=$(obj).val();
		var html='';
		$.ajax({
			url: CONTROLLER+'&a=area',
			type: 'POST',
			dataType: 'json',
			data: {CityID: id},
			success: function(json){
				for (var i = 0; i<json.length; i++) {
					html+="<option value="+json[i]['DistrictID']+">"+json[i]['DistrictName']+"</option>";
				};
				$("select[name='area']").html(html);
			}
		})
};

$(function(){
	/**
	 * 修改支付方式
	 * @return {[type]} [description]
	 */
	$("a#edit_pay").click(function() {
		// alert(1);
		$('div#J_pay_defualt').hide();
		//取消修改显示
		$("a#cancel_pay").show();
		//修改隐藏
		$(this).hide();	
		//
		// $("div.zffs2").animate({height:'271px'}, 600);
		$("div.zffs2").slideDown('600', function() {
			$(this).css({height:'292px'});
		});;
	});
	//取消修改支付方式
	$("a#cancel_pay").click(function() {
		//取消修改隐藏
		$(this).hide();
		//修改显示
		$("a#edit_pay").show();
		//显示默认的支付方式
		$('div#J_pay_defualt').show();
		$("div.zffs2").slideUp('600',function(){
		});
		
	});
// 点击确定支付方式和配送方式
	$("a.area_btn").click(function() {
		var payway=$("input[name='radio_PayType']").val();
		//显示默认的支付方式
		$('div#J_pay_defualt').show();
		$("div.zffs2").slideUp('600',function(){
		});
		//修改显示
		$("a#edit_pay").show();
		//取消修改显示
		$("a#cancel_pay").hide();
		
	});

})

// function payway(obj){

// 	alert(1);
// 	// $("form[name='payway']").
// 	var payways=$("input[name='radio_PayType']").val();
// 		alert(payways);
// 		//显示默认的支付方式
// 		$('div#J_pay_defualt').show();
// 		$("div.zffs2").slideUp('600',function(){
// 		});
// 		//修改显示
// 		$("a#edit_pay").show();
// 		//取消修改显示
// 		$("a#cancel_pay").hide();
// }


/**
 * 录入用户收货信息
 * @return {[type]} [description]
 */
function add_info(obj){
	var name=$("input[name='name']").val();
	var uid=$("input[name='uid']").val();
	var province=$("select[name='province']").val();
	var city=$("select[name='city']").val();
	var area=$("select[name='area']").val();
	var addr_content=$("input[name='addr_content']").val();
	var postcode=$("input[name='postcode']").val();
	var email=$("input[name='email']").val();
	var phone=$("input[name='phone']").val();
	var tel=$("input[name='tel']").val();
	$.ajax({
		url: CONTROLLER+'&a=userInfo',
		type: 'POST',
		dataType: 'json',
		data: {name: name,province:province,city:city,area:area,addr_content:addr_content,postcode:postcode,email:email,phone:phone,tel:tel,uid:uid},
		success:function (json){
			if(json==1){
				alert("添加地址成功");
				location.reload();
			}else{
				alert("添加地址失败");
			}
		}
	})
	return false;
}

// 修改地址
$(function(){
	$("a#edit_addr").click(function() {
		$(".dizhi dl.j_dl1").hide();
		$(".dizhi div.addAddr").show();
		$("a#edit_addr_quxiao").show();
		$(this).hide();

	});
	// 取消修改地址
	$("a#edit_addr_quxiao").click(function() {
		$(".dizhi dl.j_dl1").show();
		$(".dizhi div.addAddr").hide();
		$("a#edit_addr").show();
		$(this).hide();
		$("div.adduseraddr").hide();
		$("div.edituseraddr").hide();
	});

})
// 点击修改，弹出用户信息
function edit_xg(obj,addr_id){
	$("div.edituseraddr").show();
	$.ajax({
		url: CONTROLLER+'&a=edit_addr',
		type: 'POST',
		dataType: 'json',
		data: {addr_id: addr_id},
		success:function (json){
			$('div.edituseraddr').append('<form method="post" onsubmit="return edit_addr(this)"><input type="hidden" value="'+json.addr_id+'" name="addr_id"/><input type="hidden" value="'+json.uid+'" name="uid"/><div class="addr"><div class="sh"><div class="shr"><div class="tarea_title"><span class="star">*</span>收 货 人 ：</div><div class="shrname"><input type="text" value="'+json.name+'" name="name"class="name" /></div></div></div><div class="dizhi1"><div class="tarea_title"><span class="star">*</span>选择地区：</div><div class="shrname"><select name="province" id="" onchange="_province(this)"><option value="0">请选择省份</option><list from="$province" name="$d"><option value="{$d.ProvinceID}" <if value="{$d.ProvinceName}=='+json.province+'"> selected=""</if>>{$d.ProvinceName}</option></list></select><select name="city" onclick="_city(this)"><option value="0" class="city">请选择城市</option><list from="$city" name="$d"><option value="{$d.CityID}" <if value="{$d.CityName}=='+json.city+'"> selected=""</if>>{$d.CityName}</option></list></select><select name="area" ><option value="0" class="area">请选择区/县</option><list from="$area" name="$d"><option value="{$d.DistrictID}" <if value="{$d.DistrictName}=='+json.area+'"> selected=""</if>>{$d.DistrictName}</option></list></select></div></div><div class="xxdz"><div class="tarea_title"><span class="star">*</span>详细地址：</div><div class="shrname"><input type="text" class="dzxx" name="addr_content" value="'+json.addr_content+'" /></div></div><div class="yzbm"><div class="tarea_title"><span class="star">*</span>邮政编码：</div><div class="shrname"><input name="postcode" type="text" value="'+json.postcode+'" class="name"/></div></div><div class="email"><div class="tarea_title"><span class="star">*</span>电子邮箱：</div><div class="shrname"><input type="text" class="name" name="email" value="'+json.email+'" /></div></div><div class="phone"><div class="tarea_title"><span class="star">*</span>手 机：</div><div class="shrname"><input type="text" class="name" name="phone" value="'+json.phone+'" /></div></div><div class="dh"><div class="tarea_title"><span class="star">*</span>电 话：</div><div class="shrname"><input type="text" class="name" name="tel" value="'+json.tel+'" /><span class="format">电话格式：如：010-65690100-021</span></div></div><div class="surebtn" ><input type="submit" value="确定" /></div></div></form>');
		}
	})
}
// 用户再添加收货地址
function add_tianjia(obj){
	$("div.adduseraddr").show();
	$(obj).hide();
	$("a#quxiaotainjia").show();
}
function del_tianjia(obj){
	$("div.adduseraddr").hide();
	$(obj).hide();
	$("a#tianjia").show();
}
// 异步修改地址
function edit_addr(obj){
	var data=$(obj).serialize();
	$.ajax({
		url: CONTROLLER+'&a=editUserInfo',
		type: 'POST',
		dataType: 'json',
		data: data,
		success:function (json){
			if(json==1){
				$("div.edituseraddr").hide();
				alert('修改地址成功');
				location.reload();
			}else{
				alert("修改地址失败");
			}
		}
	})
	return false;
}
// 异步删除地址
function del_addr(obj,addr_id){
	// alert(addr_id);
	
	$.ajax({
		url: CONTROLLER+'&a=del_addr',
		type: 'POST',
		dataType: 'json',
		data: {addr_id: addr_id},
		success:function (json){
			if(json.status==1){
				alert(json.msg);
				$(obj).parent('dd.sc').parent('dl.j_dl').remove();
			}else{
				alert(json.msg);
			}
		}
	})
}

// 支付方式单选按钮效果
function checkeds(){
	var radio_PayType = $("[name='radio_PayType']").eq(0);
	if(radio_PayType.attr('checked')!='checked'){
		$("[name='radio_COD']").removeAttr('checked');
	}else{
		$("[name='radio_COD']").eq(0).attr('checked','checked');
	}
}


function successOrder(price){
	// 获得当前用户的支付方式
	// 1:
	var payway=$("[name='radio_PayType']").val();
	var url=$('div#big').attr('url');
	var url1=url+'?m=Index&c=Order&a=index&price='+price+'&payway='+payway;
	$.ajax({
		url: MODULE+'&c=Order&a=getPayInfo',
		type: 'POST',
		dataType: 'json',
		data: {price: price,payway:payway},
		success:function (json){
			window.location.href=url1;
		}
	})
} 
function submit(obj){
	var ordername=$("input[name='ordername']").val();
	var total=$("input[name='total']").val();
	var bank=$("input[name='bank']").val();
	if(!bank){
		alert('请选择支付方式');
		return flase;
	}
	$(obj).submit(function() {

	});
}