<?php
	/**
	 * 购物车控制器
	 */
	class CartController extends Controller{
		/**
		 * [__init 构造函数]
		 * 初始化购物车
		 */
		public function __init(){
			if(!isset($_SESSION['cart'])){
				$_SESSION['cart']=array();
			}
			// 分配省份信息
			$province=M('s_province')->all();
			$this->assign("province",$province);
			
		}
		/**
		 * [index 购物车商品列表数据]
		 * @return [type] [description]
		 */
		public function index (){
			//判断购物车是否为空
			if(!empty($_POST)&& isset($_SESSION['cart']['goods'])){
				$cartId=$_POST['cartId'];
				$num=$_POST['num'];
				/**
				 * 商品已在购物车中，只要更改商品数量
				 */
				//商品数量
				$_SESSION['cart']['goods'][$cartId]['num']=$num;

				//总价
				$_SESSION['cart']['goods'][$cartId]['totalPrice']=floatval($_SESSION['cart']['goods'][$cartId]['price'])*$_SESSION['cart']['goods'][$cartId]['num'];

				//更新本次购物的总价和总数量
				$totalPrice=$totalNum=0;
				foreach ($_SESSION['cart']['goods'] as $value) {
					$totalPrice+=floatval($value['totalPrice']);
					$totalNum+=$value['num'];
				}
				$_SESSION['cart']['totalPrice']=$totalPrice;
				$_SESSION['cart']['totalNum']=$totalNum;
				$_SESSION['cart']['num']=count($_SESSION['cart']['goods']);
				
			}
			// P($_SESSION['cart']);
			$this->display('mycart.html');
		}
		/**
	     * [addcart 把商品加入购物车]
	     * @return [type] [description]
	     */
		public function add(){
			$product_id=Q('post.product_id',0,'intval');
			$gid=Q('post.goods_gid',0,'intval');
			$num=Q('post.num',0,'intval');
			if(!$product_id || !$gid || !$num){
				$this->error('商品不存在',__ROOT__);
			}
			// 购物车id
			$cartId=$this->getCartId($gid,$product_id);
				/**
				 * 新增的货品
				 * 1、价格
				 * 2、属性
				 */
				//新增商品数据
				$goodsdata=M('goods')->find($gid);
				//新增商品的货品数据
				$productdata=M('product')->find($product_id);
				//新增商品属性数据
				$sql="select *,ga.attr_value from shop_attribute a left join shop_goods_attr ga on a.attr_id=ga.attr_id where ga.id in(".str_replace('-',',',$productdata['goods_attr'] ).") order by a.attr_id";
				$goodsattr=M()->query($sql);
				
				//商品品牌
				$branddata=M('brand')->where("bid={$goodsdata['bid']}")->find();
				$_SESSION['cart']['goods'][$cartId]['cartId']=$cartId;
				//商品名称
				$_SESSION['cart']['goods'][$cartId]['goods_name']=$goodsdata['goods_name'];
				//商品的品牌
				$_SESSION['cart']['goods'][$cartId]['brand']=$branddata['brand_name'];
				//商品图片
				$_SESSION['cart']['goods'][$cartId]['img']=$goodsdata['goods_thumb'];
				//商品属性
				$_SESSION['cart']['goods'][$cartId]['goods_attr']=$goodsattr;
				//商品id
				$_SESSION['cart']['goods'][$cartId]['gid']=$gid;
				//商品价格
				$_SESSION['cart']['goods'][$cartId]['price']=$goodsdata['goods_price'];
				//货品id
				$_SESSION['cart']['goods'][$cartId]['product_id']=$product_id;
				//商品数量
				$_SESSION['cart']['goods'][$cartId]['num']=$num;
				//该商品的总价
				$_SESSION['cart']['goods'][$cartId]['totalPrice']=$num*$goodsdata['goods_price'];

				//计算本次购物的总价和总数量
				$totalPrice=$totalNum=0;
				foreach ($_SESSION['cart']['goods'] as $value) {
					$totalPrice+=$value['totalPrice'];
					$totalNum+=$value['num'];
				}
				$_SESSION['cart']['totalPrice']=$totalPrice;
				$_SESSION['cart']['totalNum']=$totalNum;
				$_SESSION['cart']['num']=count($_SESSION['cart']['goods']);
				// 异步立即购买时用到的代码
				echo 1;exit;

			
		}

		private function getCartId($gid,$product_id){
			return $gid.'-'.$product_id;
		}
		/**
		 * [order 填写订单信息]
		 * @return [type] [description]
		 */
		public function order(){
			// 判断购物车是否为空
			if(empty($_SESSION['cart'])){
				$this->error('购物车已清空',U('Cart/index'));
			}
			//显示用户订单界面
			// 获得用户信息
			$uid=$_SESSION['uid'];
			// 获得当前用户的默认收货地址
			$data=M('user_info')->where("uid=$uid and status=1")->find();
			// 获得当前用户的所有地址
			$address=M('user_info')->where("uid=$uid")->all();
			// P($address);
			// 获得用户当前的省份
			$map['ProvinceName']=$data['province'];
			//获得当前省份的所有城市信息
			$ProvinceID=M('s_province')->where($map)->getField('ProvinceID');
			$where['ProvinceID']=$ProvinceID;
			$city=M('s_city')->where($where)->all();
			// 获得当前城市的所有区/县
			$where1['CityName']=$data['city'];
			$CityID=M('s_city')->where($where1)->getField('CityID');
			$where2['CityID']=$CityID;
			$area=M('s_district')->where($where2)->all();
			if($data){
				//分配信息
				$this->assign('data',$data);
				// P($data);
			}else{
				
				// 如果当前用户还没地址信息就添加地址
				// 获得省份数据
				$province=M('s_province')->select();
				// P($province);
				$this->assign('provincedata',$province);
			}
			// 分配城市、地区数据
			$this->assign("city",$city);
			$this->assign("area",$area);
			// 分配用户地址
			$this->assign('address',$address);

			$this->display();
			
		}
		/**
		 * [userInfo 录入用户收货信息]
		 * @return [type] [description]
		 */
		public function userInfo(){
			$_POST['province']=M('s_province')->where("ProvinceID='{$_POST['province']}'")->getField('ProvinceName');
			$_POST['city']=M('s_city')->where("CityID='{$_POST['city']}'")->getField('CityName');
			$_POST['area']=M('s_district')->where("DistrictID='{$_POST['area']}'")->getField('DistrictName');
			if(IS_POST){
				if(M('user_info')->add()){
					echo 1;exit;
				}else{
					echo 0;
					exit;
				}
			}
		}
		/**
		 * [editUserInfo 修改用户收货信息]
		 * @return [type] [description]
		 */
		public function editUserInfo(){
			$_POST['province']=M('s_province')->where("ProvinceID='{$_POST['province']}'")->getField('ProvinceName');
			$_POST['city']=M('s_city')->where("CityID='{$_POST['city']}'")->getField('CityName');
			$_POST['area']=M('s_district')->where("DistrictID='{$_POST['area']}'")->getField('DistrictName');
			if(IS_POST){
				if(M('user_info')->save()){
					echo 1;exit;
				}else{
					echo 0;
					exit;
				}
			}
		}		
		/**
		 * [city 异步加载城市数据]
		 * @return [type] [description]
		 */
		public function city(){
			//获得省份id
			$ProvinceID=Q('ProvinceID',0,'intval');
			//获得该省份的城市数据
			$citydata=M("s_City")->where("ProvinceID=$ProvinceID")->order("CityID asc")->all();
			echo json_encode($citydata);
			exit;
		}
		/**
		 * [city 异步加载城市数据]
		 * @return [type] [description]
		 */
		public function area(){
			//获得省份id
			$CityID=Q('CityID',0,'intval');
			//获得该省份的城市数据
			$areadata=M("s_district")->where("CityID=$CityID")->order("DistrictID asc")->all();
			// p($areadata);
			echo json_encode($areadata);
			exit;
		}
		/**
		 * 删除购物车
		 * @return [type] [description]
		 */
		public function del(){
			//购物车id
			$cartId=Q('cartId');
			//删除某一个购物车商品
			unset($_SESSION['cart']['goods'][$cartId]);
			//计算本次购物的总价和总数量
				$totalPrice=$totalNum=0;
				foreach ($_SESSION['cart']['goods'] as $value) {
					$totalPrice+=$value['totalPrice'];
					$totalNum+=$value['num'];
				}
				//商品总价
				$_SESSION['cart']['totalPrice']=$totalPrice;
				//商品总数
				$_SESSION['cart']['totalNum']=$totalNum;
				// 货品数量
				$_SESSION['cart']['num']=count($_SESSION['cart']['goods']);
				exit;
		}

		/**
		 * [edit_addr 编辑修改地址]
		 * @return [type] [description]
		 */
		public function edit_addr(){
			$addr_id=Q('post.addr_id',0,'intval');
			$addr_data=M('user_info')->where("addr_id=$addr_id")->find();
			// P($addr_data);
			echo json_encode($addr_data);
			exit;
			

		}

		/**
		 * [del_addr 删除地址]
		 * @return [type] [description]
		 */
		public function del_addr(){
			// 地址id
			$addr_id=$_POST['addr_id'];
			$where['addr_id']=$addr_id;
			$status=M('user_info')->where($where)->delete();
			if($status){
				$result['status']=1;
				$result['msg']="删除成功";
				echo json_encode($result);
				exit;
			}else{
				$result['status']=0;
				$result['msg']="删除失败";
				echo json_encode($result);
				exit;
			}
		}


	}

?>