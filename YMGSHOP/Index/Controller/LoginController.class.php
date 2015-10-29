<?php

/**
 * 用户登录检测
 */
	class LoginController extends Controller{
		private $db;
		public function __init(){
			$this->db=K('Login');
		}
		/**
		 * [login 用户登录检测]
		 * @return [type] [description]
		 */
		public function index(){
			// p($_POST);exit;
			if(IS_POST){
				if($this->db->userLogin()){
					$this->success('登录成功',U('Index/Index/index'));
				}else{
					$this->error($this->db->error);
				}
			}else{
				$this->display();
			}

		} 
		/**
		 * [code 生成验证码]
		 * @return [type] [description]
		 */
		public function code(){
			$code=new Code;
			$code->show();
		}
		

	}


















?>