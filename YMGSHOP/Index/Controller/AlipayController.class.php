<?php
	class AlipayController extends Controller{
		/**
		 * [index 支付]
		 * @return [type] [description]
		 */
		public function index(){
			//支付宝配置信息
			$config=require(APP_CONFIG_PATH."alipay.php");
			import("HDPHP.Extend.Org.Alipay.alipay_submit");
			if(IS_POST){
			        //支付类型
			        $payment_type = "1";
			        //必填，不能修改
			        
			        //商户订单号
			        $out_trade_no = strval(trim($_POST['ordername']));
			        //商户网站订单系统中唯一订单号，必填

			        //订单名称
			        $subject = strval(trim($_POST['ordername']));
			        //必填

			         //服务器异步通知页面路径
			        $notify_url = U('Index/Alipay/notify',array('ordername'=>$out_trade_no));
			        //需http://格式的完整路径，不能加?id=123这类自定义参数

			        //页面跳转同步通知页面路径
			        $return_url = U('Index/Alipay/returnUrl');
			        //需http://格式的完整路径，不能加?id=123这类自定义参数，不能写成http://localhost/

			        //付款金额
			        $total_fee = strval(trim($_POST['total']));
			        //必填

			        //订单描述
			        $body = "订单支付";
			        //商品展示地址
			        $show_url = U('Index/index');
			        //需以http://开头的完整路径，例如：http://www.商户网址.com/myorder.html

			        //防钓鱼时间戳
			        $anti_phishing_key = "";
			        //若要使用请调用类文件submit中的query_timestamp函数

			        //客户端的IP地址
			        $exter_invoke_ip = "";
			        //非局域网的外网IP地址，如：221.0.0.1

				//构造要请求的参数数组，无需改动
				$parameter = array(
						"service" => "create_direct_pay_by_user",
						"partner" => trim(C('partner')),
						"seller_email" => trim(C('seller_email')),
						"payment_type"	=> $payment_type,
						"notify_url"	=> $notify_url,
						"return_url"	=> $return_url,
						"out_trade_no"	=> $out_trade_no,
						"subject"	=> $subject,
						"total_fee"	=> $total_fee,
						"body"	=> $body,
						"show_url"	=> $show_url,
						"anti_phishing_key"	=> $anti_phishing_key,
						"exter_invoke_ip"	=> $exter_invoke_ip,
						"_input_charset"	=> trim(strtolower(C('input_charset')))
				);

				//建立请求
				$alipaySubmit = new AlipaySubmit($config);
				$html_text = $alipaySubmit->buildRequestForm($parameter,"get", "确认");
				echo $html_text;
			}

		}

		public function returnUrl(){
			// 支付宝配置
			$config=require(APP_CONFIG_PATH."alipay.php");
			import("HDPHP.Extend.Org.Alipay.alipay_notify");
			$alipayNotify = new AlipayNotify($config);
			$verify_result = $alipayNotify->verifyReturn();
			// if($verify_result) {//验证成功
				
				//商户订单号
				$out_trade_no = $_GET['out_trade_no'];
				//支付金额
				$total_fee=$_GET['total_fee'];
				//支付宝交易号
				$trade_no = $_GET['trade_no'];
			    if($_GET['trade_status'] == 'TRADE_FINISHED' || $_GET['trade_status'] == 'TRADE_SUCCESS') {
					//判断该笔订单是否在商户网站中已经做过处理
						//如果没有做过处理，根据订单号（out_trade_no）在商户网站的订单系统中查到该笔订单的详细，并执行商户的业务程序
						//如果有做过处理，不执行商户的业务程序
						//修改订单状态
						$orderdata['order_status']=1;
						if(M("order")->where(array('order_sn'=>$out_trade_no))->save($orderdata)){
							//支付成功后调到会员中心
							$this->success("支付成功",U("Member/Index/index"));
						}else{
							$this->error("修改订单操作失败");
						}
			    }
			   
			// }
			// else {
			//     //验证失败
			//     //如要调试，请看alipay_notify.php页面的verifyReturn函数
			//     echo "支付宝配置验证失败";
			// }

		}

		public function notify(){
			$config=require(APP_CONFIG_PATH."alipay.php");
			import("HDPHP.Extend.Org.Alipay.alipay_notify");

			//计算得出通知验证结果
			$alipayNotify = new AlipayNotify($config);
			$verify_result = $alipayNotify->verifyNotify();

			if($verify_result) {//验证成功
				/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
				//请在这里加上商户的业务逻辑程序代

				
				//——请根据您的业务逻辑来编写程序（以下代码仅作参考）——
				
			    //获取支付宝的通知返回参数，可参考技术文档中服务器异步通知参数列表
				
				//商户订单号

				$out_trade_no = $_POST['out_trade_no'];

				//支付宝交易号

				$trade_no = $_POST['trade_no'];

				//交易状态
				$trade_status = $_POST['trade_status'];


			    if($_POST['trade_status'] == 'TRADE_FINISHED') {
					//判断该笔订单是否在商户网站中已经做过处理
						//如果没有做过处理，根据订单号（out_trade_no）在商户网站的订单系统中查到该笔订单的详细，并执行商户的业务程序
						//如果有做过处理，不执行商户的业务程序
						
			    }
			    else if ($_POST['trade_status'] == 'TRADE_SUCCESS') {
					//判断该笔订单是否在商户网站中已经做过处理
						//如果没有做过处理，根据订单号（out_trade_no）在商户网站的订单系统中查到该笔订单的详细，并执行商户的业务程序
						//如果有做过处理，不执行商户的业务程序
							
					
			    } 
				echo "success";		//请不要修改或删除
			}
			else {
			    //验证失败
			    echo "fail";
			}
		}

	}



?>