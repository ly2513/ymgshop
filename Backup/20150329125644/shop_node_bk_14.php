<?php if(!defined('HDPHP_PATH'))EXIT;
$db->exe("REPLACE INTO ".$db_prefix."node (`nid`,`name`,`title`,`pid`,`level`)
						VALUES('1','Admin','后台模块','0','1')");
$db->exe("REPLACE INTO ".$db_prefix."node (`nid`,`name`,`title`,`pid`,`level`)
						VALUES('2','GoodsType','商品类型控制器','1','2')");
$db->exe("REPLACE INTO ".$db_prefix."node (`nid`,`name`,`title`,`pid`,`level`)
						VALUES('3','index','商品类型列表','2','3')");
$db->exe("REPLACE INTO ".$db_prefix."node (`nid`,`name`,`title`,`pid`,`level`)
						VALUES('4','add','添加商品类型分类','2','3')");
$db->exe("REPLACE INTO ".$db_prefix."node (`nid`,`name`,`title`,`pid`,`level`)
						VALUES('5','Attribute','商品属性控制器','1','2')");
$db->exe("REPLACE INTO ".$db_prefix."node (`nid`,`name`,`title`,`pid`,`level`)
						VALUES('6','index','商品属性列表','5','3')");
$db->exe("REPLACE INTO ".$db_prefix."node (`nid`,`name`,`title`,`pid`,`level`)
						VALUES('7','edit','商品属性编辑','5','3')");
$db->exe("REPLACE INTO ".$db_prefix."node (`nid`,`name`,`title`,`pid`,`level`)
						VALUES('8','del','商品属性删除','5','3')");
$db->exe("REPLACE INTO ".$db_prefix."node (`nid`,`name`,`title`,`pid`,`level`)
						VALUES('9','add','商品属性添加','5','3')");
$db->exe("REPLACE INTO ".$db_prefix."node (`nid`,`name`,`title`,`pid`,`level`)
						VALUES('10','Category','商品栏目控制器','1','2')");
$db->exe("REPLACE INTO ".$db_prefix."node (`nid`,`name`,`title`,`pid`,`level`)
						VALUES('11','index','商品栏目列表','10','3')");
$db->exe("REPLACE INTO ".$db_prefix."node (`nid`,`name`,`title`,`pid`,`level`)
						VALUES('12','add','商品栏目添加','10','3')");
$db->exe("REPLACE INTO ".$db_prefix."node (`nid`,`name`,`title`,`pid`,`level`)
						VALUES('13','edit','商品栏目编辑','10','3')");
$db->exe("REPLACE INTO ".$db_prefix."node (`nid`,`name`,`title`,`pid`,`level`)
						VALUES('14','delete','商品栏目删除','10','3')");
$db->exe("REPLACE INTO ".$db_prefix."node (`nid`,`name`,`title`,`pid`,`level`)
						VALUES('15','edit','商品类型编辑','2','3')");
$db->exe("REPLACE INTO ".$db_prefix."node (`nid`,`name`,`title`,`pid`,`level`)
						VALUES('16','del','商品类型删除','2','3')");
$db->exe("REPLACE INTO ".$db_prefix."node (`nid`,`name`,`title`,`pid`,`level`)
						VALUES('17','Brand','品牌控制器','1','2')");
$db->exe("REPLACE INTO ".$db_prefix."node (`nid`,`name`,`title`,`pid`,`level`)
						VALUES('18','index','品牌列表','17','3')");
$db->exe("REPLACE INTO ".$db_prefix."node (`nid`,`name`,`title`,`pid`,`level`)
						VALUES('19','add','品牌添加','17','3')");
$db->exe("REPLACE INTO ".$db_prefix."node (`nid`,`name`,`title`,`pid`,`level`)
						VALUES('20','edit','品牌编辑','17','3')");
$db->exe("REPLACE INTO ".$db_prefix."node (`nid`,`name`,`title`,`pid`,`level`)
						VALUES('21','delete','品牌删除','17','3')");
$db->exe("REPLACE INTO ".$db_prefix."node (`nid`,`name`,`title`,`pid`,`level`)
						VALUES('22','Goods','商品管理控制器','1','2')");
$db->exe("REPLACE INTO ".$db_prefix."node (`nid`,`name`,`title`,`pid`,`level`)
						VALUES('23','index','商品列表','22','3')");
$db->exe("REPLACE INTO ".$db_prefix."node (`nid`,`name`,`title`,`pid`,`level`)
						VALUES('24','add','商品添加','22','3')");
$db->exe("REPLACE INTO ".$db_prefix."node (`nid`,`name`,`title`,`pid`,`level`)
						VALUES('25','edit','商品编辑','22','3')");
$db->exe("REPLACE INTO ".$db_prefix."node (`nid`,`name`,`title`,`pid`,`level`)
						VALUES('26','Product','货品控制器','1','2')");
$db->exe("REPLACE INTO ".$db_prefix."node (`nid`,`name`,`title`,`pid`,`level`)
						VALUES('27','index','货品列表','26','3')");
$db->exe("REPLACE INTO ".$db_prefix."node (`nid`,`name`,`title`,`pid`,`level`)
						VALUES('28','Recycle','回收站控制器','1','2')");
$db->exe("REPLACE INTO ".$db_prefix."node (`nid`,`name`,`title`,`pid`,`level`)
						VALUES('29','index','回收站列表','28','3')");
$db->exe("REPLACE INTO ".$db_prefix."node (`nid`,`name`,`title`,`pid`,`level`)
						VALUES('30','update','回收站回收','28','3')");
$db->exe("REPLACE INTO ".$db_prefix."node (`nid`,`name`,`title`,`pid`,`level`)
						VALUES('31','restore','回收站还原','28','3')");
$db->exe("REPLACE INTO ".$db_prefix."node (`nid`,`name`,`title`,`pid`,`level`)
						VALUES('32','del','回收站删除','28','3')");
$db->exe("REPLACE INTO ".$db_prefix."node (`nid`,`name`,`title`,`pid`,`level`)
						VALUES('33','WebSet','站点配置','1','2')");
$db->exe("REPLACE INTO ".$db_prefix."node (`nid`,`name`,`title`,`pid`,`level`)
						VALUES('34','index','站点配置列表','33','3')");
