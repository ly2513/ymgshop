<?php
	/**
	 * 用户管理控制器
	 */
	class UserController extends Controller{
		/**
		 * [$db 用户对象]
		 * @var [type]
		 */
		private $db;
		public function __init(){
			$this->db=K('Login');
		}
		/**
		 * [regist 用户注册]
		 * @return [type] [description]
		 */
		public function register(){
			// p($_POST);exit;
			if(IS_POST){
				if($this->db->registerUser()){
					$this->success('注册成功',U('Index/Index/index'));
				}else{
					$this->error($this->db->error);
				}
			}else{
				$this->display();
			}
		}
		/**
		 * [login 用户登录]
		 * @return [type] [description]
		 */
		public function login(){
			// p($_POST);
			if(IS_POST){
				if($this->db->userLogin()){
					$this->success('登录成功',U('Index/Index/index'));
				}else{
					$this->error($this->db->error);
				}
			}
			$this->display();
		}
		/**
		 * [code 验证码]
		 * @return [type] [description]
		 */
		public function code(){
			$code=new Code;
			$code->show();
		}
		/**
		 * [out 退出]
		 * @return [type] [description]
		 */
		public function out(){
			session_unset();
			session_destroy();
			// go('index');
			$this->success('退出成功','Index/Index/index');
			// 
		}
	}








?>