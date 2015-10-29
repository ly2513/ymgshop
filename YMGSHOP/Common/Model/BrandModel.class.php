<?php
	/**
	 * @author 李勇 <626375290@qq.com>
	 * 品牌管理模型
	 */
	class BrandModel extends Model{
		public $table='brand';//品牌表
		public $bid;//品牌id
		
		// 自动验证
		public $validate=array(
			array('brand_name','nonull','品牌名不能为空',2,3),
			array('brand_name','isHasBrand','品牌名已经存在',2,3)
			);
		// 自动验证字段(对添加、编辑进行自动验证)
		public function isHasBrand($name,$value,$msg,$arg){
			// 存在bid就是编辑类型，没有bid就是添加类型
			$this->bid=Q('bid');
			$this->bid?$map['bid']=array('NEQ',$this->bid):$map="";
			$map['brand_name']=array('EQ',$value);
			return $this->where($map)->find()?$msg:true;

		}
		// 自动处理上传
		public $auto=array(
			array('brand_logo','autoLogo','method',2,3)
			);
		public function autoLogo($v){
			if(empty($v)) return $v; 
			$v=current($v);
			return $v['path'];
		}
		//添加品牌
		public function addBrand(){
			// 自动验证
			if($this->create()){
				if($this->add()){
					return true;
				}else{
					$this->error="添加品牌失败";
				}
			}
		}
		//修改品牌
		public function editBrand(){
			// 自动验证
			if($this->create()){
				if($this->save()){
					return true;
				}else{
					$this->error="修改品牌失败";
				}

			}
		}
		// 删除品牌
		public function deleteBrand(){
			$bid=Q('bid');
			$data=$this->where("bid=$bid")->find();
			// 删除品牌的同时删除品牌logo
			is_file($data['brand_logo']) and unlink($data['brand_logo']);
			if($this->where("bid=$bid")->del()){
					return true;
				}else{
					$this->error="删除品牌失败";
				}
		}
		/**
		 * 缓存品牌数据
		 */
		public function updateCache(){
			$data=$this->all();//获得所有的品牌数据
			$cache=array();
			foreach ($data as $value) {
				$cache[$value['bid']]=$value;
			}
			return S('brand',$cache);
		}

	}




?>