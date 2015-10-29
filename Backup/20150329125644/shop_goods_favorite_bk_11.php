<?php if(!defined('HDPHP_PATH'))EXIT;
$db->exe("REPLACE INTO ".$db_prefix."goods_favorite (`fid`,`gid`,`uid`)
						VALUES('1','2','2')");
$db->exe("REPLACE INTO ".$db_prefix."goods_favorite (`fid`,`gid`,`uid`)
						VALUES('2','3','2')");
$db->exe("REPLACE INTO ".$db_prefix."goods_favorite (`fid`,`gid`,`uid`)
						VALUES('3','5','0')");
$db->exe("REPLACE INTO ".$db_prefix."goods_favorite (`fid`,`gid`,`uid`)
						VALUES('4','6','2')");
$db->exe("REPLACE INTO ".$db_prefix."goods_favorite (`fid`,`gid`,`uid`)
						VALUES('5','2','2')");
