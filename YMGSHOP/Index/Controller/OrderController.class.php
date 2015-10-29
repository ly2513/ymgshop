<?php
/**
 * 订单控制器
 */
	class OrderController extends Controller{
		/**
		 * 订单提交成功，显示支付界面
		 * @return [type] [description]
		 */
		public function index(){
			// 判断购物车是否清空
			if(empty($_SESSION['cart'])){
				$this->error('购物车已清空',U("Cart/index"));
			}
			// 获得要支付的钱和支付方式
			$totalprice=Q('price',0,'floatval');
			$payway=Q('payway',0,'string');
			// 获取收货人信息
			$uid=$_SESSION['uid'];
			$userInfo=M('user_info')->where("uid=$uid")->find();
			// p($userInfo);
			$data=array();
			// 用户id
			$data['uid']=$uid;
			// 收货人姓名
			$data['consignee']=$userInfo['name'];
			// 收货地址
			$data['address']=$userInfo['addr_content'];
			// 手机联系方式
			$data['mobile']=$userInfo['phone'];
			// 电话联系方式
			$data['tel']=$userInfo['tel'];
			// 邮编
			$data['zipcode']=$userInfo['postcode'];
			// 价格总计
			$data['amount']=$totalprice;
			// 订单号(业务编码+年后3位+月+日+后三位随机编码)
			$data['order_sn']='SN'.substr(date('Y'),1).date('m').date('d').mt_rand(100,999);
			// 订单生成时间
			$data['add_time']=time();
			// 将订单信息压入order表中
			M('order')->add($data);
			//向订单列表压入数据
			$this->orderList($data['order_sn']);
			$this->assign('totalprice',$totalprice);
			$this->assign('order_sn',$data['order_sn']);
			$this->assign('payway',$payway);
			// 删除购物车
			unset($_SESSION['cart']);
			
			$this->display('order-success.html');
		}
		// 获得要支付的钱和支付方式
		public function getPayInfo(){
			// 获得要支付的钱和支付方式
			$totalprice=Q('totalPrice',0,'intval');
			$payway=Q('payway',0,'intval');
			echo 1;exit;
		}
		/**
		 * [orderList 订单列表]
		 * @return [type] [description]
		 */
		private function orderList($order_sn){
			// 获得当前订单号的数据
			$order=M('order')->where("order_sn='$order_sn'")->find();
			// p($_SESSION['cart']['goods']);
			$data=array();
			foreach ($_SESSION['cart']['goods'] as $id => $goods) {
				// 存入订单id
				$data['order_id']=$order['order_id'];
				// 压入商品名称
				$data['goods_name']=$goods['goods_name'];
				// 压入商品价格
				$data['goods_price']=$goods['price'];
				// 压入商品id
				$data['goods_gid']=$goods['gid'];
				// 获得当前商品数据
				$gid=$goods['gid'];
				$goodsdata=M('goods')->where("gid=$gid")->find();
				// p($goodsdata);
				// 压入市场价
				$data['market_price']=$goodsdata['market_price'];
				// 压入商品的属性
				$data['goods_attr']='';
				foreach ($goods['goods_attr'] as $attr) {
					$data['goods_attr'].=$attr['attr_name'].':'.$attr['attr_value'].'|';
				}
				// 商品的数量
				$data['goods_number']=$goods['num'];
				// 商品货号
				$data['goods_sn']=$goodsdata['goods_sn'];
				// 货品货号
				$productdata=M("product")->where("product_id={$goods['product_id']}")->find();
				$data['product_sn']=$productdata['product_sn'];
				// 将数据压入订单列表中
				M('order_goods')->add($data);
			}

		}
	}





?>