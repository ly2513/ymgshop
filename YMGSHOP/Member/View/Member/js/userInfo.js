/**
 * 异步加载城市数据
 * @return {[type]} [description]
 */

function _province(obj){
		//获得省份id
		var id=$(obj).val();
		var html='';
		$.ajax({
			url: CONTROLLER+'&a=city',
			type: 'POST',
			dataType: 'json',
			data: {ProvinceID: id},
			success: function(json){
				for (var i = 0; i<json.length; i++) {
					html+="<option value="+json[i]['CityID']+">"+json[i]['CityName']+"</option>";
				};
				$("select[name='city']").html(html);
				
			}
		})
	
};
	/**
	 * 异步加载城市数据
	 * @return {[type]} [description]
	 */
function _city(obj){
		//获得省份id
		var id=$(obj).val();
		var html='';
		$.ajax({
			url: CONTROLLER+'&a=area',
			type: 'POST',
			dataType: 'json',
			data: {CityID: id},
			success: function(json){
				for (var i = 0; i<json.length; i++) {
					html+="<option value="+json[i]['DistrictID']+">"+json[i]['DistrictName']+"</option>";
				};
				$("select[name='area']").html(html);
			}
		})
};

function _userinfo(obj){
	var data=$(obj).serialize();
	$.ajax({
		url: CONTROLLER+'&a=userInfo',
		type: 'POST',
		dataType: 'json',
		data: data,
		success:function(json){
			if(json){
				alert('修改成功');
			}else{
				alert('修改失败');
			}
		}
	})
	return false;
	
}








