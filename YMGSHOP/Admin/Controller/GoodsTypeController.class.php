<?php
/**
 * @author [李勇] <[626375290@qq.com]>
 */
// 商品类型控制器
	class GoodsTypeController extends AuthController{
		private $db;//商品类型模型
		private $cat_id;//商品类型的id
		public $goodstype;//商品类型的缓存数据
		// 构造函数
		public function __init(){
			$this->db=K("GoodsType");//实例化商品类型模型对象
			$this->cat_id=Q('cat_id',0,'intval');
			$this->goodstype=S('goods_type');//缓存goodstype表中数据
			if($this->cat_id && !isset($this->goodstype[$this->cat_id])){
				$this->error('商品类型不存在');
			}
		}
		/**
		 * [index 显示商品类型列表]
		 * @return [type] [description]
		 */
		public function index(){
			// 获得商品类型数据
			$goodsType=$this->goodstype;
			$this->assign('goodsType',$goodsType);
			$this->display();
		}
		/**
		 * [add  添加商品类型]
		 */
		public function add(){
			if(IS_POST){
				if($this->db->addGoodsType()){
					$this->success('添加商品类型成功','index');
				}else{
					$this->error($this->db->error);
				}
			}else{
				$this->display();
			}
		}
		/**
		 * [edit 编辑商品类型]
		 * @return [type] [description]
		 */
		public function edit(){
			if(IS_POST){
				if($this->db->editGoodsType()){
					$this->success('编辑商品类型成功','index');
				}else{
					$this->error($this->db->error);
				}
			}else{
				// 分配当前商品类型数据
				// P($this->goodstype[1]);
				$this->assign('field',$this->goodstype[$this->cat_id]);
				$this->display();
			}
		}
		/**
		 * [del 删除商品类型]
		 * @return [type] [description]
		 */
		public function del(){
			if($this->db->deleteGoodsType()){
				$this->success('删除成功');
			}else{
				$this->error($this->db->error);
			}
		}
		/**
		 * [updateCache 更新商品类型缓存]
		 * @return [type] [description]
		 */
		public function updateCache(){
			if($this->db->updateCache()){
				$this->success('更新缓存成功','index');
			}else{
				$this->error($this->db->error);
			}
		}
	}

	 





?>