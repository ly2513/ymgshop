/**
 * 会员中心左侧收缩效果
 * @return {[type]} [description]
 */
$(function(){
	$(".menu h2").parent('.menu').find("h2").toggle(
	  	function () {
	    	$(this).siblings('ul').slideDown('600');
	    	$(this).addClass('showon');
	    	$(this).removeClass('showoff');
	  	},
	  	function () {
	    	$(this).siblings('ul').slideUp('600');
	    	$(this).addClass('showoff');
	    	$(this).removeClass('showon');
	  	}
	);

	$(".menu .showon").hover(function() {
		alert(1);
		$(this).addClass('on');
	}, function() {
		$(this).removeClass('on');
	});	

	$(".menu .showoff").hover(function() {
		
		$(this).addClass('off');
	}, function() {
		$(this).removeClass('off');
		
	});

	$(".menu ul li a").click(function() {
		$(this).addClass('cur').parent('li').siblings('li').find('a').removeClass('cur');
		$(this).parent("li").parent("ul").parent(".menu").siblings('.menu').find("a").removeClass('cur');
	});
})

