$(function () {
    area.provinceevent('province', 'city', 'district', 'postcode', 'areainfo', 'postcodeinfo');
    area.cityevent('city', 'district', 'postcode', 'areainfo', 'postcodeinfo');
    area.districtevent('district', 'postcode', 'areainfo', 'postcodeinfo');

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
    $("#postcode").change(function () {
        var postcode = $("#postcode").val();

        if (ML.Validator.IsEmptyOrNull(postcode)) {
            $("#postcodeinfo").removeClass().addClass("error").html('请选择邮编');
        }
        else {
            $("#postcodeinfo").removeClass().addClass("success").html('');
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
    $("#savemessage").click(function () {
        var isSubmit = true;

        var email = $("#hEmail").val();
        if (hEmail == "") {
            email = $("#txtEmail").val();
            if (ML.Validator.IsEmptyOrNull(email)) {
                $("#txtEmailinfo").removeClass().addClass("error").html('请输入邮箱地址');

                isSubmit = false;
            }
            else if (ML.Validator.IsEmail(email) == false) {
                $("#txtEmailinfo").removeClass().addClass("error").html('请输入正确的邮箱地址');

                isSubmit = false;
            }
            else {
                $("#txtEmailinfo").removeClass().addClass("success").html('');
            }
        }

        var tname = $("#truename").val();

        if (ML.Validator.IsEmptyOrNull(tname)) {
            $("#truenameinfo").removeClass().addClass("error").html('请输入真实姓名');

            isSubmit = false;
        }
        else {
            $("#truenameinfo").removeClass().addClass("success").html('');
        }

        var provincecode = $("#province").val();
        var province = $("#province option:selected").text();
        var citycode = $("#city").val();
        var city = $("#city option:selected").text();
        var districtcode = $("#district").val();
        var district = $("#district option:selected").text();

        if (ML.Validator.IsEmptyOrNull(provincecode) || ML.Validator.IsEmptyOrNull(citycode) || ML.Validator.IsEmptyOrNull(districtcode)) {
            $("#areainfo").removeClass().addClass("error").html('请选择省/市/区县');

            isSubmit = false;
        }
        else {
            $("#areainfo").removeClass().addClass("success").html('');
        }

        var address = $("#address").val();

        if (ML.Validator.IsEmptyOrNull(address)) {
            $("#addressinfo").removeClass().addClass("error").html('请输入联系地址');

            isSubmit = false;
        }
        else {
            $("#addressinfo").removeClass().addClass("success").html('');
        }

        var postcode = $("#postcode").val();

        if (ML.Validator.IsEmptyOrNull(postcode)) {
            $("#postcodeinfo").removeClass().addClass("error").html('请选择邮编');

            isSubmit = false;
        }
        else {
            $("#postcodeinfo").removeClass().addClass("success").html('');
        }

        var mobile = $("#hMobile").val();
        if (hMobile == "") {
            mobile = $("#txtMobile").val();
            if (ML.Validator.IsEmptyOrNull(mobile)) {
                $("#txtMobileinfo").removeClass().addClass("error").html('请输入手机号码');

                isSubmit = false;
            }
            else if (ML.Validator.IsMobile(mobile) == false) {
                $("#txtMobileinfo").removeClass().addClass("error").html('请输入正确的手机号码');

                isSubmit = false;
            }
            else {
                $("#txtMobileinfo").removeClass().addClass("success").html('');
            }
        }

        var telphone = $("#telphone").val();

        if (ML.Validator.IsEmptyOrNull(telphone) == false && ML.Validator.IsTelphone(telphone) == false) {
            $("#telphoneinfo").removeClass().addClass("error").html('请输入正确的电话号码（如：010-65690100-021）');

            isSubmit = false;
        }
        else if (ML.Validator.IsEmptyOrNull(telphone) == false && ML.Validator.IsTelphone(telphone)) {
            $("#telphoneinfo").removeClass().addClass("success").html('');
        }
        else {
            $("#telphoneinfo").removeClass().html('');
        }

        var NoEmail = $("#NoEmail").attr("checked") ? 1 : 0;
        var NoSendCataLog = $("#NoSendCataLog").attr("checked") ? 1 : 0;
        var NoPardMail = $("#NoPardMail").attr("checked") ? 1 : 0;

        if (isSubmit == false) {
            return false;
        }
        else {
            $('<div style="text-align:center;" id="mDialog"><img alt="数据加载中..." src="http://i1.mbscss.com/img/member/20120731/loading.gif" style="padding: 15px;" /><br/>数据提交中......</div>').dialog({ modal: true, title: '操作提示', showClose: false, width: 300, height: 160 });
            $.ajax({
                type: 'post',
                url: '/member/savecust',
                data: { tname: tname, province: province, provincecode: provincecode, city: city, citycode: citycode, district: district, districtcode: districtcode, address: address, postcode: postcode, telphone: telphone, noemail: NoEmail, nosendcatalog: NoSendCataLog, nopardmail: NoPardMail,email:email,mobile:mobile },
                success: function (str) {
                    $("#mDialog").remove();
                    if (typeof (str.Result) != 'undefined') {
                        $('<div style="text-align:center;padding:30px;">' + str.Msg + '</div>').dialog({ modal: true, title: '操作提示', width: 300, height: 160 });
                    }
                    else {
                        $('<div style="text-align:center;padding:30px;">系统异常，请稍后再试</div>').dialog({ modal: true, title: '操作提示', width: 300, height: 160 });
                    }
                }
            });
        }
    });
});