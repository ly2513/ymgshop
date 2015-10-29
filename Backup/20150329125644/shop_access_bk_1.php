<?php if(!defined('HDPHP_PATH'))EXIT;
$db->exe("REPLACE INTO ".$db_prefix."access (`access_id`,`rid`,`module`,`controller`,`action`)
						VALUES('102','1','Admin','Recycle','restore')");
$db->exe("REPLACE INTO ".$db_prefix."access (`access_id`,`rid`,`module`,`controller`,`action`)
						VALUES('101','1','Admin','Recycle','update')");
$db->exe("REPLACE INTO ".$db_prefix."access (`access_id`,`rid`,`module`,`controller`,`action`)
						VALUES('100','1','Admin','Recycle','index')");
$db->exe("REPLACE INTO ".$db_prefix."access (`access_id`,`rid`,`module`,`controller`,`action`)
						VALUES('99','1','Admin','Product','index')");
$db->exe("REPLACE INTO ".$db_prefix."access (`access_id`,`rid`,`module`,`controller`,`action`)
						VALUES('98','1','Admin','Goods','edit')");
$db->exe("REPLACE INTO ".$db_prefix."access (`access_id`,`rid`,`module`,`controller`,`action`)
						VALUES('97','1','Admin','Brand','add')");
$db->exe("REPLACE INTO ".$db_prefix."access (`access_id`,`rid`,`module`,`controller`,`action`)
						VALUES('96','1','Admin','Category','add')");
$db->exe("REPLACE INTO ".$db_prefix."access (`access_id`,`rid`,`module`,`controller`,`action`)
						VALUES('95','1','Admin','Attribute','edit')");
$db->exe("REPLACE INTO ".$db_prefix."access (`access_id`,`rid`,`module`,`controller`,`action`)
						VALUES('94','1','Admin','GoodsType','edit')");
$db->exe("REPLACE INTO ".$db_prefix."access (`access_id`,`rid`,`module`,`controller`,`action`)
						VALUES('93','1','Admin','GoodsType','index')");
$db->exe("REPLACE INTO ".$db_prefix."access (`access_id`,`rid`,`module`,`controller`,`action`)
						VALUES('103','1','Admin','WebSet','index')");
