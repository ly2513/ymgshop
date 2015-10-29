
//购物车，改变购物的数量值
$(function(){
	$('.list dl.top dd.sl a.sub').click(function() {
		// 获得当前的商品数量值
		var a=$(this).parent('dd.sl').parent('dl.top').parent('div.list').find("input[name='jian']").val();
		// 获得当前商品的单价
		var b=$(this).parent('dd.sl').parent('dl.top').parent('div.list').find('span.danjia').html();
		// 修改商品数量
		a--;
		// 删除当前数据，
		if(a<=0){
			if(confirm('确定要移除吗?')){
				$(this).parent('dd.sl').parent('dl.top').parent('div.list').remove();
			}
			a=1;
		}
		$(this).parent('dd.sl').parent('dl.top').parent('div.list').find("input[name='jian']").val(a);
		a=parseInt(a);//商品数量
		b=parseFloat(b);//商品单价
		t=a*b;
		// 这里用ajax来处理这些数据
		// 当前商品的总价
		$(this).parent('dd.sl').parent('dl.top').parent('div.list').find('span.total').html(t+'.00');
		//修改session中的数据
		var cartId=$(this).parent('dd.sl').parent('dl.top').parent('.list').attr('id');
		var ACTION=$(this).parent('dd.sl').parent('dl.top').parent('.list').attr('action');
		//发异步修改session中的数据
		$.ajax({
			url:ACTION,
			type: 'POST',
			dataType: 'json',
			data: {cartId: cartId,num:a},
		})
		//修改总价
		var c=$('div.list').length;
		var e=0;//总价格
		var d='';
		var f='';
		var g=0;//总数量
		for (var i = 0; i < c; i++) {
			d=$('div.list').eq(i).find('dd.jexj span.total').html();
			d=parseFloat(d);
			e+=d;
		};
		$('span.allmoney').html(e+'.00');
		//修改数量
		for(var i=0; i<c ;i++){
			f=$('div.list').eq(i).find("dd.sl input").val();
			g+=parseInt(f);
		}
		$("span.number").html(g+'件');
	});

	/**
	 * 修改数量
	 * @return {[type]} [description]
	 */
	$('.list dl.top dd.sl a.add').click(function() {
		// 获得当前的商品数量值
		var a=$(this).parent('dd.sl').parent('dl.top').parent('div.list').find("input[name='jian']").val();
		// 获得当前商品的单价
		var b=$(this).parent('dd.sl').parent('dl.top').parent('div.list').find('span.danjia').html();
		// 修改商品数量
		a++;
		// // 删除当前数据，
		// if(a<=0){
		// 	$(this).parent('dd.sl').parent('dl.top').parent('div.list').remove();
		// }
		$(this).parent('dd.sl').parent('dl.top').parent('div.list').find("input[name='jian']").val(a);
		a=parseInt(a);//商品数量
		b=parseFloat(b);//商品单价
		t=a*b;
		// 这里用ajax来处理这些数据
		// 当前商品的总价
		$(this).parent('dd.sl').parent('dl.top').parent('div.list').find('span.total').html(t+'.00');
		//修改session中的数据
		var cartId=$(this).parent('dd.sl').parent('dl.top').parent('.list').attr('id');
		var ACTION=$(this).parent('dd.sl').parent('dl.top').parent('.list').attr('action');
		//发异步修改session中的数据
		$.ajax({
			url:ACTION,
			type: 'POST',
			dataType: 'json',
			data: {cartId: cartId,num:a},
		})

		//修改总价
		var c=$('div.list').length;
		var e=0;//总价格
		var d='';
		var f='';
		var g=0;//总数量
		for (var i = 0; i < c; i++) {
			d=$('div.list').eq(i).find('dd.jexj span.total').html();
			d=parseFloat(d);
			e+=d;
		};
		$('span.allmoney').html(e+'.00');
		//修改数量
		for(var i=0; i<c ;i++){
			f=$('div.list').eq(i).find("dd.sl input").val();
			g+=parseInt(f);
		}
		$("span.number").html(g+'件');
		
	});
})

//
$(function(){
	var a=$(".shop_list .list").length;
	for (var i=1; i<=a; i++) {
		$(".shop_list .list dl.top").eq(i).addClass('cur');
	};
})
// 删除session中的商品
function del(obj,cartId){
	$.ajax({
		url: CONTROLLER+'&a=del',
		type: 'POST',
		dataType: 'json',
		data: {cartId: cartId},
		success:function (){
			$('div#'+cartId).remove();
			location.reload();
		}
	})
	
}

//结算时，如果用户没登陆让用户登录后在操作
$(function(){
	$('img#img_register').click(function() {
		// 注册显示
		$('div#register').show();
		//登录隐藏
		$('div#userlogin').hide();
	});
	$('img#img_login').click(function() {
		$('div#userlogin').show();
		$('div#register').hide();
	});
	// 点击关闭，遮罩隐藏，登录界面隐藏
	$('i#guanbi').click(function() {
		$('div#login').hide();
		$('.zhezhao').hide();
	});
	
})
//变换验证码
$(function () {
    $("span#clickcode").click(function () {
        var url =MODULE + "&c=Login&a=code&rand=" + Math.random();
        $("img.checkCodeImg").attr("src", url);
    })
})

// // 结算函数
function jiesuan(username,url){
	// 没有登录
	if(username==''){
		// 遮罩显示
		$('.zhezhao').show();
		// 登录框显示
		$("#login").show();
	}else{
		// 有登录就直接去结算
		window.location.href=url;
	}
}

// 登录
function _login(obj,url){
	var email=$("input[name='email']").val();
	var password=$("input[name='password']").val();
	var code=$("input[name='code']").val();
	$.ajax({
		url: MODULE+'&c=Login&a=index',
		type: 'POST',
		dataType: 'json',
		data: {email:email,password:password,code:code},
		success:function(json){
			if(json.status){
				alert(json.message);
				window.location.href=url;
			}else{
				alert(json.messgae);
				return false;
			}
		}
	})
	return false;
}
// 注册
function _registers(obj){
	var data=$(obj).serialize();
	$.ajax({
		url: MODULE+'&c=User&a=register',
		type: 'POST',
		dataType: 'json',
		data:data,
		success:function(json){
			if(json.status){
				alert(json.messgae);
			}else{
				alert(json.messgae);
			}
		}
	})
	return false;
}















