<?php
/**
 * @author 李勇 <[626375290@qq.com]>
 */
	class AttributeModel extends Model{
		public $table="attribute";
		// 自动验证
		public $validata=array(
			array('attr_name','nonull','属性名不能为空',2,3),
			/**
			 * 属性值的验证
			 * 录入方式为下拉列表时进行验证，其他方式没有这个值
			 * 就不进行验证
			 */
			array('attr_value','nonull','属性值不能为空',1,3)
			);
		/**
		 * 添加自动反序列化属性值
		 */
		public $auto=array(
			array('attr_value','autoAttrValue','method',1,3)
		);
		public function autoAttrValue($v){
			$b=explode("\n", $v);
			return serialize($b);
		}
		// 添加属性
		public function addattr(){
			if($this->create()){
				if($this->add()){
					return true;
				}else{
					$this->error='添加属性失败';
				}
			}
		}
		// 编辑属性
		public function editattr(){
			if($this->create()){
				if($this->save()){
					return true;
				}else{
					$this->error='编辑属性失败';
				}
			}
		}
		// 删除属性
		public function deleteattr(){
			$attr_id=Q('attr_id');
			if($this->where("attr_id=$attr_id")->del()){
				return true;
			}else{
				$this->error='删除属性失败';
			}
		}

	}




?>