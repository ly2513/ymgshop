<?php
/**
 * @author 李勇 <626375290@qq.com>
 * 商品管理控制器
 */
	class GoodsController extends AuthController{
		private $db;//模型
		private $ad;//商品属性模型
		public $category;//栏目缓存数据
		public $goodstype;//商品类型缓存数据
		public $brand;//商品品牌
		// 构造函数
		public function __init(){
			$this->db=K('Goods');//实例化商品模型
			$this->ad=K('GoodsAttr');//实例化商品属性模型
			$this->category=S('category');//获得栏目数据
			$this->goodstype=S('goods_type');//获得商品类型数据
			$this->brand=S('brand');//获得品牌数据
		}
		/**
		 * [index 获得商品列表]
		 * @return [type] [description]
		 */
		public function index(){

			$data=$this->db->getAll();
			// p($goodsdata);
			// P($goodsdata);
			// 分页
			
			int_to_string($data['data'],array('is_on_sale'=>array(0=>'下架',1=>'上架')));
			
			// 分配商品数据
			$this->assign('goodsdata',$data['data']);
			//分配页码数据
			$this->assign('page',$data['page']);
			$this->display();
		}
		/**
		 * [add 添加商品列表]
		 */
		public function add(){
			if(IS_POST){
				if($this->db->addGoods()){
					$this->success('添加商品成功','index');
				}else{
					$this->error($this->db->error);
				}
			}else{
				// 分配品牌数据
				$this->assign('brand',$this->brand);
				// 分配栏目数据
				$this->assign('category',$this->category);
				// 分配商品类型
				$this->assign('goodstype',$this->goodstype);
				$this->display();
			}
		}
		/**
		 * [edit 编辑商品]
		 * @return [type] [description]
		 */
		public function edit(){
			if(IS_POST){
				if($this->db->editGoods()){
					$this->success('修改商品成功','index');
				}else{
					$this->error($this->db->error);
				}
			}else{
				// 分配品牌数据
				$this->assign('brand',$this->brand);
				// 分配栏目数据
				$this->assign('category',$this->category);
				// 分配商品类型
				$this->assign('goodstype',$this->goodstype);
				// 获得当前修改的商品数据
				$gid=Q('gid');
				$data=$this->db->where("gid=$gid")->find();
				$this->assign('data',$data);
				// 分配附表数据
				$goods_data=M('goods_data')->where("gd_id=$gid")->find();
				$this->assign('goods_data',$goods_data);
				//分配商品图片表数据
				$goods_gallery=M('goods_gallery')->where("goods_gid=$gid")->all();
				$this->assign('goods_gallery',$goods_gallery);
				$this->display();
			}
		}
		/**
		 * [del 删除商品]
		 * @return [type] [description]
		 */
		public function del(){
			if($this->db->delGoods()){
				$this->success("删除成功",'index');
			}else{
				$this->error($this->db->error);
			}
		}
		/**
		 * [deleteImg 删除详情页图片]
		 * @return [type] [description]
		 */
		public function deleteImg(){
			
			if($this->db->delGalleryImg()){
				$this->success('删除成功');
			}else{
				$this->error($this->db->error);
			}
			
		}
		/**
		 * [getAttr 获得商品属性]
		 * @return [type] [description]
		 */
		public function getAttr(){
			//获得商品属性所需的录入方式
			$data=$this->ad->get();
			$this->assign('data',$data);
			$this->display();
		}

		/**
		 * [isHot 异步修改热销状态]
		 * @return boolean [description]
		 */
		public function isHot(){
			// p($_POST);
			$this->db->save();
			$data=$this->db->find(Q('gid'));
			$ishot=$data['is_hot'];
			echo $ishot;
			exit;
		}

		/**
		 * [isHot 异步修改新品状态]
		 * @return boolean [description]
		 */
		public function isnew(){
			$this->db->save();
			$data=$this->db->find(Q('gid'));
			$isnew=$data['is_new'];
			echo $isnew;
			exit;
		}

		/**
		 * [isHot 异步修改精品状态]
		 * @return boolean [description]
		 */
		public function isbest(){
			// p($_POST);
			$this->db->save();
			$data=$this->db->find(Q('gid'));
			$isbest=$data['is_best'];
			echo $isbest;
			exit;
		}
		/**
		 * [isHot 异步修改上架状态]
		 * @return boolean [description]
		 */
		public function isonsale(){
			// p($_POST);
			$this->db->save();
			$data=$this->db->find(Q('gid'));
			$isonsale=$data['is_on_sale'];
			echo $isonsale;
			exit;
		}


	}



?>