// 支付
function pay(obj,order_id,CONTROLLER){
	$.ajax({
		url: CONTROLLER+'&a=pay',
		type: 'POST',
		dataType: 'json',
		data: {order_id: order_id},
		success:function (json){
			if(json.status==1){
				alert(json.message);
				location.reload();
			}else{
				alert(json.message);
			}
		}
	})
	
}
// 取消
function cancel(obj,order_id,CONTROLLER){
	$.ajax({
		url: CONTROLLER+'&a=cancel',
		type: 'POST',
		dataType: 'json',
		data: {order_id: order_id},
		success:function (json){
			if(json.status==1){
				alert(json.message);
				location.reload();
			}else{
				alert(json.message);
			}
		}
	})
}
// 删除
function del(obj,order_id,CONTROLLER){
	$.ajax({
		url: CONTROLLER+'&a=del',
		type: 'POST',
		dataType: 'json',
		data: {order_id: order_id},
		success:function (json){
			if(json.status==1){
				alert(json.message);
				$(obj).parent('tr').remove();
				// location.reload();
			}else{
				alert(json.message);
			}
		}
	})
}
// 搜索订单
function search(CONTROLLER){
	var order_sn=$("input[name='order_sn']").val();
	// alert(typeof(order_sn))
	$.ajax({
		url: CONTROLLER+'&a=orderList',
		type: 'POST',
		dataType: 'json',
		data: {order_sn: order_sn},
		success:function (json){
				location.reload();
		}
	})
}
// 商品评论
function comment(obj,gid,CONTROLLER,){
	$.ajax({
		url: CONTROLLER+'&a=comment&gid='+gid,
		type: 'GET',
		dataType: 'json',
		data:{},
		success:function (json){

		}
	})
	
}

