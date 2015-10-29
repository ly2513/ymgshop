<?php
	/**
	 * 配置项控制器
	 */
	class WebSetController extends AuthController{
		private $db;//配置模型
		/**
		 * [__init 构造函数]
		 * @return [type] [description]
		 */
		public function __init(){
			/**
			 * [$this->db 实例化配置模型对象]
			 * @var [type]
			 */
			$this->db=K('WebSet');
		}
		/**
		 * [set 设置配置项]
		 */
		public function index(){
			if(IS_POST){
				if($this->db->updateConfig()){
					$this->success('更新配置成功');
				}else{
					$this->error($this->db->error);
				}
			}else{
				/**
				 * [$data 获得网站的所有配置]
				 * @var [type]
				 */
				$data=$this->db->getAll();
				$this->assign('data',$data);
				$this->display();
			}
		}
	}





?>