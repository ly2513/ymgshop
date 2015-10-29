<?php
/**
 * 会员信息管理控制器
 */
	class MemberController extends Controller{
		private $db;
		public function __init(){
			$this->db=K('Member');
			// 分配省份信息、城市信息、区/县
			$province=M('s_province')->all();
			$city=M('s_city')->all();
			$area=M('s_district')->all();
			$this->assign("province",$province);
			$this->assign("city",$city);
			$this->assign("area",$area);
		}
		/**
		 * 修改个人信息
		 * @return [type] [description]
		 */
		public  function  index(){
			// 获得会员信息
			$data=$this->db->getAll();
			$this->assign('data',$data);
			// p($data);
			$this->display('userInfo.html');
		}
		/**
		 * 修改收货地址
		 * @return [type] [description]
		 */
		public function updateAddr(){
			$uid=$_SESSION['uid'];
			$data=M("user_info")->where("uid=$uid")->all();
			$this->assign('data',$data);
			$this->display('editAddr.html');
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
			// p($citydata);
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
		 * [userInfo 录入用户收货信息]
		 * @return [type] [description]
		 */
		public function userInfo(){
			// p($_POST);exit;
			$_POST['province']=M('s_province')->where("ProvinceID='{$_POST['province']}'")->getField('ProvinceName');
			$_POST['city']=M('s_city')->where("CityID='{$_POST['city']}'")->getField('CityName');
			$_POST['area']=M('s_district')->where("DistrictID='{$_POST['area']}'")->getField('DistrictName');
			if(IS_POST){
				// p($_POST);exit;
				if(M('user_info')->add()){
					echo 1;exit;
				}else{
					echo 0;
					exit;
				}
			}
		}
		






		
	}




?>