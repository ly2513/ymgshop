<?php
/**
 * 订单管理控制器
 */
	class OrderController extends AuthController{
		private $db;
		public function __init(){
			$this->db=K('Order');
		}
		/**
		 * 获得待付款订单
		 * @return [type] [description]
		 */
		public function index(){
			$data=$this->db->getAll();
			int_to_string($data['data'],array('order_status'=>array(0=>'待付款',1=>'已付款',2=>'已取消')));
			$this->assign('data',$data['data']);
			$this->assign('page',$data['page']);
			$this->display();
		}
		/**
		 * 已付款订单列表
		 * @return [type] [description]
		 */
		public function solve(){
			// 获得已付款订单数据
			$data=$this->db->solveOrder();
			int_to_string($data['data'],array('order_status'=>array(0=>'待付款',1=>'已付款',2=>'已取消')));
			$this->assign('data',$data['data']);
			$this->assign('page',$data['page']);
			$this->display();
		}
		/**
		 * 已取消订单列表
		 * @return [type] [description]
		 */
		public function cancel(){
			// 获得已取消订单数据
			$data=$this->db->cancelOrder();
			int_to_string($data['data'],array('order_status'=>array(0=>'待付款',1=>'已付款',2=>'已取消')));
			$this->assign('data',$data['data']);
			$this->assign('page',$data['page']);
			$this->display();
		}
		/**
		 * 订单信息
		 * @return [type] [description]
		 */
		public function orderInfo(){
			$order_id=Q('order_id',0,'intval');
			$orderdata=$this->db->join("__order_goods__ og join __order__ o on og.order_id=o.order_id")->where("o.order_id=$order_id")->all();
			p($orderdata);

		} 
		/**
		 * 订单处理
		 */
		public function update(){
			if($this->db->updateOrder()){
				$this->success('订单处理成功');
			}else{
				$this->error($this->db->error);
			}
		} 
		/**
		 * 删除订单
		 * @return [type] [description]
		 */
		public function del(){
			$order_id=Q('order_id',0,'intval');
			// 删除订单列表数据
			M('order_goods')->where("order_id=$order_id")->del();
			if($this->db->where("order_id=$order_id")->del()){
				$this->success('删除订单成功');
			}else{
				$this->error('删除订单失败');
			}
		}
	}





?>
