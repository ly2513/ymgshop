//添加
// 当选中下拉列表时，文本域才可以编辑，其他情况下文本域不能操作
$("input[name='attr_input_type']").change(function() {
	if($(this).val()==2){
		$("[name='attr_value']").removeAttr('disabled');
	}else{
		$("[name='attr_value']").attr('disabled',true);
	}
});
// //编辑
// $("textarea[name='attr_input_type']").change(function() {
// 	if($(this).val()==2){
// 		$("[name='attr_value']").removeAttr('disabled');
// 	}else{
// 		$("[name='attr_value']").attr('disabled',true);
// 	}
// });


