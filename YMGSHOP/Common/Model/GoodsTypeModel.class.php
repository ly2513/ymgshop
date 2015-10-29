<?php
/**
 * @author [李勇] <[626375290@qq.com]>
 */
//商品类型模型控制器
	class GoodsTypeModel extends Model{
		public $table="goods_type";
		//自动验证字段
		public $validate=array(
			array('cat_name','nonull','商品类型名不能为空',2,3),
			array('cat_name','isHasCatName','该栏目名已存在',2,3)
		);

		/**
		 *验证模型不同重名
		 * 1 添加时只是验证是否已有类型名称
		 * 2 修改时，如果有除自身以外重名的模型
		 * 
		 */
		// 自动验证字段
		public function isHasCatName($name,$value,$msg,$arg){
			if($id=Q('get.cat_id'))$map['cat_id']=array('NEQ',$id);
			$map['cat_name']=array('EQ',$value);
			return M($this->table)->where($map)->find()?$msg:true; 
		}
		// 添加商品类型名
		public function addGoodsType(){
			if($this->create()){
				if($this->add()){
					// 更新缓存
					$this->updateCache();
					return true;
				}else{
					$this->error='添加商品类型失败';
				}
			}
		}
		// 编辑商品类型
		public function editGoodsType(){
			if($this->create()){
				if($this->save()){
					// 更新缓存
					$this->updateCache();
					return true;
				}else{
					$this->error='编辑商品类型失败';
				}
			}
		}
		// 删除商品类型
		public function deleteGoodsType(){
			$id=Q('cat_id');
			if($this->where("cat_id=$id")->del()){
				$this->updateCache();
				return true;
			}else{
				$this->error='删除失败';
			}
		}
		//更新缓存
		 public function updateCache(){
		 	// 获得商品类型数据
		 	$data=$this->all();
		 	foreach ($data as $value) {
		 		$cache[$value['cat_id']]=$value;
		 	}
		 	// 将商品类型数据缓存到goods_type中
		 	return S('goods_type',$cache);
		 }

	}





?>