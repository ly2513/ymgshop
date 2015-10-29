<?php
/**
 * 回收站控制器
 */
	class RecycleController extends AuthController{
		/**
		 * [$db 商品模型]
		 * @var [type]
		 */
		private $db;
		/**
		 * [__init 构造函数]
		 * @return [type] [description]
		 */
		public function __init(){
			//实例化商品模型对象
			$this->db=K('Goods');
		}
		/**
		 * [index 回收站商品显示列表]
		 * @return [type] [description]
		 */
		public function index(){
			$data=M('goods')->where("status=0")->all();
			
			$this->assign('data',$data);
			$this->display();
		}
		/**
		 * [update 更该商品状态]
		 * @return [type] [description]
		 */
		public function update(){
			$_POST['gid']=Q('gid');
			$_POST['status']=0;
			if($this->db->save()){
				$this->success('回收成功','Goods/index');
			}else{
				$this->error('回收失败','Goods/index');
			}
		}
		/**
		 * [restore 还原商品数据]
		 * @return [type] [description]
		 */
		public function restore(){
			$_POST['gid']=Q('gid');
			$_POST['status']=1;
			if($this->db->save()){
				$this->success('还原成功','index');
			}else{
				$this->error('还原失败','index');
			}
		}
		public function del(){
			if($this->db->delGoods()){
				$this->success('删除成功');
			}else{
				$this->error('删除失败');
			}
		}


	}






?>