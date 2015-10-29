<?php
//前台控制器类
class IndexController extends Controller{
	private $db;//商品模型
	private $catedata;//父级栏目数据
    private $category;//
	/**
	 * [__init 构造函数]
	 * @return [type] [description]
	 */
	public function __init(){
		// 实例化商品模型对象
		$this->db=K('Goods');
		$this->catedata=M('category')->where("pid=0")->all();
        $this->category=S('category');
		$this->assign('catedata',$this->catedata);
	}
    /**
     * [index 商城首页显示]
     * @return [type] [description]
     */
    public function index(){
    	//分配热销数据
        $hotgoods=M("goods")->where("is_hot=1")->limit(6)->all();
        $this->assign('hotgoods',$hotgoods);
    	$newgoods=M('goods')->where("is_new=1")->limit(8)->all();
        $this->assign("newgoods",$newgoods);
        //显示视图
        $this->display();
    }

    /**
     * [list 列表页]
     * @return [type] [description]
     */
    public function lists(){
    	//获得当前栏目下的所有属性
        $attr=$this->getAttr();
        // p($attr);
        $this->assign('attr',$attr);
        //分配商品数据
        $data=$this->categorygoods();
        $this->assign('data_',$data['data']);
        $this->assign('page',$data['page']);
        //热销商品数据
        //栏目数据
        $cid=Q('cid');
        $allcate=$this->category;
        //获得当前栏目下的子栏目数据
        $allcid=Data::channelList($allcate,$cid);
        //存入子栏目cid
        $allcid=array_keys($allcid);
        //把当前栏目cid也压入
        $allcid[]=$cid;
        $map['cid']=array('IN',$allcid);
        //热销状态
        $map['is_hot']=1;
        $hotdata=M('goods')->where($map)->limit(4)->all();
        //分配当前栏目下的所有热销商品数据
        $this->assign('hotdata',$hotdata);
        // 获得当前商品的栏目的父级栏目
        $allparent=Data::parentChannel($allcate,$cid);
        // 倒序排序
        $allparent=array_reverse($allparent);
        $categorydata= Data::channelLevel($allcate,$allparent[0]['cid']);
        // p($categorydata);
        $this->assign('categorydata',$categorydata);
        $this->assign('allparent',$allparent);
        // p($allparent);
        // 分配热销排行榜
        $this->hotgoods();
    	$this->display('list.html');
    }
    
    /**
     * [categorygoods 获得相应的商品(列表页)]
     * @return [type] [description]
     */
    public function categorygoods(){
        //栏目id
        $cid=Q('cid',0,'intval');
        // 去空白
        $s=Q('s','','trim');
        $s=explode('-',$s);
        //对$s数组进行过滤，过滤掉0，null，false;
        $s=array_filter($s);
        if(!empty($s)){
            //$s有值,取出属性id对于的值
            $map['id']=array('IN',$s);
            $attr_value=M('goods_attr')->where($map)->getField('attr_value',true);
            $attr_value="'".implode("','", $attr_value)."'";
            /**
             * [$sql 统计商品属性的数量]
             * @var string
             */
            $sql="SELECT count(*) c FROM shop_goods_attr ga JOIN shop_goods g ON ga.goods_gid=g.gid WHERE ga.attr_value IN ($attr_value) GROUP BY ga.goods_gid HAVING c=".count($s);
            // $sql = "SELECT count(*) AS c from(SELECT g.gid FROM shop_goods_attr a JOIN shop_goods g ON a.goods_gid=g.gid
            //     WHERE a.attr_value IN({$attr_value})
            //     GROUP BY a.goods_gid having count(*)=".count($s).') as g';
            $count=M()->query($sql);
            $count=empty($count)?0:$count;
            //分页数据
            $page=new Page(count($count),10);
            //商品数据
            $sql="SELECT * FROM shop_goods_attr ga JOIN shop_goods g ON ga.goods_gid=g.gid WHERE ga.attr_value IN ($attr_value)  GROUP BY ga.goods_gid HAVING count(*)=".count($s) ." LIMIT ".$page->limit();
            $data=M()->query($sql);
        }else{
            //$s无值时，获得当前栏目下所有的商品
            $db=M('goods');
            //栏目数据
            $allcate=$this->category;
            //获得当前栏目下的子栏目数据
            $allcid=Data::channelList($allcate,$cid);
            //存入子栏目cid
            $allcid=array_keys($allcid);
            //把当前栏目cid也压入
            $allcid[]=$cid;
            $map['cid']=array('IN',$allcid);
            $page=new Page($db->where($map)->count(),10);
            $data=$db->where($map)->limit($page->limit())->all();
            
        }
        //分配当前栏目下的商品数据
        $alldata=array('data'=>$data,'page'=>$page->show());
        // echo json_encode($alldata);
        return $alldata;
    }
    /**
     * [getAttr 获得当前栏目下的所有属性(便于列表页的搜索)]
     * @return [type] [description]
     */
    private function getAttr(){
        /**
         * [$s 属性筛选变量]
         * 如果s变量没有，产生默认s变量他的值是属性连接
         * 例如有4个属性，$s=0-0-0-0
         * @var [type]
         */
       $s=Q('s',null,'trim');
       //栏目id
       $cid=Q("get.cid",0,'intval');
       // p($cid);
       //商品类型id
        $cat_id=$this->category[$cid]['cat_id'];
        
       
       if(!$s){
            /**
             * 没有s时，获取当前栏目下所属属性
             *
             */
           
            $sql="SELECT count(*) FROM shop_attribute a left JOIN shop_goods_attr ga ON a.attr_id=ga.attr_id WHERE a.cat_id=$cat_id 
                  GROUP BY a.attr_id";
                //统计该商品类型属性数量
                $count=count(M()->query($sql));
                // p($count);die;
                $s='';
                for ($i=0; $i <$count ; $i++) { 
                   $s.='0-';
                }
                $s=substr($s,0,-1);
                // echo $s;die;
                go(U('lists',array('cid'=>$cid,'s'=>$s)));
       }else{
        /**
         * 有s时，获得当前栏目下所有属性用于搜索
         */
        
        // //商品类型id
        // $cat_id=$this->category[$cid]['cat_id'];
        $sql="SELECT * FROM shop_attribute a left join shop_goods_attr ga 
              ON a.attr_id=ga.attr_id 
              WHERE a.cat_id=$cat_id 
              GROUP BY a.attr_id";
            $attr=M()->query($sql);
            
            /**
             * 获得每一个属性的值
             * 
             */
            foreach ($attr as $id => $v) {
                if(!$v['attr_id']) continue;
                $sql="SELECT * FROM shop_goods_attr WHERE attr_id={$v['attr_id']} GROUP BY attr_value";
                $attr[$id]['_value']=M()->query($sql);
            }
            // p($attr);die;
            return $attr;
       }
        

    }
    /**
     * [detail 分配商品数据到(详细页面)]
     * @return [type] [description]
     */
    public function detail(){
        $gid=Q('gid',0,'intval');
        //关联商品表，商品附表、商品详细图片表
        $sql="select * from shop_goods g join shop_goods_data gd on g.gid=gd.goods_gid join shop_goods_gallery gg on g.gid=gg.goods_gid where gid=$gid";
        $goods=M()->query($sql);
        $this->assign('goods',$goods[0]);
        //分配商品的规格属性   
        $sql="select * from shop_attribute a join shop_goods_attr ga on a.attr_id=ga.attr_id where ga.goods_gid=$gid and a.attr_type=1 GROUP BY a.attr_id";
        $attr=M()->query($sql);
        foreach ($attr as $id => $v) {
            //将相同属性的值放在一组数组中
            $a=M('goods_attr')->where("attr_id={$v['attr_id']} and goods_gid=$gid")->all();
            $attr[$id]['value']=$a;
        }
        $this->assign('goodsattr',$attr);
        // 获得当前商品的栏目
        $goodsdata=M('goods')->find($gid);
        // 获得当前商品的栏目id
        $cid=$goodsdata['cid'];
        // 获得所有栏目数据
        $catedata=$this->category;
        // 获得当前商品的栏目的父级栏目
        $allparent=Data::parentChannel($catedata,$cid);
        // 倒序排序
        $allparent=array_reverse($allparent);
        // p($allparent);
        $this->assign('allparent',$allparent);
        // 分配相关商品
        $relativegoods=M('goods')->where("cid=$cid and gid!=$gid")->limit(5)->all();
        $this->assign('relativegoods',$relativegoods);
        // p($relativegoods);
        $this->display();
    } 
    /**
     * [getProduct 从货品表中]
     * @return [type] [description]
     */
    public function getProduct(){
        $goods_attr=Q('goods_attr',0,'trim');
        $map['goods_attr']=array('IN',$goods_attr);
        // p($goods_attr);
        $data=M('product')->where($map)->find();
        $return=array();
        if($data){
            $return=array('status'=>'success','data'=>$data);
        }else{
            $return=array('status'=>'error','message'=>'没有这商品');
        }
        echo json_encode($return);
        exit;
    }
    /**
     * 热销排行榜和热销推荐
     */
    public function hotgoods(){
        $hotgoods=M("goods")->where("is_hot=1")->all();
        return $this->assign("hotgoods",$hotgoods);
    }
    /**
     * 会员收藏商品
     * @return [type] [description]
     */
    public function shoucang(){
        if(M('goods_favorite')->add()){
            $data['status']=1;
            $data['message']="商品加入收藏夹成功";
        }else{
            $data['status']=0;
            $data['message']="商品加入收藏夹失败";
        }
        echo json_encode($data);
        exit;
    }
    /**
     * [screen 筛选商品]
     * @return [type] [description]
     */
    public function  screen(){
        //商品排序方式
        $method=Q('post.method',1,'intval');
         //查询条件：
        $order='';
        // 按条件进行排序
        switch ($method) {
            case 2:
                $order="cid asc";
                break;
            case 3:
                $order="cid asc";
                break;
            case 4:
            // 按上架时间降序排
                $order="sale_time desc";
                break;
            case 5:
            // 按价格升序排
                $order="goods_price asc";
                break;
            case 6:
            // 按价格降序排
                $order="goods_price desc";
                break;
            default:
            // 默认按栏目id排
                $order="cid asc";
                break;
        }
         $db=M('goods');
        //栏目数据
        $allcate=$this->category;
        //获得当前栏目下的子栏目数据
        $allcid=Data::channelList($allcate,$cid);
        //存入子栏目cid
        $allcid=array_keys($allcid);
        //把当前栏目cid也压入
        $allcid[]=$cid;
        $map['cid']=array('IN',$allcid);
        $page=new Page($db->where($map)->count(),10);
        // 获得所需的商品数据
        $data=$db->where($map)->order($order)->limit($page->limit())->all();
        // 获得所有的商品数据
        $alldata=array('data'=>$data,'page'=>$page->show());
        echo json_encode($alldata);
        exit;
    }

}
