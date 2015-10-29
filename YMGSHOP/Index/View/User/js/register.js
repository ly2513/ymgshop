$(function(){
	/**
	 * 注册验证
	 * @type {String}
	 */
	$("form[name='register']").validate({
		username:{
			rule:{
				user:"6,20",
				required:true
			},
			error:{
				user:"不能小于6个字符",
				required:"用户名不能为空"
			},
			message:"6到20位数字字母组合",
			success:"用户名不正确"
		},
		email:{
			rule:{
				email:true,
				required:true
			},
			error:{
				email:"邮箱格式有误",
				required:'用户邮箱不能为空'
			},
			message:"请输入邮箱",
			success:"输入邮箱正确"
		},
		/**
		 * [phone 手机验证]
		 * 
		 */
		phone:{
			rule:{
				phone:true,
				required:true
			},
			error:{
				phone:'手机号码格式错误',
				required:"手机号码不能为空"
			},
			message:"请输入手机号"
		},
		password:{
			rule:{
				required:true,
			},
			error:{
				required:'密码不能为空',
			}
		},
		repassword:{
			rule:{
				required:true,
				confirm:"password",
			},
			error:{
				required:'确认密码不能为空',
				confirm:"两次输入的密码不一致",
			},
			message:"请输入确认密码"
		},
		code:{
			rule:{
				required:true,
				ajax:"{|U:'User/register'}",
			},
			error:{
				required:"验证码不能为空",
				ajax:"验证码输入错误"
			},
			message:"请输入验证码",
			success:"输入正确",
		}
	})
	
})
//变换验证码
$(function () {
    $("div.userinfo_input span#click_code").click(function () {
        var url = CONTROLLER + "&a=code&rand=" + Math.random();
        $("img.checkCode").attr("src", url);
    })
})
// 验证登录
$(function (){
	$("form[name='login']").validate({
		email:{
			rule:{
				email:true,
				required:true
			},
			error:{
				email:"邮箱格式有误",
				required:'用户邮箱不能为空'
			},
			message:"请输入邮箱",
			success:"输入邮箱正确"
		},
		password:{
			rule:{
				required:true,
			},
			error:{
				required:'密码不能为空',
			},
			message:"请输入密码"
		},
		code:{
			rule:{
				required:true,
				// ajax:"{|U:'User/login'}",
			},
			error:{
				required:"验证码不能为空",
				// ajax:"验证码输入错误"
			},
			message:"请输入验证码",
			success:"输入正确",
		}
	})
})


