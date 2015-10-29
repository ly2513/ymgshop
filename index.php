<?php   
	// 框架入口
	// 定义时区
	date_default_timezone_set("PRC");
	// 开启调试模式
	define("DEBUG",true);
	// 应用名称
	define("APP_PATH","YMGSHOP/");
	// 模块
	define("MODULE_LIST", "Admin,Index,Member");
	//引用框架
	require '../hdphp/hdphp/hdphp.php';
?>