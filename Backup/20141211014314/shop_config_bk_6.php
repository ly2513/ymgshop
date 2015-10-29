<?php if(!defined('HDPHP_PATH'))EXIT;
$db->exe("REPLACE INTO ".$db_prefix."config (`id`,`title`,`name`,`value`,`type`,`info`,`orderlist`,`is_show`)
						VALUES('2','关键字','KEYWORDS','视频教程','text','','100','1')");
$db->exe("REPLACE INTO ".$db_prefix."config (`id`,`title`,`name`,`value`,`type`,`info`,`orderlist`,`is_show`)
						VALUES('3','网站描述','DESCRIPTION','优美购电商网站','textarea','','100','1')");
$db->exe("REPLACE INTO ".$db_prefix."config (`id`,`title`,`name`,`value`,`type`,`info`,`orderlist`,`is_show`)
						VALUES('4','电话','TEL','010-6256252','text','','100','1')");
$db->exe("REPLACE INTO ".$db_prefix."config (`id`,`title`,`name`,`value`,`type`,`info`,`orderlist`,`is_show`)
						VALUES('5','网站开启','WEBSTATUS','1','radio','1|开启,0|关闭','100','0')");
$db->exe("REPLACE INTO ".$db_prefix."config (`id`,`title`,`name`,`value`,`type`,`info`,`orderlist`,`is_show`)
						VALUES('6','模板风格','WEBSTYLE','default','text','','100','1')");
$db->exe("REPLACE INTO ".$db_prefix."config (`id`,`title`,`name`,`value`,`type`,`info`,`orderlist`,`is_show`)
						VALUES('7','关闭时提示信息','WEB_CLOSE_MSG','网站正在升级中，请稍候访问.............','textarea','','100','1')");
$db->exe("REPLACE INTO ".$db_prefix."config (`id`,`title`,`name`,`value`,`type`,`info`,`orderlist`,`is_show`)
						VALUES('8','路由是否开启','WEB_REWRITE','1','radio','1|开启,0|关闭','100','1')");
$db->exe("REPLACE INTO ".$db_prefix."config (`id`,`title`,`name`,`value`,`type`,`info`,`orderlist`,`is_show`)
						VALUES('1','网站名称','WEBNAME','优美购','text','','100','1')");
$db->exe("REPLACE INTO ".$db_prefix."config (`id`,`title`,`name`,`value`,`type`,`info`,`orderlist`,`is_show`)
						VALUES('9','缩略图生成方式','','','','','','')");
