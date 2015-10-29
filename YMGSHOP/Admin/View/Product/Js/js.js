/**
 * 添加货品
 */
 function addProduct(obj){
 	var html=$(obj).parent('td').parent('tr').eq(0).clone();
 	html.find('td.add').html('<a href="javascript:;" onclick="removeProduct(this)"><i class="iconfont">&#xf0176;</i></a>');
 	$(obj).parents('tr').eq(0).after(html);
 }


 /**
  * 移除一组货品数据
  */
 function removeProduct(obj){
 	$(obj).parents('tr').eq(0).remove();
 }
/**
 * 删除货品数据
 */
function deleteProduct(obj,product_id){
	if(!confirm('确实要删除吗？'))return;
	$.ajax({
		url: CONTROLLER+'&a=delete&product_id='+product_id,
		type: 'POST',
		dataType: 'json',
		success:function(json){
			if(json.status){
				removeProduct(obj);
				alert(json.message);
			}
		}
	})
	
	
}


