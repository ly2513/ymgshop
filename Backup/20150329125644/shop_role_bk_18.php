<?php if(!defined('HDPHP_PATH'))EXIT;
$db->exe("REPLACE INTO ".$db_prefix."role (`rid`,`role_name`)
						VALUES('1','管理员')");
$db->exe("REPLACE INTO ".$db_prefix."role (`rid`,`role_name`)
						VALUES('2','会员')");
$db->exe("REPLACE INTO ".$db_prefix."role (`rid`,`role_name`)
						VALUES('3','普通管理员')");
