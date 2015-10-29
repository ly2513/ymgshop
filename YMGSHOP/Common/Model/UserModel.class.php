<?php
/**
 * 用户模型
 */
	class UserModel extends Model{
		public $table="user";//用户表
		/**
		 * [getAll 获取用户列表]
		 * @return [type] [description]
		 */
		public function getAll(){
			// 获得用户列表
			$data=$this->join("__user__ u INNER join __role__ r on u.rid=r.rid ")->order("u.uid asc")->all();
			return $data;
		}
		/**
		 * [addUser 添加用户]
		 */
		public function addUser(){
			
		}
	}




?>