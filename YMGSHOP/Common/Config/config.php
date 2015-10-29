<?php
if (!defined("HDPHP_PATH"))exit('No direct script access allowed');
//更多配置请查看hdphp/Config/config.php
//网站配置参数
$base=require APP_CONFIG_PATH.'base.php';
$alipay=require APP_CONFIG_PATH.'alipay.php';
$config=array(
    /********************************数据库********************************/
    'DB_DRIVER'                     => 'mysqli',            //数据库驱动
    'DB_CHARSET'                    => 'utf8',              //数据库字符集
    'DB_HOST'                       => 'localhost',         //数据库连接主机  如127.0.0.1
    'DB_PORT'                       => 3306,                //数据库连接端口
    'DB_USER'                       => 'root',              //数据库用户名
    'DB_PASSWORD'                   => '',            //数据库密码
    'DB_DATABASE'                   => 'ymgshop',           //数据库名称
    'DB_PREFIX'                     => 'shop_',             //表前缀
    'DB_BACKUP'                     => 'Backup/',           //数据库备份目录
    'TPL_TAGS'                      =>array('ContentTag'),  //加载标签
    // 'WEB_MASTER'                    =>'admin',              //站长
);
$configdata=array_merge($base,$alipay);
return array_merge($config,$configdata);
?>