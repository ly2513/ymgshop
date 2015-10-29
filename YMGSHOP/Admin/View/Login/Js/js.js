//更改验证码
$(function () {
    $("div.verifyimgArea a#no_see").click(function () {
        var url = CONTROLLER + "&a=code&rand=" + Math.random();
        $("img.code").attr("src", url);
    })
})
//更改表单背景文字
$(function () {
    $("input").keydown(function () {
        if ($(this).attr("class") == 'empty') {
            $(this).val("").removeClass("empty").addClass("inputFocus");
        }
    }).blur(function () {
            if ($(this).val() == "") {
                $(this).val($(this).attr("title")).removeClass("inputFocus").addClass("empty");
            }
        })
})
//表单验证
$(function () {
    $("form").submit(function () {
        return formCheck();
    })
})
//验证字段是否为空
function formCheck() {
    if ($("input[name='username']").val() == "帐号") {
        error_tips_hide("您还没有输入帐号！");
        return false;
    }
    if ($("[name='password']").val() == "") {
        error_tips_hide("您还没有输入密码！");
        return false;
    }
    if ($("input[name='code']").val() == "验证码") {
        error_tips_hide("您还没有输入验证码！");
        return false;
    }
    $("#error_tips").css("display", "none").hide();
    return true;
}
//隐藏错误提示
var t = 0;
function error_tips_hide(msg) {
    $("#err_m").html(msg);
    $("#error_tips").show();
    clearTimeout(t);
    t = setTimeout(function () {
        $("#error_tips").hide();
    }, 3000);
}
//文本框焦点处理
$(function(){
    $("input[name='username']").focus(function(){
        if($(this).val() == "帐号"){
            $(this).val("");
        }
    })
    $("input[name='code']").focus(function(){
        if($(this).val() == "验证码"){
            $(this).val("");
        }
    })
})










