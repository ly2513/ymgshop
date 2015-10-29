<?php
		class RoleController extends AuthController{
			private $db;
			public function __init(){
				$this->db=K('Role');
			}
			/**
			 * [index 角色列表]
			 * @return [type] [description]
			 */
			public function index(){
				$data=$this->db->all();
				$this->assign('data',$data);
				$this->display();
			}
			/**
			 * [add 添加角色]
			 */
			public function add(){

			}



		}





?>