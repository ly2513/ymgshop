<?php
/**
 * 会员中心控制器
 */
class IndexController extends Controller{
	private $catedata;//栏目数据
	public function __init(){
		// 获得所有的顶级栏目
		$this->catedata=M('category')->where("pid=0")->all();
		// 分配顶级栏目
		$this->assign('catedata',$this->catedata);
	}
    //会员中心
    public function index(){
        //显示视图
        $this->display('member.html');
    }
    /**
     * 获得当前用户的订单信息
     * @return [type] [description]
     */
    public function orderList(){
        //获得当前用户的订单信息
        $uid=$_SESSION['uid'];
        $order_sn=Q('order_sn');
        
        $map['uid']=array('EQ',$uid);
        isset($order_sn)?$map['order_sn']=array('EQ',$order_sn):'';
        $count=count(M('order')->where($map)->all());
        $page= new Page($count,5);
        $order=M('order')->where($map)->order("order_id desc")->limit($page->limit())->all();
        // 遍历订单数组，将商品图片压入订单数组中
        foreach ($order as $id => $v) {
           $ordergoods=M('order_goods')->where("order_id={$v['order_id']}")->all();
           foreach ($ordergoods as $d => $value) {
               $goods=M('goods')->where("gid={$value['goods_gid']}")->find();
               $order[$id]['img'][$d][]=$goods['goods_img'];
               $order[$id]['gid']=$value['goods_gid'];
           }
        }
        int_to_string($order,array('order_status'=>array(0=>'待付款',1=>'已付款',2=>'已作废')));
        // p($order);
        $this->assign('data',$order);
        $this->assign('page',$page);
    	$this->display('orderList.html');
    }
    /**
     * 已支付，修改订单状态
     */
    public function pay(){
        $data['order_id']=Q('order_id',0,'intval');
        $data['order_status']=1;
        if(M('order')->save($data)){
            $this->success('支付成功');
        }else{
            $this->error('支付失败');
        }
    }
    /**
     * 取消订单，修改订单状态
     * @return [type] [description]
     */
    public function cancel(){
        $data['order_id']=Q('order_id',0,'intval');
        $data['order_status']=2;
        // 取消的时间
        $data['cancel_time']=time();
        if(M('order')->save($data)){
            $this->success('取消订单成功');
        }else{
            $this->error('取消订单失败');
        }
    }
    /**
     * 删除订单，修改订单状态
     * @return [type] [description]
     */
    public function del(){
        $order_id=Q('order_id',0,'intval');
        if(M('order')->del($order_id)){
            $this->success('删除订单成功');
        }else{
            $this->error('删除订单失败');
        }
    } 

    /**
     * 会员购买的商品订单信息
     * @return [type] [description]
     */
    public function orderinfo(){
        $uid=$_SESSION['uid'];
        $order_id=Q('order_id',0,'intval');
        // 订单信息
        $order=M('order')->where("order_id=$order_id")->find();
        int_to_string($order,array('order_status'=>array(0=>'待付款',1=>'已付款',2=>'已作废')));
        // p($order);
        $this->assign('order',$order);
        // 收货人信息
        $userinfo=M('user_info')->where("uid=$uid and status=1")->find();
        $this->assign('userinfo',$userinfo);
        // 商品信息
        $goods=M('order_goods')->where("order_id=$order_id")->all();
        foreach ($goods as $id => $v) {
            $attr=explode('|', $v['goods_attr']);
            $attr=array_filter($attr);
            foreach ($attr as $a) {
                $a=explode(':', $a);
                $goods[$id]['attr'][]=$a[1];
            }
            // 总价
            $goods[$id]['totalprice']=$v['goods_price']*$v['goods_number'];
            // p($attr);
        }
        $this->assign('goods',$goods);
        $this->display();
    }
    /**
     * 获得收藏夹的商品
     * @return [type] [description]
     */
    public function shoucang(){
        // 获得收藏夹商品
        $db=K('Index');
        $data=$db->sc();
        $this->assign('data',$data);
        // p($data);
        $this->display();
    }
    /**
     * 商品评论
     * @return [type] [description]
     */
    public function comment(){
        $gid=Q('gid',0,'intval');
        $attr="select goods_attr from shop_order_goods where goods_gid=$gid";
        $attrdata=M()->query($attr);
        p($attrdata);
    } 




}






















?>
