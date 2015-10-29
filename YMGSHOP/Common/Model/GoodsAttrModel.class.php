<?php
/**
 * 商品属性表模型
 */
	class GoodsAttrModel extends Model{
		/**
		 * [$table 商品属性表]
		 * @var string
		 */
		public $table='goods_attr';

		/**
		 * [addAttr 添加商品属性]
		 * @param [type] $gid [商品id]
		 */
		public function addAttr($gid){
			/**
			 * 用来存储要添加的商品属性数据
			 * @var array
			 */
			$data=array();
			/**
			 * 不存在属性id时，就不进行处理
			 */
			if(isset($_POST['attr_id_list'])){
				/**
				 * [循环添加属性]
				 * @var [type]
				 */
				foreach ($_POST['attr_id_list'] as $id => $attr_id) {
					//商品属性值
					$attr_value=$_POST['attr_value_list'][$id];
					//规格属性的附加价格
					$attr_price=$_POST['attr_price_list'][$id];
					$tmp=array(
						'attr_value'=>$attr_value,//商品属性值
						'attr_price'=>$attr_price,//规格属性的附加价格
						'attr_id'=>$attr_id,//商品属性类型id
						'goods_gid'=>$gid,//商品id
						);
					//没有属性值时，不添加
					if(empty($attr_value)){
						continue;
					}
					//获得属性类型，0普通属性，1规格属性
					$attr_type=M('attribute')->where("attr_id=$attr_id")->getField('attr_type');
					// p($attr_type);exit;
					//规格属性时,获得属性值
					if($attr_type==1){
						$map['attr_value']=$attr_value;
					}
					//商品id
					$map['goods_gid']=$gid;
					//属性类型id 
					$map['attr_id']=$attr_id;
					//获得当前已存在要修改的商品属性数据的id
					$id=M('goods_attr')->where($map)->getField('id');
					//修改当前属性数据
					if($id){
						$tmp['id']=$id;
					}
					$data[]=$tmp;
				}
				/**
				 * 删除旧数据
				 */
				 M('goods_attr')->where("goods_gid=$gid")->del();
				/**
				 * 循环添加商品属性数据
				 */
				foreach ($data as  $value) {
					M('goods_attr')->add($value);
				}
			}else{
				return false;
			}
		}


		/**
		 * [get 获得商品属性添加与编辑]
		 * @return [type] [description]
		 */
		public function get(){
			// 获得商品id
			$gid=Q('gid');
			// p($_POST);
			//获得商品类型id
			$cat_id=Q('cat_id',0,'intval');

			//有gid就是编辑属性,没有就是添加属性
			if($gid){
				//获得该商品属性的数据
				 $sql = "select *,a.attr_value default_value,a.attr_id attr_id from shop_attribute AS a LEFT JOIN
                  (SELECT * FROM shop_goods_attr AS ga where goods_gid=$gid) AS c
                  ON a.attr_id=c.attr_id WHERE a.cat_id=$cat_id";
				//获得属性数据
				$data=$this->query($sql);
				// p($data);ex
			}else{
				//添加商品,找出该栏目下所有属性数据
				$data=M('attribute')->field("*,attr_value default_value")->where("cat_id=$cat_id")->all();

			}
			// 数据录入类显示方式
			$method=array(1=>'_text',2=>'_select',3=>'_textarea');
			/**
			 * [$recordAttr 记录已处理的属性]
			 * 用于计算[+] [-] js代码使用
			 * @var array
			 */
			$recordAttr=array();

			foreach ($data as $id => $value) {
				/**
				 * 动作如_text _select等，处理表单显示样式的方法
				 */
				$type=$method[$value['attr_input_type']];
				/**
				 * [$html 获得表单样式]
				 */
				$html=$this->$type($value);
				/**
				 * 当商品显示方式为下拉列表时，获得商品属性的附加价格
				 */
				if($value['attr_type']==1){
					/**
					 * [$attr_price 商品附加价格]
					 */
					$attr_price=isset($value['attr_price'])?$value['attr_price']:'';

					$html.="&nbsp&nbsp附加价格：<input type='text'name='attr_price_list[]' value='{$attr_price}'/>&nbsp&nbsp元";
				}else{
					$html.="<input type='hidden' name='attr_price_list[]' value='0'/>";
				}
				/**
				 * 属性id
				 */
				$html.="<input type='hidden' name='attr_id_list[]' value='{$value['attr_id']}'/>";
				$data[$id]['html']=$html;
				/**
				 * 规格属性设置Javascript[+][-]
				 */
				if($value['attr_type']==1){
					if(in_array($value['attr_id'],$recordAttr)){
						$data[$id]['attr_name']="<a href='javascript:;' onclick='removeAttr(this)'><i class='iconfont'>&#xf0176;</i></a>".$value['attr_name'];
					}else{
						$data[$id]['attr_name']="<a href='javascript:;' onclick='addAttr(this)'><i class='iconfont'>&#xf0175;</i></a>".$value['attr_name'];
					}
					/**
					 * 已处理的属性id
					 */
					$recordAttr[]=$value['attr_id'];
				}

			}
			return $data;
		}
		/**
		 * [_text 商品属性录入类型为文本框的函数]
		 * @param  [type] $attr [description]
		 * @return [type]       [description]
		 */
		public function _text($attr){
			//获得属性id
			$name=$attr['attr_id'];
			//获得属性值
			$value=$attr['attr_value'];
			//属性值
			$html="<input type='text' name='attr_value_list[]' value='$value'/>";
			return  $html;
		}
		/**
		 * [_select 商品属性录入类型为下拉列表框的函数]
		 * @param  [type] $attr [description]
		 * @return [type]       [description]
		 */
		public function _select($attr){
			//获得属性id
			$name=$attr['attr_id'];
			//对attr_type的值进行反序列化
			$data=unserialize($attr['default_value']);
			$html="<select name='attr_value_list[]' >";
				foreach ($data as  $value) {
					$select=trim($attr['attr_value'])==trim($value)?"selected=''":'';
					$html.="<option  $select >{$value}</option>";
				}
			$html.="</select>";
			return $html;
		}
		/**
		 * [_textarea 商品属性录入类型为文本域的函数]
		 * @param  [type] $attr [description]
		 * @return [type]       [description]
		 */
		public function _textarea($attr){
			
			$value=$attr['attr_value'];
			return "<textarea name='attr_value_list[]'>{$value}</textarea>";
		}


	}





?>