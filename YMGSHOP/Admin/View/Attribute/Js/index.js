/**
 * 改变商品类型后，显示指定类型的属性
 */
function changeGoodsType(obj){
	var cat_id=$(obj).val();
	if(cat_id){
		location.href=ACTION+'&cat_id='+cat_id;
	}
}