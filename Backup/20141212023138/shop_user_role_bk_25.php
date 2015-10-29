<?php if(!defined('HDPHP_PATH'))EXIT;
$db->exe("REPLACE INTO ".$db_prefix."user_role (`uid`,`rid`)
						VALUES('1','1')");
$db->exe("REPLACE INTO ".$db_prefix."user_role (`uid`,`rid`)
						VALUES('2','2')");
$db->exe("REPLACE INTO ".$db_prefix."user_role (`uid`,`rid`)
						VALUES('4','2')");
