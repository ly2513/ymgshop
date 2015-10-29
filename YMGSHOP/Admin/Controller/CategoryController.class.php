<?php
/**
 * @author 李勇 <[626375290@qq.com]>
 * 栏目管理控制器
 */
	class CategoryController extends AuthController{
		private $db;//栏目模型对象
		private $cid;//栏目id
		public $category;
		public function __init(){
			$this->db=K('Category');//实例化一个栏目模型对象
			$this->category=S('category');//获得栏目数据
			$this->cid=Q('cid',0,'intval');//获得cid
			if($this->cid && isset($this->category[$this->cid])){
				$this->error=('栏目不存在');
			}
		}
		/**
		 * [index  栏目列表]
		 * @return [type] [description]
		 */
		public function index(){
			$this->cid?$map['cid']=array('EQ',$this->cid):$map='';
			$data=$this->db->all();
			$cache=array();
			// 有cid就显示当前栏目下的所有子栏目
			if($this->cid){
				// 获得当前栏目下的所有子栏目数据
				$soncid=Data::channelList($data,$this->cid);
				// 获得当前栏目下所有子栏目的cid
				$allcid=array_keys($soncid);
				// 将当前的cid压入
				$allcid[]=$this->cid;
				$map['cid']=array('IN',$allcid);
				//找出当前栏目下的所有子栏目
				$catdata=$this->db->where($map)->all();
				//有树状结构
				$catdata=Data::tree($catdata,'cat_name');
				foreach ($catdata as $id => $value) {
					$cache[$value['cid']]=$value;
				}
				int_to_string($cache,array('is_show'=>array(0=>'隐藏',1=>'显示')));
			}else{
				//没有cid传过来时，就分配所有栏目
				$catdata=Data::tree($data,'cat_name');
				foreach ($catdata as $id => $value) {
					$cache[$value['cid']]=$value;
				}
				int_to_string($cache,array('is_show'=>array(0=>'隐藏',1=>'显示')));
			}
			$this->assign('data',$cache);
			//分配所有的顶级栏目
			$parentdata=$this->db->where("pid=0")->all();
			$this->assign('parentdata',$parentdata);
			$this->display();
		}
		
		/**
		 * [add 添加栏目]
		 */
		public function add(){
			if(IS_POST){
				if($this->db->addCategory()){
					$this->success("添加栏目成功",'index');
				}else{
					$this->error($this->db->error);
				}
			}else{
				// 分配栏目数据
				$this->assign('category',$this->category);
				$this->display();
			}
		}
		/**
		 * [edit 编辑栏目]
		 * @return [type] [description]
		 */
		public function edit(){
			if(IS_POST){
				if($this->db->editCategory()){
					$this->success("修改栏目成功",'index');
				}else{
					$this->error($this->db->error);
				}
			}else{
				// 分配栏目数据
				$this->assign('category',$this->category);
				// 分配当前要编辑的栏目数据
				$data=$this->db->where("cid=$this->cid")->find();
				$this->assign('data',$data);
				$this->display();
			}
		}
		/**
		 * [delete 删除栏目]
		 * @return [type] [description]
		 */
		public function delete(){
			if($this->db->deleteCategory()){
				$this->success('删除栏目成功');
			}else{
				$this->error($this->db->error);
			}
		}
		/**
		 * [updateCache  更新缓存]
		 * @return [type] [description]
		 */
		public function updateCache(){
			if($this->db->updateCache()){
				$this->success('更新成功','index');
			}else{
				$this->error('更新失败');
			}
		} 

	}




?>