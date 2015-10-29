
/**
 * 品牌异步排序
 */

$(function(){
	$("input[name='brand_order']").keyup(function() {
		var order=$(this).val();
		var bid=$(this).parent('td').parent('tr#tr').find('td#bid').html();
		$.ajax({
			url: CONTROLLER+'/order',
			type: 'POST',
			dataType: '',
			data: {brand_order: order,bid:bid},
			success:function(){
				location.reload();
			}
		})
		
	});



})











