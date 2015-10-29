<?php
/**
 * 订单模型
 */
	class OrderModel extends Model{
		/**
		 * 订单表
		 * @var string
		 */
		public $table="order";
		/**
		 * [getAll 获得所有订单数据]
		 * @return [type] [description]
		 */
		public function getAll(){
			$count=count($this->where("order_status=0")->all());
			$page=new Page($count,5);
			$orderdata=$this->where("order_status=0")->order("order_id asc")->limit($page->limit())->all();
			// 分配页码和订单数据
			$data=array('data'=>$orderdata,'page'=>$page->show());
			return $data;
		}
		/**
		 * 获得所有已处理订单
		 * @return [type] [description]
		 */
		public function solveOrder(){
			$count=count($this->where("order_status=1")->all());
			$page=new Page($count,5);
			$orderdata=$this->where("order_status=1")->order("order_id asc")->limit($page->limit())->all();
			// 分配页码和订单数据
			$data=array('data'=>$orderdata,'page'=>$page->show());
			return $data;
		}
		/**
		 * 已付款订单状态
		 * @return [type] [description]
		 */
		// public function updateOrder(){
		// 	$order_id=Q('order_id',0,'intval');
		// 	$data['order_status']=1;
		// 	$data['order_id']=$order_id;
		// 	// p($data);exit;
		// 	if($this->save($data)){
		// 		return true;
		// 	}else{
		// 		$this->error='订单处理失败';
		// 	}
		// }
		public function cancelOrder(){
			$count=count($this->where("order_status=2")->all());
			$page=new Page($count,5);
			$orderdata=$this->where("order_status=2")->order("order_id asc")->limit($page->limit())->all();
			// 分配页码和订单数据
			$data=array('data'=>$orderdata,'page'=>$page->show());
			return $data;
		}
	}







?>