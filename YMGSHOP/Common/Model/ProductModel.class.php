<?php
/**
 * 货品模型
 */
	class ProductModel extends Model{
		/**
		 * [$table 货品表]
		 * @var string
		 */		
		public $table='product';
		/**
		 * [$gid 商品id]
		 * @var [type]
		 */
		private $gid;
		/**
		 * [__init 构造函数]
		 * @return [type] [description]
		 */
		public function __init(){
			$this->gid=Q('gid',0,'intval');
		}
		/**
		 * [$db Model对象模型]
		 * @var [type]
		 */
		public $db;
		/**
		 * [$validate 自动验证货号是否存在]
		 * @var array
		 */
		public $validate=array(
			array('product_sn[]','isHas','货号已存在',2,3)
			);
		/**
		 * [isHas 自动验证货号是否已存在]
		 * @param  [type]  $value [description]
		 * @param  [type]  $msg   [description]
		 * @param  [type]  $arg   [description]
		 * @return boolean        [description]
		 */
		public function isHas($name,$value,$msg,$arg){
			$map['product_sn']=array('EQ',$value);
			return $this->where($map)->find()?$msg:true;
		}
		/**
		 * [getAttr 获取商品属性数据和货品属性数据方法]
		 * @return [type] [description]
		 */
		public function getAttr(){
			$gid=$this->gid?$this->gid:0;
			/**
			 * [$sql 商品属性类型表与商品属性表关联，获得商品属性数据]
			 * @var string
			 */
			$sql="SELECT * FROM shop_attribute a LEFT JOIN shop_goods_attr ga ON a.attr_id=ga.attr_id WHERE goods_gid=$gid AND a.attr_type=1 ORDER BY a.attr_id ASC ";
			$data=$this->db->query($sql);
			/**
			 * [$a 存储同一属性的数据]
			 * @var array
			 */
			$a=array();
			/**
			 * 循环将同一个属性的数据放在一个数组中
			 */
			foreach ($data as  $value) {
				$a[$value['attr_id']][]=$value;
			}
			return $a;
		}

		/**
		 * [getProduct 获得货品数据]
		 * @return [type] [description]
		 */
		public function getProduct(){
			$gid=$this->gid?$this->gid:0;
			/**
			 * [$data 货品数据]
			 * @var [type]
			 */
			$data=$this->where("goods_gid=$gid")->all();
			// p($data);
			foreach ($data as $id => $v) {
				//将商品组合id拆分例如11-12,再将拆分后的id数据存入$map['id']中
				$map['id']=array('IN',explode('-', $v['goods_attr']));
				//找出该商品所有属性数据
				$attr_value_str=M('goods_attr')->where($map)->order("attr_id asc")->getField('attr_value',true);
				$data[$id]['attr_value_str']=$attr_value_str;
			}
			return $data;
		}
		/**
		 * [addProduct 添加货品数据]
		 */
		public function addProduct(){
			/**
			 * [$attr 存放商品属性]
			 * @var array
			 */
			// p($_POST);exit;
			$attrID=array();
			foreach ($_POST['attr'] as $v) {
				foreach ($v as $k => $id) {
					$attrID[$k][]=$id;
				}
			}

			foreach ($attrID as $k => $id) {
				/**
				 * 当有属性为0时，说明没选择属性
				 * 这样的数据就不插入货品表
				 */
				if(array_search(0, $id)!==false){
					continue;
				}
				/**
				 * 当货号或货品库存没有时也不插入货品表
				 */
				if(empty($_POST['product_sn'][$k]) || empty($_POST['product_number'][$k])){
					continue;
				}
				/**
				 * 商品属性组合id
				 */
				$data['goods_attr']=implode('-',$id );
				//货品号
				$data['product_sn']=$_POST['product_sn'][$k];
				//货品库存
				$data['product_number']=$_POST['product_number'][$k];
				//商品id
				// p($data);exit;
				$data['goods_gid']=$this->gid;
				if(!$this->add($data)){
					$this->error='添加失败';
				}
			}
			return true;
		}
		

		/**
		 * [delProduct 删除货品数据]
		 * @return [type] [description]
		 */
		public function delProduct(){
			$product_id=Q('product_id');
			$map['product_id']=array('EQ',$product_id);
			if($this->where($map)->del()){
				return true;
			}else{
				$this->error='删除失败';
			}
		}










	}





?>