/**
 * 会员中心左侧收缩效果
 * @return {[type]} [description]
 */
$(function(){
	$(".menu h2").parent('.menu').find("h2").toggle(
	  	function () {
	    	$(this).siblings('ul').slideDown('600');
	  	},
	  	function () {
	    	$(this).siblings('ul').slideUp('600');
	  	}
	);
})
	
