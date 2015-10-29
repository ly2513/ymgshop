<?php
/**
 * @author [李勇] <[626375290@qq.com]>
 */
// 商品属性控制器
	class AttributeController extends AuthController{
		private $db;//商品属性模型
		private $cat_id;//商品类型id
		private $data;//商品类型数据
		private $attr_id;//商品属性id
		public function __init(){
			$this->db=K('Attribute');
			$this->cat_id=Q('cat_id',0,'intval');
			$this->attr_id=Q('attr_id',0,'intval');
			

		}
		/**
		 * [index 显示商品属性列表]
		 * @return [type] [description]
		 */
		public function index(){
			// 获得当前商品类型的属性数据
			$this->cat_id?$map['cat_id']=array('EQ',$this->cat_id):$map='';
			$this->data=$this->db->where($map)->all();

			int_to_string($this->data,array('attr_type'=>array(0=>'普通属性',1=>'规格属性')));
			int_to_string($this->data,array('attr_input_type'=>array(1=>'文本框',2=>'下拉列表',3=>'文本域')));
			// 分配商品类型属性数据
			$this->assign('data',$this->data);
			/**
			 * 分配商品类型
			 * 为了选择商品类型显示属性
			 */
			$this->assign('goods_type',S('goods_type'));
			$this->display();
		}
		/**
		 * [add 添加商品属性]
		 */
		public function add(){
			// 有post数据，就执行添加
			if(IS_POST){
				if($this->db->addattr()){
					$this->success('添加属性成功','index');
				}else{
					$this->error($this->db->error);
				}
			}else{
				// 没有post数据，就显示模板
				// 分配商品类型数据
				$this->assign('goods_type',S('goods_type'));
				$this->display();
			}
		}
		/**
		 * [edit  编辑属性]
		 * @return [type] [description]
		 */
		public function edit(){
			// 有post数据，就执行添加
			if(IS_POST){
				if($this->db->editattr()){
					$this->success('添加属性成功','index');
				}else{
					$this->error($this->db->error);
				}
			}else{
				// 没有post数据，就显示模板
				// 把商品类型数据分配过去
				$field=S('goods_type');
				$this->assign('field',$field);

				// 分配当前的属性数据
				$attrdata=$this->db->where("attr_id=$this->attr_id")->find();
				$c='';
				if (!empty($attrdata['attr_value'])) {
					// 反序列化属性值
					$a=unserialize($attrdata['attr_value']);
					foreach ($a as $value) {
						$c.=$value;
					}
					$attrdata['attr_value']=$c;
				}
				$this->assign('attrdata',$attrdata);
				$this->display();
			}
		}
		/**
		 * [del 删除属性]
		 * @return [type] [description]
		 */
		public function del(){
			if($this->db->deleteattr()){
				$this->success("删除属性成功",'index');
			}else{
				$this->error($this->db->error);
			}
		}







	}




?>