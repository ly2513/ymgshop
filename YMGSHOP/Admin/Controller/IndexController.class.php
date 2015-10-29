<?php
/**
 * @author [liyong] <[626375290@qq.com]>
 */
/**
 * 后台管理控制器
 */
class IndexController extends AuthController{
    //动作方法
    public function index(){
        //显示后台首页视图
        $this->display();
    }
    // 引用欢迎界面
    public function welcome(){
    	$this->display();
    }


}



?>