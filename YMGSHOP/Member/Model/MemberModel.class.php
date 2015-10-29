<?php
/**
 * 会员模型
 */
	class MemberModel extends Model{
		/**
		 * 会员信息表
		 * @var string
		 */
		public $table='user_info';

		public function getAll(){
			$uid=$_SESSION['uid'];
			$data=$this->where("uid='$uid' and status='1'")->find();
			return $data;
		}
	}




?>