<?php
	/**
	 * 自定义标签类
	 */
	class ContentTag{
		public $tag=array(
			//读取栏目标签
			'categorylist'=>array('block'=>1,'level'=>4),
			//读取某栏目下的商品数据标签
			'goodslist'=>array('block'=>1,'level'=>4),
			//读取某件商品的图片标签
			'imglist'=>array('block'=>1,'level'=>4),
			//获得某件商品的颜色属性标签
			'colorlist'=>array('block'=>1,'level'=>4),
			//获得商品的普通属性
			'attrlist'=>array('block'=>1,'level'=>4),
			//获得该商品的属性的值
			'attrvaluelist'=>array('block'=>1,'level'=>4),
		);
		/**
		 * [_categorylist 读取栏目标签]
		 * @param  [type] $attr    [description]
		 * @param  [type] $content [description]
		 * @return [type]          [description]
		 */
		public function _categorylist($attr,$content){
			//栏目id
			$cid=isset($attr['cid'])?$attr['cid']:'""';
			//显示多少个子栏目
			$row=isset($attr['row'])?$attr['row']:20;
			$php=<<<php
				<?php
					\$cid=$cid;
					\$row=$row;
					//实例化栏目模型对象
					\$db=M('category');
					//获得当前栏目的子栏目
					\$data=\$db->where('pid='.\$cid)->order("cid asc")->limit(\$row)->all();
					foreach (\$data as  \$field):
						
				?>
php;
				$php.=$content;
				$php.="<?php endforeach;?>";
				return $php;
		}
		/**
		 * 由于列表页显示当前栏目级子栏目所有的商品
		 * [_goodslist 商品数据标签]
		 * @param  [type] $attr    [description]
		 * @param  [type] $content [description]
		 * @return [type]          [description]
		 */
		public function _goodslist($attr,$content){
			$cid=isset($attr['cid'])?$attr['cid']:'""';
			$row=isset($attr['row'])?$attr['row']:100;
			$php=<<<php
				<?php 
					\$cid=$cid;
					\$row=$row;
					//获得所有的栏目数据
					\$allcate=M('category')->all();
					// 找到当前栏目的所有子栏目数据
					\$allcid=Data::channelList(\$allcate,\$cid);
					//获得当前栏目的子栏目cid
					\$allcid = array_keys(\$allcid);
					//将当前的栏目的cid压入
					\$allcid[]=\$cid;
					\$map['cid']=array('IN',\$allcid);
					//获得当前栏目的所有子栏目的商品数据
					\$data=M('goods')->where(\$map)->limit(\$row)->all();
					foreach (\$data as \$field) :
						// p(\$field);
					?>
php;
			$php.=$content;
			$php.="<?php endforeach; ?>";
			return $php;
		}
		/**
		 * [_imglist 获得某件商品的详情页图片数据]
		 * @param  [type] $attr    [description]
		 * @param  [type] $content [description]
		 * @return [type]          [description]
		 */
	 	public function _imglist($attr,$content){
	 		$gid=$attr['gid'];
	 		$row=$attr['row'];
	 		$php=<<<php
	 			<?php
	 				\$gid=$gid;
	 				//获得当前商品的详情页图片
	 				\$data=M('goods_gallery')->where("goods_gid=\$gid")->all();
					foreach (\$data as \$field):
	 			?>
php;
			$php.=$content;
			$php.="<?php endforeach;?>";
			return $php;
	 	} 
	 	
		/**
		 * [_attrvaluelist 获取商品的属性]
		 * @param  [type] $attr    [description]
		 * @param  [type] $content [description]
		 * @return [type]          [description]
		 */
		public function _attrvaluelist($attr,$content){
			$gid=$attr['gid'];
			$php=<<<php
				<?php
				// 获取某件商品的属性
					\$sql="select *,ga.attr_value from shop_goods_attr ga join shop_attribute a on ga.attr_id=a.attr_id where ga.goods_gid=\$gid";
					\$data=M()->query(\$sql);
					foreach (\$data as \$field):
				?>
php;
				$php.=$content;
				$php.="<?php endforeach;?>";
				return $php;
		}








	}






?>