<?php
/**
 * @author 李勇 <[626375290@qq.com]>
 * 品牌管理控制器
 */
	class BrandController extends AuthController{
		private $db;//品牌模型对象
		private $brand;//用于存储品牌数据

		/**
		 * [__init  构造函数]
		 * @return [type] [description]
		 */
		public function __init(){
			$this->db=K("Brand");
		}
		/**
		 * [index  品牌列表]
		 * @return [type] [description]
		 */
		public function index(){
			// 分配品牌数据
			$this->brand=$this->db->order("brand_order desc")->all();
			$this->assign('data',$this->brand);
			$this->display();
		}

		/**
		 * [add 添加品牌]
		 */
		public function add(){
			if(IS_POST){
				if($this->db->addBrand()){
					$this->success('添加品牌成功','index');
				}else{
					$this->error($this->db->error);
				}
			}else{
				$this->display();
			}
		}
		/**
		 * [edit  添加品牌]
		 * @return [type] [description]
		 */
		public function edit(){
			// 有post值就执行编辑操作
			if(IS_POST){
				if($this->db->editBrand()){
					$this->success('编辑品牌成功','index');
				}else{
					$this->error($this->db->error);
				}
			}else{
				// 没有post就显示编辑模板
				$bid=Q('bid');
				$data=$this->db->where("bid=$bid")->find();
				$data['brand_logo']=array(array('path'=>$data['brand_logo']));
				$this->assign('data',$data);
				$this->display();
			}
		}
		/**
		 * [delete  删除品牌]
		 * @return [type] [description]
		 */
		public function delete(){
			if($this->db->deleteBrand()){
				$this->success('删除品牌成功','index');
			}else{
				$this->error($this->db->error);
			}
		}
		/**
		 * [updateCache  更新品牌缓存]
		 * @return [type] [description]
		 */
		public function updateCache(){
			if($this->db->updateCache()){
				$this->success('更新成功','index');
			}else{
				$this->error('更新失败');
			}
		}
		/**
		 * [order 修改品牌排序]
		 * @return [type] [description]
		 */
		public function order(){
			$this->db->save();
		}


	}





?>