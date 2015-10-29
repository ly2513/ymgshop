
<?php
	class IndexModel extends Model{
		public $table='goods_favorite';

		// 获得收藏夹
		public function sc(){
			$uid=$_SESSION['uid'];
			//获得当前用户的收藏商品
			$goods=M('goods_favorite')->where("uid=$uid")->all();
			
			$data=array();
			// 关联数组
			foreach ($goods as $id => $v) {
				$data[]=M('goods')->where("gid={$v['gid']}")->getField('gid,goods_name,goods_price,goods_thumb');
			}
			// p($data);
			return $data;
		}
	}




?>