<?php
/**
 * 权限控制器
 */
	class AccessController extends AuthController{
		/**
		 * [set 设置权限]
		 */
		public function set(){
			// p($_POST);exit;
			if(IS_POST){
				//实例化一个操作表access的对象
				$db=M('access');
				// 添加之前删除之前角色对应的权限
				$db->where("rid={$_POST['rid']}")->del();
				$data=array();
				if(!empty($_POST['access'])){
					foreach ($_POST['access'] as $controller => $action) {
						foreach ($action as $a) {
							$data['rid']=$_POST['rid'];
							$data['module']="Admin";
							$data['controller']=$controller;
							$data['action']=$a;
							$db->add($data);
						}
					}
					$this->success("设置成功");
				}else{
					$this->error('设置失败');
				}
			}else{
				//获得节点数据
				$node=M('node')->all();
				$node=Data::channelLevel($node,0,'&nbsp;','nid');
				// p($node);
				// 获得当前session中rid的操作权限
				$map['rid']=array('EQ',Q('get.rid',0,'intval'));
				// 当前用户角色控制器权限
				$controller=M('access')->where($map)->getField('controller',true);
				// p($controller);
				// 当前用户角色动作权限
				$action=M('access')->where($map)->all();
				// p($action);
				$data=array();
				foreach ($action as $v) {
					$data[$v['controller']][]=$v['action'];
				}
				// p($data);
				$this->assign('node',$node);
				$this->assign('controller',$controller);
				$this->assign('action',$data);
				// p($data);exit;
				$this->display();
			}
		}
	}







?>