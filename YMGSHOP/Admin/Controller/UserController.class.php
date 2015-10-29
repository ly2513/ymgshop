<?php
/**
 * 用户管理控制器
 */
	class UserController extends AuthController{
		private $db;
		public function __init(){
			$this->db=K('User');
		}
		public function index(){
			$data=$this->db->getAll();
			$this->assign('data',$data);
			$this->display();
		} 





	}





?>
