$(function(){
	// 购物车效果
	$('div.top_car').hover(function() {
		$(this).find('.car_box').show();
		$(this).find('.car_list').show();
	}, function() {
		$(this).find('.car_box').hide();
		$(this).find('.car_list').hide();
	});

	// 所有商品二级分类
	$("#last_nav").hover(function() {
		$(this).find('.cata_group').show();
	}, function() {
		$(this).find('.cata_group').hide();
	});
	
	//三级栏目
	$(".cata_group_dl").hover(function() {
		$(this).find(".cata_group_dd").show();
	}, function() {
		$(this).find(".cata_group_dd").hide();
	});
	
	//异步删除session商品数据
	$("a.del").click(function() {
		var cartId=$(this).attr('id');
		var MODULE=$(this).attr('MODULE');
		var obj=$(this).parent('.num_box').parent('li');
		$.ajax({
			url: MODULE+'&c=Cart&a=del',
			type: 'POST',
			dataType: 'json',
			data: {cartId: cartId},
			success:function(){
				$(obj).remove();
				location.reload();
			}
		})
		
	});
})


//导航栏hover效果
$(function(){
	$('#nev li').hover(function() {
		$(this).addClass('cur');
	}, function() {
		$(this).removeClass('cur');
	});
})




