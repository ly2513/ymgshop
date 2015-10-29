// alert($);
$(function(){
	var a=$('div.you_search dl').length;
	// 只显示4个筛选属性
	for (var i = 4; i <a ; i++) {
		$('div.you_search dl').eq(i).css({'display':'none'});
	};
	// 商品规格属性下拉效果
	$(".rollbut img.down").click(function(){
			var a=$('div.you_search dl').length;
			var b=a*37+16;
			// alert(b);
			$('div.you_search').animate({height:b}, 600);
			for (var i = 4; i <a ; i++) {
				$('div.you_search dl').eq(i).css({'display':'block'});
			};

			$(this).hide();
			$(".rollbut img.on").show();
			
		});
	// 商品规格属性 收起效果
	$(".rollbut img.on").click(function(){
			// $('div.you_search').animate({height:148}, 600);
			// for (var i = 4; i <a ; i++) {
			// 	$('div.you_search dl').eq(i).css({'display':'none'});
			// };
			var a=$('div.you_search dl').length;
			var b=4*37+4;
			$(this).hide();
			$('div.you_search').animate({height:b}, 600);
			for (var i = 4; i <a ; i++) {
				$('div.you_search dl').eq(i).css({'display':'none'});
			};
			$(".rollbut img.down").show();
	});

	//排序hover效果
	$("div.topdiv_on").hover(function() {
		$(this).find('a').addClass('on');
	}, function() {
		$(this).find('a').removeClass('on');
	});
	// 书写价格范围，是否清空数据
	$("div.pricechoose").click(function() {
		$(".checkbtn1").show();
	});
	$(".checkbtn1 a").click(function() {
		// alert(1);
		$(this).parent('.checkbtn1').hide();
		// $('checkbtn1').hide();
		$(this).parent('.checkbtn1').css({'border':'1px #c40000 solid'});
	});

	// 显示尺寸和边框效果
	// $(".colorbox a").hover(function() {
	// 	$(this).parent('dt').parent('.goods_list dl.goods_list_dl').find('.colorbox a').addClass('on');
	// 	// var a=$(this).parent('dt').parent('goods_list dl.goods_list_dl').find('a.on').attr('size');
	// 	// // alert(a);
	// 	// $(this).parent('dt').parent('goods_list dl.goods_list_dl').find('.sizebox i').after(a);
	// 	// $(".sizebox i").after(a);
	// 	$(this).parent(".colorbox").parent('dt').parent('dl.goods_list_dl').find('.sizebox').show();
	// 	// $("dt p").show();
	// 	$(this).parent('dt').parent('goods_list dl.goods_list_dl').find('.sizebox').show();
	// 	$(".sizebox").show();
	// }, function() {
	// 	$(this).removeClass('on');
	// 	$(".sizebox b").remove();
	// });

	$(".goods_list dl").hover(function() {
		$(this).addClass('cur')
	}, function() {
		$(this).removeClass('cur')
		$("dt p").hide();
		$(".sizebox").hide();

	});
})
// 列表页排序方式
function paixu(obj,method){
	$.ajax({
		url: CONTROLLER+'&a=screen',
		type: 'POST',
		// dataType: 'json',
		data: {method: method},
		success:function(json){
			alert(json.data);
			$('div.page1').html(json.page);

			location.reload();
		},
		error:function(){
			alert('服务器错误');
		}
	})
	
}
















