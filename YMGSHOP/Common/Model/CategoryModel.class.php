<?php
/**
 * @author 李勇 <[626375290@qq.com]>
 * 栏目管理模型
 */
	class CategoryModel extends Model{
		public $table='category';
		private $cid;
		public function __init(){
			// 获得当前cid
			$this->cid=Q('cid',0,'intval');
		}
		// 自动验证
		public $validate=array(
			array('cat_name','nonull','栏目不能为空',2,3),
			// array('cat_name','isHasCate','栏目已存在',2,3)
			);
		/**
		 *验证模型不同重名
		 * 1 添加时只是验证是否已有类型名称
		 * 2 修改时，如果有除自身以外重名的模型
		 * 
		 */
		// 自动验证字段
		// public function isHasCate($name,$value,$msg,$arg){
		// 	// 判断有cid就是编辑类型，没有cid就是添加类型
		// 	$this->cid?$map['cid']=array('NEQ',$this->cid):$map='';
		// 	$map['cat_name']=array('EQ',$value);
		// 	return $this->where($map)->find()?$msg:true;

		// }
		//添加栏目
		public function addCategory(){
			if($this->create()){
				if($this->add()){
					if($this->updateCache()){
						return true;
					}
				}
				$this->error='添加栏目失败';
			}
		}
		//编辑栏目
		public function editCategory(){
			if($this->create()){
				if($this->save()){
					if($this->updateCache()){
						return true;
					}
				}
				$this->error='修改栏目失败';
			}
				
		}
		//删除栏目
		public function deleteCategory(){
			$cid=Q("cid");
			// 获得所有的数据
			$data=$this->all();
			// 获得当前栏目下的所有子栏目数据
			$soncid=Data::channelList($data,$cid);
			// 获得当前栏目下所有子栏目的cid
			$allcid=array_keys($soncid);
			// 将当前的cid压入
			$allcid[]=$cid;
			$map['cid']=array('IN',$allcid);
			if($this->where($map)->del()){
				if($this->updateCache()){
					return true;
				}
			}else{
				$this->error='删除栏目失败';
			}
		}




		/**
		 * [updateCache 缓存栏目数据]
		 * @return [type] [description]
		 */
		public function updateCache(){
			// 获得栏目数据
			$data=$this->all();
			// 
			$data=Data::tree($data,'cat_name');
			foreach ($data as $id => $value) {
				$cache[$value['cid']]=$value;
			}
			return S('category',$cache);
		}
	}



?>