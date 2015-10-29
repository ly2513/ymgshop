<?php
	/**
	 * @Author: 李勇
	 * @Date:   2014-12-08 21:23:58
	 * @Last Modified by:   Administrator
	 * @Last Modified time: 2014-12-08 22:03:24
	 */
	/**
	 * 备份控制器
	 */
	class BackUpController extends AuthController{
		// 显示备份列表
		public function index(){
			$this->display();
		}
		/**
		 * 备份数据
		 * @return [type] [description]
		 */
		public function backUp(){
			$result=Backup::backup(array(
				'size'=>200,//每卷的大小
				'dir'=>C('DB_BACKUP').date("Ymdhis")
				)
			);
			if($result['status']=='success'){
				$this->success($result['message'],U('index'));
			}else{
				$this->success($result['message'],$result['url'],0.2);//每个0.2秒备份一次
			}
		}
		/**
		 * 备份列表
		 * @return [type] [description]
		 */
		public function backList(){
			$dirs=Dir::tree('Backup');
			$this->assign('dirs',$dirs);
			$this->display();
		}
		/**
		 * 备份数据还原
		 * @return [type] [description]
		 */
		public function recovery(){
			$dir=C('DB_BACKUP').Q('dir');
			$result=Backup::recovery(array('dir'=>$dir));
			if($result['status']=='success'){
				$this->success($result['message'],U('index'));
			}else{
				$this->success($result['message'],$result['url'],0.2);
			}
		}
		/**
		 * 删除备份数据
		 * @return [type] [description]
		 */
		public function del(){
			//获得当前要删除的问件目录
			$dir=C('DB_BACKUP').Q('dir');
			//删除数据备份文件
			$result=Dir::del($dir);
			if($result){
				$this->success('删除备份数据成功');
			}else{
				$this->error('删除备份数据失败');
			}
		}
	}












?>




