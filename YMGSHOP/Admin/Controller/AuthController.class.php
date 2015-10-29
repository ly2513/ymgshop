<?php
/**
 * @author [liyong] <[626375290@qq.com]>
 */
// 用于判断管理员是否通过正常方式进入后台
	class AuthController extends Controller{
		public function __construct(){
			parent::__construct();
			// 用户没登录就去登录页面
			if(!isset($_SESSION['adminname'])){
				go('Login/index');
			}
		}
		//验证权限
		public function access(){
			// 站长拥有全站权限
			if($_SESSION['adminname']==C('WEB_MASTER')){
				return true;
			}
			
			// 用户权限角色
			$map['rid']=$_SESSION['rid'];
			// 模块名称
			$map['module']=array('EQ',MODULE);
			// 控制器
			$map['controller']=array('EQ',CONTROLLER);
			// 动作
			$map['action']=array('EQ',ACTION);
			if(!M('access')->where($map)->all()){
				$this->error('没有操作权限');
			}
		}
	}




?>