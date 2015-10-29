<?php
	class LoginModel extends Model{
		public $table='user'; //用户表
		//自动验证
		// public $validate=array(
		// 	array('username','nonull','用户名不能为空',2,3),
		// 	array('email','nonull','邮箱不能为空',2,3),
		// 	array('password','nonull','密码不能为空',2,3),
		// 	array('phone','nonull','手机号码不能为空',2,3),
		// 	array('code','nonull','验证码不能为空',2,3),
		// 	array('email','isHasEmail','此邮箱已注册',2,3)
		// );
		// 自动验证字段
		// public function isHasEmail($name,$value,$msg,$arg){
		// 	// 用户注册时，检测邮箱是否已被注册
		// 	$map['email']=array('EQ',$value);
		// 	return $this->where($map)->find()?$msg:true;
		// }
		/**
		 * [userLogin 过滤用户非法登录]
		 * @return [type] [description]
		 */
		public function userLogin(){
			//检测是否输入用户名
			if(empty($_POST['email'])){
				$this->error='邮箱不能为空';
				return false;
			}
			//检测是否输入密码
			if(empty($_POST['password'])){
				$this->error='密码不能为空';
				return false;
			}
			//检测是否输入验证码
			if(empty($_POST['code'])){
				$this->error='验证码不能为空';
				return false;
			}
			//检测验证码是否输入正确
			if(strtoupper($_POST['code'])!=$_SESSION['code']){
				$this->error='验证码输入错误';
				return false;
			}
			//从数据库中提取该用户数据
			$data=$this->where("email='{$_POST['email']}'")->find();
			//不存在该用户数据，说明用户不存在
			if(empty($data)){
				$this->error='邮箱不存在';
				return false;
			}
			//检测账号是否输入错误
			if($data['email']!=$_POST['email']){
				$this->error='邮箱输入错误';
				return false;
			}
			//检测密码是否输入错误
			if($data['password']!=md5($_POST['password'].$data['token'])){
				$this->error='密码输入错误';
				return false;
			}
			//将用户id,用户名存入session中
			$_SESSION['uid']=$data['uid'];
			$_SESSION['username']=$data['username'];
			return true;
		}
		// 用户注册
		public function registerUser(){
			//检测是否输入用户名
			if(empty($_POST['email'])){
				$this->error='邮箱不能为空';
				return false;
			}
			//检测是否输入密码
			if(empty($_POST['password'])){
				$this->error='密码不能为空';
				return false;
			}
			//检测是否输入验证码
			if(empty($_POST['code'])){
				$this->error='验证码不能为空';
				return false;
			}
			//检测验证码是否输入正确
			if(strtoupper($_POST['code'])!=$_SESSION['code']){
				$this->error='验证码输入错误';
				return false;
			}
			//从数据库中提取该用户数据
			$data=$this->where("email='{$_POST['email']}'")->find();
			//不存在该用户数据，说明用户不存在
			if(!empty($data)){
				$this->error='邮箱已被注册';
				return false;
			}
			$_POST['token']=md5(time());
			$_POST['password']=md5($_POST['password'].$_POST['token']);
			unset($_POST['code']);
			unset($_POST['repassword']);
			if(!$this->add($_POST)){
				$this->error='注册失败';
			}
			
		}
	}
?>