
// 首页轮播图效果
$(function(){
	var a=$("#bigimg #lunimg li").length;
	// 动态获得ul的长度
	var width =a*1920;
	$("ul#lunimg").css({width:width+'px'});
	// 定时器
	timer=setInterval(run,2000);
	// run函数
	var m=0;
	function run(){
		m++;
		if(m==a){
			$("ul#lunimg").css({left:'0px'});
			m=1;
		}
		var left=m*-1920;
		// document.title=left;
		$('ul#lunimg').stop().animate({left:left+'px'}, 600);
		$('ul.round li').eq(m-1).addClass('cur').siblings('li').removeClass('cur');
	}
	// 放大图上让计时器停止，箭头显隐性
	$('#bigimg').mouseenter(function() {
		clearInterval(timer);
		$(this).find('i').show();
	});
	$('#bigimg').mouseleave(function() {
		timer=setInterval(run,2000);
		$(this).find('i').hide();
	});
	// 箭头hover效果
	$('i.left').hover(function() {
		$(this).addClass('cur');
	}, function() {
		$(this).removeClass('cur');
	});
	$('i.right').hover(function() {
		$(this).addClass('cur');
	}, function() {
		$(this).removeClass('cur');
	});
	// 右箭头点击滑动效果
	$('i.right').click(function() {
		clearInterval(timer);
		m++;
		// 获得装图片的ul的当前的left值
		var left=$('ul#lunimg').css('left');
		var d=m*-1920;
		// 获得图片个数
		var c=$("#bigimg #lunimg li").length;
		// alert(left);
		if(d==c*-1920){
			$('#bigimg #lunimg').css('left', '0px');
			m=1;
			$('ul.round li').eq(0).addClass('cur').siblings('li').removeClass('cur');
		}else{
			$('#bigimg #lunimg').stop().animate({'left':(d+1920)+'px'}, 600);
			$('ul.round li').eq(m-1).addClass('cur').siblings('li').removeClass('cur');
		}
	});
	//左箭头点击滑动效果
	// n=0;
	$('i.left').click(function() {
		clearInterval(timer);
		m--;
		//设置#lunimg的left值
		var d=m*-1920;
		// 获得图片个数
		var c=$("#bigimg #lunimg li").length;
		// 当ul的left的值等于ul的总长度时，将其left值置为最大
		// alert(c*1920);
		if(m==-1){
			var left=(c-1)*-1920;
			$('#bigimg #lunimg').css('left',left+'px');
			m=c-2;
			$('ul.round li').eq(c-2).addClass('cur').siblings('li').removeClass('cur');
		}else{
			$('#bigimg #lunimg').stop().animate({'left':(d-1920)+'px'}, 600);
			$('ul.round li').eq(m).addClass('cur').siblings('li').removeClass('cur');
		}
	});

	// 小圆点效果
	$("ul.round li").hover(function() {
		clearInterval(timer);
		m=$(this).index();
		$('ul.round li').eq(m).addClass('cur').siblings('li').removeClass('cur');
		 left=(m+1)*-1920;
		$('ul#lunimg').stop().animate({left:left+'px'}, 600);
	}, function() {
		// timer=setInterval(run,2000);
	});
})


$(function(){
	$(".zkgoods dl dt").hover(function() {
		$(this).find('title').show();
		$(this).find('titlebg').show();
	}, function() {
		$(this).find('title').hide();
		$(this).find('titlebg').hide();
	});
})