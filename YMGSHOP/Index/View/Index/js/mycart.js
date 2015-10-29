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
		b=parseInt(b);//商品单价
		t=a*b;
		// 这里用ajax来处理这些数据
		// 当前商品的总价
		$(this).parent('dd.sl').parent('dl.top').parent('div.list').find('span.total').html(t+'.00');
		
	});
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
		b=parseInt(b);//商品单价
		t=a*b;
		// 这里用ajax来处理这些数据
		// 当前商品的总价
		$(this).parent('dd.sl').parent('dl.top').parent('div.list').find('span.total').html(t+'.00');
		
	});
})
// 修改效果
$(function(){
	$(".list dl.top dd.cz a.update").click(function() {
		
	});




})
