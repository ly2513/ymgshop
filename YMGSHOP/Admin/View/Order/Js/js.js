/* 
* @Author: 李勇
* @Date:   2014-12-09 18:49:14
* @Last Modified by:   Administrator
* @Last Modified time: 2014-12-09 20:45:21
*/

'use strict';
// 更改订单状态
function solve(obj,order_id){
	$.ajax({
		url: CONTROLLER+'&a=update',
		type: 'POST',
		dataType: 'json',
		data: {order_id: order_id},
		success:function (json){
			if(json.status==1){
				alert(json.message);
				location.reload();
			}
		}
	})
}
// 查看订单信息
function orderInfo(obj,order_id){
	$.ajax({
		url: CONTROLLER+'&a=orderInfo',
		type: 'POST',
		dataType: 'json',
		data: {order_id: order_id},
		success: function (json){
			
		}
	})
	
	
}

