<?php
	/**
	 * 货品控制器
	 */
	class ProductController extends AuthController{
		/**
		 * [$db 货品模型]
		 * @var [type]
		 */
		private $db;
		/**
		 * [__init 构造函数]
		 * @return [type] [description]
		 */
		public function __init(){
			/**
			 * [$this->db 实例化货品模型对象]
			 * @var [type]
			 */
			$this->db=K('Product');
		}
		/**
		 * [index 货品管理]
		 * @return [type] [description]
		 */
		public function index(){
			// p($_POST);exit;
			if(IS_POST){
					/**
				 * 执行添加货品数据操作
				 */
				if($this->db->addProduct()){
					$this->success('添加货品属性成功');
				}else{
					$this->error($this->db->error);
				}
				
			}else{
				/**
				 * [$data 获得商品属性数据和货品属性数据]
				 * @var [type]
				 */
				$attrdata=$this->db->getAttr();
				/**
				 * 分配商品属性数据
				 */
				// p($attrdata);
				$this->assign('attrdata',$attrdata);
				/**
				 * [$data 用于存放当前货品同一属性的值]
				 * @var array
				 */
				$data=array();
				/**
				 * 循环获得同一商品属性的值
				 */
				foreach ($attrdata as  $attr) {
					foreach ($attr as $id => $v) {
						$data[$v['attr_id']][]=$v['attr_value'];
					}
				}
				/**
				 * 分配商品属性数据
				 */
				$this->assign('data',$data);
				// p($data);
				/**
				 * 获得当前商品的货品数据
				 */
				$Productdata=$this->db->getProduct();
				$this->assign('Productdata',$Productdata);
				// p($Productdata);
				$this->display();
			}
				
		}
		
		/**
		 * [delete 删除货品数据]
		 * @return [type] [description]
		 */
		public function delete(){
			if($this->db->delProduct()){
				$this->success('删除货品成功');
			}else{
				$this->error($this->db->error);
			}
		}












	}





?>