<?php
/**
 * @Author: Administrator
 * @Date:   2015-05-02 12:15:56
 * @Last Modified by:   Administrator
 * @Last Modified time: 2015-05-06 00:42:57
 */
// 支付宝配置
class AlipayController extends AuthController{
	public function index(){
		if(IS_POST){
			//↓↓↓↓↓↓↓↓↓↓请在这里配置您的基本信息↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓
			//合作身份者id，以2088开头的16位纯数字
			$alipay_config['partner']		= strval(trim($_POST['pid']));

			//收款支付宝账号
			$alipay_config['seller_email']	= strval(trim($_POST['accont']));

			//安全检验码，以数字和字母组成的32位字符
			$alipay_config['key']			= strval(trim($_POST['key']));
			//↑↑↑↑↑↑↑↑↑↑请在这里配置您的基本信息↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑
			//签名方式 不需修改
			$alipay_config['sign_type']    = strtoupper('MD5');

			//字符编码格式 目前支持 gbk 或 utf-8
			$alipay_config['input_charset']= strtolower('utf-8');

			//ca证书路径地址，用于curl中ssl校验
			//请保证cacert.pem文件在当前文件夹目录中
			// $alipay_config['cacert']    = getcwd().'\\cacert.pem';
			$alipay_config['cacert']    = "localhost\\ymgshop".'\\cacert.pem';
			//访问模式,根据自己的服务器是否支持ssl访问，若支持请选择https；若不支持请选择http
			$alipay_config['transport']    = 'http';

			$status=file_put_contents(APP_CONFIG_PATH."alipay.php","<?php \n return ".var_export($alipay_config,true).";\n?> ");
			if($status){
				$this->success("设置成功",U('Alipay/index'));
			}else{
				$this->error("设置失败");
			}
		}else{
			$accont=C('seller_email');
			$key=C('key');
			$pid=C('partner');
			$this->assign('accont',$accont);
			$this->assign('pid',$pid);
			$this->assign('key',$key);
		}
		$this->display();
	}
}