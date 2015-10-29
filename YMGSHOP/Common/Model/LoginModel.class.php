<?php
	class LoginModel extends Model{
		public $table='user'; //用户表
		/**
		 * [userLogin 过滤用户非法登录]
		 * @return [type] [description]
		 */
		public function userLogin(){
			//检测是否输入用户名
			if(empty($_POST['username'])){
				$this->error='用户名不能为空';
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
			$data=$this->where("username='{$_POST['username']}'")->find();
			//不存在该用户数据，说明用户不存在
			if(empty($data)){
				$this->error='账号不存在';
				return false;
			}
			//检测账号是否输入错误
			if($data['username']!=$_POST['username']){
				$this->error='账号输入错误';
				return false;
			}
			//检测密码是否输入错误
			if($data['password']!=md5($_POST['password'].$data['token'])){
				$this->error='密码输入错误';
				return false;
			}
			//将用户id,用户名存入session中
			$_SESSION['uid']=$data['uid'];
			// 用户角色id
			$_SESSION['rid']=$data['rid'];
			$_SESSION['adminname']=$data['username'];
			return true;
		}
	}




?>