<?php if(!defined('HDPHP_PATH'))EXIT;
$db->exe("REPLACE INTO ".$db_prefix."goods_type (`cat_id`,`cat_name`)
						VALUES(1,'服装')");
$db->exe("REPLACE INTO ".$db_prefix."goods_type (`cat_id`,`cat_name`)
						VALUES(2,'鞋子')");
$db->exe("REPLACE INTO ".$db_prefix."goods_type (`cat_id`,`cat_name`)
						VALUES(3,'化妆品')");
$db->exe("REPLACE INTO ".$db_prefix."goods_type (`cat_id`,`cat_name`)
						VALUES(4,'包包')");
$db->exe("REPLACE INTO ".$db_prefix."goods_type (`cat_id`,`cat_name`)
						VALUES(5,'饰品')");
