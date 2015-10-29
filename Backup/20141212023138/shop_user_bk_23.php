<?php if(!defined('HDPHP_PATH'))EXIT;
$db->exe("REPLACE INTO ".$db_prefix."user (`uid`,`username`,`password`,`token`,`rid`,`email`,`phone`)
						VALUES(1,'admin','d2c7791acb332f5de10e4f87334585d3','bf320fa3295cf4770c58db4db5a8ef04',1,'','')");
$db->exe("REPLACE INTO ".$db_prefix."user (`uid`,`username`,`password`,`token`,`rid`,`email`,`phone`)
						VALUES(2,'liyong','d2c7791acb332f5de10e4f87334585d3','bf320fa3295cf4770c58db4db5a8ef04',2,'626375290@qq.com','')");
$db->exe("REPLACE INTO ".$db_prefix."user (`uid`,`username`,`password`,`token`,`rid`,`email`,`phone`)
						VALUES(4,'liyong','a293582badeaefc01edf38c00979b640','dada59bc8f2fe8eabf642197e9415a5b',2,'12312@qq.com','2147483647')");
