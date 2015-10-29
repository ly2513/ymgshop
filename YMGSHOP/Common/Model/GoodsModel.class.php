<?php
/**
 * @author 李勇 <626375290@qq.com>
 * 商品管理模型
 */
	class GoodsModel extends Model{
		public $table='goods';//商品表
		public $gid;
		public function __init(){
			$this->gid=Q('gid',0,'intval');

		} 
		
		// 自动验证
		public $validate=array(
			array('goods_name','nonull','商品名不能为空',2,3),
			array('goods_name','isHas','商品名已经存在',2,3)
			);
		// 自动转时间戳
		public $auto=array(
			array('sale_time','strtotime','function',2,3),
			array('is_hot','isHot','method',2,3),
			array('is_new','isNew','method',2,3),
			array('is_best','isBest','method',2,3),
			);
		/**
		 * [isHas 完成自动验证]
		 * @param  [type]  $name  [description]
		 * @param  [type]  $value [description]
		 * @param  [type]  $msg   [description]
		 * @param  [type]  $arg   [description]
		 * @return boolean        [description]
		 */
		//自动完成is_new
		public function isHot($v){
			return Q('is_hot',0,'');
		}
		//自动完成is_new
		public function isNew($v){
			return Q('is_new',0,'');
		}
		public function isBest($v){
			return Q('is_best',0,'');
		}
		/**
		 * [isHas 检测是添加自动检测还是编辑自动检测]
		 * @param  [type]  $name  [description]
		 * @param  [type]  $value [description]
		 * @param  [type]  $msg   [description]
		 * @param  [type]  $arg   [description]
		 * @return boolean        [description]
		 */
		public function isHas($name,$value,$msg,$arg){
			$map['gid']=$this->gid?array('NEQ',$this->gid):'';
			$map['goods_name']=array('EQ',$value);
			return M('goods')->where($map)->find()?$msg:true;
		} 

		/**
		 * [getAll 获得所有商品的数据]
		 * @return [type] [description]
		 */
		public function getAll(){
			//获得数据数量
			$count=$this->where("status=1")->count();
			// 实例化页码对象，每页显示2条
			$page=new Page($count,10);
			// 关联goods表和category表
			$data=$this->join("__goods__ g INNER join __category__ c ON  g.cid=c.cid")->where("g.status=1")->order("gid asc")->limit($page->limit())->all();
			// 将商品数据和页码数据存到$alldata数组中
			$alldata=array('data'=>$data,'page'=>$page->show());
			return $alldata;
		}

		/**
		 * [addGoods 添加商品]
		 */
		public function addGoods(){
			// 自动验证
			if($this->create()){
				if($goods_gid=$this->add()){
					/**
					 * $goods_gid为商品id
					 */
					/**
					 * 设置货号
					 */
					$this->setGoodsSn($goods_gid);
					/**
					 * 添加附表数据
					 */
					$_POST['goods_gid']=$goods_gid;
					M('goods_data')->add();

					/**
					 * 添加商品属性数据
					 */
					$db=K('GoodsAttr');
					
					$db->addAttr($goods_gid);

					/**
					 * 处理首页列表页图片的处理
					 */
					$this->indexImg($goods_gid);
					/**
					 * 处理详情页图片的处理
					 */
					$this->galleryImg($goods_gid);
					return true;
				}else{
					$this->error='添加失败';
				}
			}
		}
		/**
		 * [editGoods 修改商品]
		 * @return [type] [description]
		 */
		public function editGoods(){
			// 自动验证
			if($this->create()){
				if($this->save()){
					// p($_POST);exit;
					//将商品id付给附表主键
					$gd_id=Q('gid');
					// 压入附表主键gd_id,修改附表数据
					$_POST['goods_gid']=$gd_id;
					// 修改商品副表数据
					M('goods_data')->save();
					// 处理首页列表页图片的处理
					$this->indexImg($gd_id);
					// 处理详情页图片的处理
					$this->galleryImg($gd_id);
					/**
					 * 向商品属性表中添加数据
					 */
					$db=K('GoodsAttr');

					$db->addAttr($gd_id);
					return true;
				}else{
					$this->error='编辑失败';
				}
			}
		}
		/**
		 * [setGoodsSn 设置货号]
		 * 当商品没有添加货号时，系统自动添加货号
		 * @param [type] $gid [商品id]
		 */
		private function setGoodsSn($gid){
			if(empty($_POST['goods_sn'])){
				$goods_sn='ymg_'.str_pad($gid,6,0, STR_PAD_LEFT);
				$data=array(
					'gid'=>$gid,
					'goods_sn'=>$goods_sn,
					);
				$this->save($data);
			}
		}
		/**
		 * [delGoods 删除商品]
		 * @return [type] [description]
		 */
		public function delGoods(){
			$gid=Q('gid');//获得当前要删除商品的gid
			//获得当前要删除商品的所有数据
			$data=$this->where("gid=$gid")->find();
			// 对商品的图片进行删除
			is_file($data['original_img']) and unlink($data['original_img']);
			is_file($data['goods_img']) and unlink($data['goods_img']);
			is_file($data['goods_thumb']) and unlink($data['goods_thumb']);
			//删除详情图片
			$galleryImgdata=M('goods_gallery')->where("goods_gid=$gid")->all();
			foreach ($galleryImgdata as  $img) {
				$_POST['gallery_id']=$img['gallery_id'];
				$this->delGalleryImg();
			}
			//删除附表数据
			M('goods_data')->where("goods_gid=$gid")->del();
			//删除属性表数据
			M('goods_attr')->where("goods_gid=$gid")->del();
			// 删除商品数据
			if($this->where("gid=$gid")->del()){
				return true;
			}else{
				$this->error='删除商品失败';
			}

		}
		/**
		 * [delGalleryImg 删除详情页中的图片]
		 * @return [type] [description]
		 */
		public function delGalleryImg(){
			//获得详细图片表的id
			$gallery_id=$_POST['gallery_id'];
			$data=M('goods_gallery')->where("gallery_id=$gallery_id")->find();
			//删原图
			is_file($data['img_original']) and unlink($data['img_original']);
			//删中图
			is_file($data['img_url']) and unlink($data['img_url']);
			//删小图
			is_file($data['thumb_url']) and unlink($data['thumb_url']);
			
			if(M('goods_gallery')->where("gallery_id=$gallery_id")->del()){
				return true;
			}else{
				$this->error='删除失败';
			}

		}



		/**
		 * [indexImg 对列表页、首页的图片进行处理]
		 * @param  [type] $gid [商品的id]
		 * @return [type]      [description]
		 */
		public function indexImg($gid){
			//上传失败直接返回
			if($_FILES['original_img']['error']!=0) return;
			//允许上传
			$upload=new Upload('Upload/goodsimage/'.date('Y/m/d'));
			$file=$upload->upload('original_img');
			// P($file);
			//上传失败
			if(empty($file)) return;
			$file=$file[0];
			// 列表页图片路径
			$listpath=$file['dir'].$file['filename'].'_list_187X253.'.$file['ext'];
			//首页图列表
			$indexpath=$file['dir'].$file['filename'].'_thumb_385X520.'.$file['ext'];
			//缩略图
			$img=new Image();
			//缩略首页页图片
			$img->thumb($file['path'],$indexpath,385,520,6);
			//缩略列表页图片
			$img->thumb($file['path'],$listpath,187,253,6);
			$data=array(
				'gid'=>$gid,//商品id
				'original_img'=>$file['path'],//原图路径
				'goods_img'=>$indexpath,//首页图
				'goods_thumb'=>$listpath,//列表页图
			);
			return M('goods')->save($data);
		}
		/**
		 * [galleryImg 处理详情页图片]
		 * @param  [type] $gid [商品图片]
		 * @return [type]      [description]
		 */
		public function galleryImg($gid){
			// p($_FILES);
			// 如果上传失败或没有图片上传时，就返回不处理
			foreach ($_FILES['img_original']['error'] as  $value) {
				if($value!=0) return;
			}
			//允许上传,设置图片存储目录
			$upload=new Upload('Upload/goodsimage/'.date('Y/m/d'));
			//上传要上传的图片
			$file=$upload->upload('img_original');
			//上传失败
			if(empty($file)) return;
			//实例化一个缩略图对象
			
			$img=new Image();
			foreach ($file as $f) {
				//详情页中图
				$img_url=$f['dir'].$f['filename'].'_385X520_.'.$f['ext'];
				//详情页小图
				$thumb_url=$f['dir'].$f['filename'].'_120X162_thumb.'.$f['ext'];
				//对原图进行缩略
				$img->thumb($f['path'],$img_url,385,520,6);
				$img->thumb($f['path'],$thumb_url,120,162,6);
				if(filesize($f['path'])==filesize($img_url)){
					$f['path']='';
				}
				$data=array(
					'goods_gid'=>$gid,//商品图片id
					'img_url'=>$img_url,//商品中图
					'thumb_url'=>$thumb_url,//商品缩略图
					'img_original'=>$f['path']//原图
					);
				// 向商品图片表中存入数据
				 M('goods_gallery')->add($data);
			}	
		}
		
	}


?>