<?php if(!defined('HDPHP_PATH'))EXIT;
$db->exe("REPLACE INTO ".$db_prefix."brand (`bid`,`brand_name`,`brand_logo`,`brand_order`)
						VALUES(1,'蒙娜丽莎','',1)");
$db->exe("REPLACE INTO ".$db_prefix."brand (`bid`,`brand_name`,`brand_logo`,`brand_order`)
						VALUES(2,'华为','',2)");
