/* 
* @Author: 李勇
* @Date:   2014-12-06 21:01:39
* @Last Modified by:   Administrator
* @Last Modified time: 2014-12-11 00:24:10
* 异步加载城市数据
* @return {[type]} [description]
*/
$(function(){
	$("select[name='province']").change(function(){
		//获得省份id
		var id=$(this).val();
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
	});
	/**
	 * 异步加载城市数据
	 * @return {[type]} [description]
	 */
	$("select[name='city']").click(function(){
		//获得省份id
		
		var id=$(this).val();
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
	});
})

$(function(){
	// 修改用户信息验证
	var hEmail = $("#hEmail").val();
    var hMobile = $("#hMobile").val();

    if (hEmail == "") {
        $("#txtEmail").blur(function () {
            var email = $("#txtEmail").val();
            if (ML.Validator.IsEmptyOrNull(email)) {
                $("#txtEmailinfo").removeClass().addClass("error").html('请输入邮箱地址');
            }
            else if (ML.Validator.IsEmail(email) == false) {
                $("#txtEmailinfo").removeClass().addClass("error").html('请输入正确的邮箱地址');
            }
            else {
                $("#txtEmailinfo").removeClass().addClass("success").html('');
            }
        });
    }
    if (hMobile == "") {
        $("#txtMobile").blur(function () {
            var mobile = $("#txtMobile").val();
            if (ML.Validator.IsEmptyOrNull(mobile)) {
                $("#txtMobileinfo").removeClass().addClass("error").html('请输入手机号码');
            }
            else if (ML.Validator.IsMobile(mobile) == false) {
                $("#txtMobileinfo").removeClass().addClass("error").html('请输入正确的手机号码');
            }
            else {
                $("#txtMobileinfo").removeClass().addClass("success").html('');
            }
        });
    }

    $("#truename").blur(function () {
        var txt = $(this).val();
        if (ML.Validator.IsEmptyOrNull(txt)) {
            $("#truenameinfo").removeClass().addClass("error").html('请输入真实姓名');
        }
        else {
            $("#truenameinfo").removeClass().addClass("success").html('');
        }
    });

    $("#address").blur(function () {
        var txt = $(this).val();
        if (ML.Validator.IsEmptyOrNull(txt)) {
            $("#addressinfo").removeClass().addClass("error").html('请输入联系地址');
        }
        else {
            $("#addressinfo").removeClass().addClass("success").html('');
        }
    });

	$("#telphone").blur(function () {
        var txt = $(this).val();
        if (ML.Validator.IsEmptyOrNull(txt) == false && ML.Validator.IsTelphone(txt) == false) {
            $("#telphoneinfo").removeClass().addClass("error").html('请输入正确的电话号码（如：010-65690100-021）');
        }
        else if (ML.Validator.IsEmptyOrNull(txt) == false && ML.Validator.IsTelphone(txt)) {
            $("#telphoneinfo").removeClass().addClass("success").html('');
        }
        else {
            $("#telphoneinfo").removeClass().html('');
        }
    });
})

	
























