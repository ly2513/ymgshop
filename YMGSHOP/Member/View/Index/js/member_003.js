var area = {
    provinceevent: function (province, city, district, postcode, areainfo, postcodeinfo) {
        $("#" + province).change(function () {

            var id = $(this).val();

            $("#" + district).html('<option value="">请选择地区</option>');
            $("#" + postcode).html('<option value="">请选择邮编</option>');

            if (ML.Validator.IsEmptyOrNull(id)) {
                $("#" + city).html('<option value="">请选择城市</option>');

                $("#" + areainfo).removeClass().addClass("error").html('请选择省/市/区县');
                $("#" + postcodeinfo).removeClass().addClass("error").html('请选择邮编');

            }
            else {
                $("#" + city).html('<option value="">数据加载中</option>');

                $.ajax({
                    type: 'post',
                    url: '/area/getcity',
                    data: { id: id },
                    success: function (str) {

                        $("#" + city).html('<option value="">请选择城市</option>');

                        $.each(str, function (i, v) {
                            $("#" + city).append('<option value="' + v.AreaCode + '">' + v.AreaName + '</option>');
                        });
                    }
                });
            }
        });
    },
    cityevent: function (city, district, postcode, areainfo, postcodeinfo) {
        $("#" + city).change(function () {

            var id = $(this).val();

            $("#" + postcode).html('<option value="">请选择邮编</option>');

            if (ML.Validator.IsEmptyOrNull(id)) {
                $("#" + district).html('<option value="">请选择地区</option>');

                $("#" + areainfo).removeClass().addClass("error").html('请选择省/市/区县');
                $("#" + postcodeinfo).removeClass().addClass("error").html('请选择邮编');
            }
            else {

                $("#" + district).html('<option value="">数据加载中</option>');

                $.ajax({
                    type: 'post',
                    url: '/area/getdistrict',
                    data: { id: id },
                    success: function (str) {

                        $("#" + district).html('<option value="">请选择地区</option>');

                        $.each(str, function (i, v) {
                            $("#" + district).append('<option value="' + v.AreaCode + '">' + v.AreaName + '</option>');
                        });
                    }
                });
            }
        });
    },
    districtevent: function (district, postcode, areainfo, postcodeinfo) {
        $("#" + district).change(function () {

            var id = $(this).val();

            $("#" + postcode).html('<option value="">请选择邮编</option>');

            if (ML.Validator.IsEmptyOrNull(id)) {
                $("#" + areainfo).removeClass().addClass("error").html('请选择省/市/区县');
                $("#" + postcodeinfo).removeClass().addClass("error").html('请选择邮编');
            }
            else {

                $("#" + areainfo).removeClass().addClass("success").html('');

                $("#" + postcode).html('<option value="">数据加载中</option>');

                $.ajax({
                    type: 'post',
                    url: '/area/getpostcode',
                    data: { id: id },
                    success: function (str) {

                        $("#" + postcode).html('<option value="">请选择邮编</option>');

                        $.each(str, function (i, v) {
                            $("#" + postcode).append('<option value="' + v.PostCode + '">' + v.PostCode + '</option>');
                        });
                    }
                });
            }
        });
    }
}