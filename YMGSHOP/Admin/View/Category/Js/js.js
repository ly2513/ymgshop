
function changeCategory(obj){
	var cid=$(obj).val();
	if(cid){
		location.href=ACTION+'&cid='+cid;
	}
}