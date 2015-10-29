// 详情页js

// 详情页右侧js
// 颜色
$(function(){
	$(".ul_1 li.txt p").click(function() {
		$(this).addClass('select_color').siblings('p').removeClass('select_color');
		// window.getElementById('')
	});
	// 尺寸
	$(".size ul li span a").click(function() {
		$(this).addClass('cur').siblings('a').removeClass('cur');
	});
	// 数量-
	
	$(".num li p i.sub").click(function() {
		var a=$(this).siblings('b.countdata').html();
		a--;
		if(a<=0){
			alert('至少1件商品');
			$(this).siblings('b.countdata').html(1);
		}else{
			$(this).siblings('b.countdata').html(a);
		}
		
	});
	// 数量+
	$(".num li p i.add").click(function() {
		var a=$(this).siblings('b.countdata').html();
		a++;
		if(a>=5){
			alert('你最多能选5件商品');
			$(this).siblings('b.countdata').html(5);
		}else{
			$(this).siblings('b.countdata').html(a);
		}
	});
})
// 加入购物车,和这盖效果
$(function(){
	$('.shopcar span.spanaddcart i').click(function() {
		//获得显示商品有无状态
		var span=$("div.num span.spancount").html();
		//获得商品数量
		var a=$('.num p b.countdata').html();
		//获得弹窗购物车中的商品数量
		var b=$('#tanchuang .cart p b').html();
		a=parseInt(a);
		b=parseInt(b);
		if(span=='库存还有货'){
			//购物车弹窗显示
			$("#tanchuang").show();
			//遮罩显示
			$('.zhezhao').show();
			$('#tanchuang .lost').hide();
			$('#tanchuang .cart').show();
			//更该弹窗购物车中的数量值
			$('#tanchuang .cart p b').html(a+b);
			//货品id
			var product_id=$("input[name='product_id']").val();
			//商品id
			var goods_gid=$("input[name='goods_gid']").val();
			var num=a;
			//触发表单事件，异步将购买的商品信息加入session中
			$.ajax({
				url: MODULE+'&c=Cart&a=add',
				type: 'POST',
				dataType: 'json',
				data: {product_id: product_id,goods_gid:goods_gid,num:num},

			})
		}else if(span=='暂时无货'){
			//弹窗显示
			$("#tanchuang").show();
			//加入购物车失败窗口隐藏
			$('#tanchuang .cart').hide();
			//弹窗中缺货登记显示
			$('#tanchuang .lost').show();
			//遮罩显示
			$('.zhezhao').show();
		}
		
	});
	// 点击弹窗中的关闭，让弹窗隐藏
	$("#tanchuang i.delete").click(function() {
		// 点击弹窗中的关闭，让弹窗隐藏
		$("#tanchuang").hide();
		//遮罩隐藏
		$('.zhezhao').hide();
	});
	// 点击继续购物，让弹窗隐藏
	$("#tanchuang a#xiaoshi").click(function() {
		// 弹窗隐藏
		$("#tanchuang").hide();
		//遮罩隐藏
		$('.zhezhao').hide();
	});
})

/**
 * [bigimg 获得大图和中图]
 * @param  {[type]} obj [description]
 * @return {[type]}     [description]
 */
function bigimg(obj){

		var img_url=$(obj).attr('img');
		var img_original=$(obj).attr('bigimg');
		// 更该大图路径
			$('#img_url').attr('src',ROOT+'/'+img_url);
		// 更该中途路径
			$('#right img').attr('src',ROOT+'/'+img_original);
}
// 缩略图滑动效果
//图片预览小图移动效果,页面加载时触发
$(function(){
	var tempLength = 0; //临时变量,当前移动的长度
	var viewNum = 4; //设置每次显示图片的个数量
	var moveNum = 3; //每次移动的数量
	var moveTime = 300; //移动速度,毫秒
	var scrollDiv = $(".spec-scroll .items ul"); //进行移动动画的容器
	var scrollItems = $(".spec-scroll .items ul li"); //移动容器里的集合
	var moveLength = 107* moveNum; //计算每次移动的长度
	var countLength = (scrollItems.length - viewNum) *107; //计算总长度,总个数*单个长度
	  // alert(countLength);
	//下一张
	$(".spec-scroll .prev").bind("click",function(){
		if(tempLength < countLength){
			if((countLength - tempLength) > moveLength){
				scrollDiv.animate({top:"-=" + moveLength + "px"}, moveTime);
				tempLength += moveLength;
			}else{
				scrollDiv.animate({top:"-=" + (countLength - tempLength) + "px"}, moveTime);
				tempLength += (countLength - tempLength);
			}
		}
	});
	//上一张
	$(".spec-scroll .next").bind("click",function(){
		if(tempLength > 0){
			if(tempLength > moveLength){
				scrollDiv.animate({top: "+=" + moveLength + "px"}, moveTime);
				tempLength -= moveLength;
			}else{
				scrollDiv.animate({top: "+=" + tempLength + "px"}, moveTime);
				tempLength = 0;
			}
		}
	});
});

//图片放大镜效果
$(function(){
	
		//小色块
		var fdj=document.getElementById('fangdajing');
		//左侧div
		var left=document.getElementById('left');
		//右侧div
		var right=document.getElementById('right');
		//右侧大图
		var img=document.getElementById('img');
		//中图透明遮罩
		var left1=document.getElementById('left1');

		left1.onmousemove=function(e){
			fdj.style.display='block';
			right.style.display='block';
			var ev=window.event||e;
			//获取鼠标的坐标
			var left=ev.layerX||ev.offsetX;
			var top=ev.layerY||ev.offsetY;
			//计算放大镜的位置
			var fdj_top=top-60;
			var fdj_left=left-45;
			//限制放大镜的活动范围
			if(fdj_left<0){
				fdj_left=0;
			}
			//296为中图宽与放大镜宽的差值
			if(fdj_left>296){
				fdj_left=296;
			}
			if(fdj_top<0){
				fdj_top=0;
			}
			// 345为中图的高与放大镜高的差值
			if(fdj_top>400){
				fdj_top=400;
			}
			//重新赋top值和left的值给放大镜
			fdj.style.left=fdj_left+'px';
			fdj.style.top=fdj_top+'px';
			//给右边的图片赋top值和left值
			var img_left=fdj_left*-(1500/385);
			var img_top=fdj_top*-(2027/520);
			//给大图赋值
			img.style.left=img_left+'px';
			img.style.top=img_top+'px';

		}
		left1.onmouseout=function(){
			fdj.style.display='none';
			right.style.display='none';
		}
	

		
});

//获得当前用户选的货品规格
$(function(){
	$('div.attr ul li.txt span a').click(function() {
		var id1=$('div.attr ul li.txt p.select_color').attr('id');
		var id2=$('div.attr ul li.txt span a.cur').attr('id');
		if(id1 && id2){
			var id=id1+'-'+id2;
			$.ajax({
				url: CONTROLLER+'&a=getProduct',
				type: 'POST',
				dataType: 'json',
				data: {goods_attr: id},
				success:function (json){
					// 移除货品状态
					$("div.num span.spancount").html();
					// 显示货品数据数量
					$("div.num span.product_num").html();
					$("div.num span.spancount").removeClass('cur');
					if(json.status=='success'){
						$('input#product_id').val(json.data.product_id);
						// 显示货品状态
						$("div.num span.spancount").html('库存还有货');
						if(json.data.product_number<100){
							// 显示货品数量
							$("div.num span.product_num").html('('+json.data.product_number+')');
						}
						
						//加入购物车显示
						$('span.add').show();
						//缺货登记隐藏
						$('span.dengji').hide();
						$('.num p b.countdata').html(1);
					}else{
						$("div.num span.spancount").addClass('cur');
						$("div.num span.spancount").html('暂时无货');
						$("div.num span.product_num").html('');
						//加入购物车隐藏
						$('span.add').hide();
						//缺货登记显示
						$('span.dengji').show();
						$('.num p b.countdata').html(0);
					}
				}
			})	
		}else{
			//属性没选全
			alert("请选好商品属性");
			return;
		}
	})
})
/**
 * 立即购买
 * @return {[type]} [description]
 */
$(function(){
	$("div.addcar span#collect i").click(function() {

		var span=$("div.num span.spancount").html();
		var a=$('.num p b.countdata').html();
		var b=$('#tanchuang .cart p b').html();
		var url1=MODULE+'&c=Cart&a=index';
		a=parseInt(a);
		b=parseInt(b);
		if(span=='库存还有货'){
			// 货品id
			var product_id=$("input[name='product_id']").val();
			// 商品id
			var goods_gid=$("input[name='goods_gid']").val();
			var num=a;
			//触发表单事件，异步将购买的商品信息加入session中
			$.ajax({
				url: MODULE+'&c=Cart&a=add',
				type: 'POST',
				dataType: 'json',
				data: {product_id: product_id,goods_gid:goods_gid,num:num},
				success:function (json){
					if(json==1){
						window.location.href=url1;

					}
				}
			})
		}
	});
})
// 将商品加入收藏夹时，如果用户没有登录，要求用户登录后再收藏
function sc(obj,gid,uid){
	if(uid==''){
		// 遮罩显示
		$('.zhezhao').show();
		// 登录框显示
		$("#login").show();
	}else{
		// 异步完成收藏商品
		$.ajax({
			url:CONTROLLER+'&a=shoucang',
			type: 'POST',
			dataType: 'json',
			data: {gid:gid,uid:uid},
			success:function(json){
				if(json.status){
					alert(json.message);
				}else{
					alert(json.message);
				}
			}
		})
	}
	
	
	

}
//收藏时，如果用户没登陆让用户登录后在操作
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
				// 遮罩显示
				$('.zhezhao').hide();
				// 登录框显示
				$("#login").hide();
				// 刷新当前页
				location.reload();
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
//变换验证码
$(function () {
    $("span#clickcode").click(function () {
        var url =MODULE + "&c=Login&a=code&rand=" + Math.random();
        $("img.checkCodeImg").attr("src", url);
    })
})

