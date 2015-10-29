<?php if(!defined('HDPHP_PATH'))EXIT;
$db->exe("REPLACE INTO ".$db_prefix."access (`access_id`,`rid`,`module`,`controller`,`action`)
						VALUES('91','1','Admin','Recycle','restore')");
$db->exe("REPLACE INTO ".$db_prefix."access (`access_id`,`rid`,`module`,`controller`,`action`)
						VALUES('90','1','Admin','Recycle','update')");
$db->exe("REPLACE INTO ".$db_prefix."access (`access_id`,`rid`,`module`,`controller`,`action`)
						VALUES('89','1','Admin','Recycle','index')");
$db->exe("REPLACE INTO ".$db_prefix."access (`access_id`,`rid`,`module`,`controller`,`action`)
						VALUES('88','1','Admin','Product','index')");
$db->exe("REPLACE INTO ".$db_prefix."access (`access_id`,`rid`,`module`,`controller`,`action`)
						VALUES('87','1','Admin','Goods','edit')");
$db->exe("REPLACE INTO ".$db_prefix."access (`access_id`,`rid`,`module`,`controller`,`action`)
						VALUES('86','1','Admin','Brand','add')");
$db->exe("REPLACE INTO ".$db_prefix."access (`access_id`,`rid`,`module`,`controller`,`action`)
						VALUES('85','1','Admin','Category','add')");
$db->exe("REPLACE INTO ".$db_prefix."access (`access_id`,`rid`,`module`,`controller`,`action`)
						VALUES('84','1','Admin','Attribute','edit')");
$db->exe("REPLACE INTO ".$db_prefix."access (`access_id`,`rid`,`module`,`controller`,`action`)
						VALUES('83','1','Admin','GoodsType','edit')");
$db->exe("REPLACE INTO ".$db_prefix."access (`access_id`,`rid`,`module`,`controller`,`action`)
						VALUES('82','1','Admin','GoodsType','index')");
$db->exe("REPLACE INTO ".$db_prefix."access (`access_id`,`rid`,`module`,`controller`,`action`)
						VALUES('92','1','Admin','WebSet','index')");
