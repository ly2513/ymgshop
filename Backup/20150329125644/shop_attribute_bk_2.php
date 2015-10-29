<?php if(!defined('HDPHP_PATH'))EXIT;
$db->exe("REPLACE INTO ".$db_prefix."attribute (`attr_id`,`attr_name`,`attr_type`,`attr_value`,`attr_input_type`,`cat_id`)
						VALUES(1,'颜色',1,'a:11:{i:0;s:7:\"红色\";i:1;s:7:\"白色\";i:2;s:7:\"黄色\";i:3;s:7:\"蓝色\";i:4;s:7:\"绿色\";i:5;s:7:\"橙色\";i:6;s:7:\"黑色\";i:7;s:7:\"灰色\";i:8;s:7:\"粉色\";i:9;s:1:\"\";i:10;s:0:\"\";}',2,1)");
$db->exe("REPLACE INTO ".$db_prefix."attribute (`attr_id`,`attr_name`,`attr_type`,`attr_value`,`attr_input_type`,`cat_id`)
						VALUES(2,'尺寸',1,'a:5:{i:0;s:2:\"M\";i:1;s:2:\"S\";i:2;s:2:\"L\";i:3;s:3:\"XL\";i:4;s:3:\"XXL\";}',2,1)");
$db->exe("REPLACE INTO ".$db_prefix."attribute (`attr_id`,`attr_name`,`attr_type`,`attr_value`,`attr_input_type`,`cat_id`)
						VALUES(3,'风格',0,'a:7:{i:0;s:13:\"优雅女装\";i:1;s:13:\"休闲女装\";i:2;s:13:\"日韩女装\";i:3;s:13:\"欧式女装\";i:4;s:13:\"原创女装\";i:5;s:13:\"意式女装\";i:6;s:12:\"潮牌女装\";}',2,1)");
$db->exe("REPLACE INTO ".$db_prefix."attribute (`attr_id`,`attr_name`,`attr_type`,`attr_value`,`attr_input_type`,`cat_id`)
						VALUES(4,'袖长',0,'',1,1)");
$db->exe("REPLACE INTO ".$db_prefix."attribute (`attr_id`,`attr_name`,`attr_type`,`attr_value`,`attr_input_type`,`cat_id`)
						VALUES(5,'领型',0,'',1,1)");
$db->exe("REPLACE INTO ".$db_prefix."attribute (`attr_id`,`attr_name`,`attr_type`,`attr_value`,`attr_input_type`,`cat_id`)
						VALUES(6,'面料成分描述',0,'',1,1)");
$db->exe("REPLACE INTO ".$db_prefix."attribute (`attr_id`,`attr_name`,`attr_type`,`attr_value`,`attr_input_type`,`cat_id`)
						VALUES(7,'厚薄',0,'',1,1)");
$db->exe("REPLACE INTO ".$db_prefix."attribute (`attr_id`,`attr_name`,`attr_type`,`attr_value`,`attr_input_type`,`cat_id`)
						VALUES(8,'衣长',0,'',1,1)");
$db->exe("REPLACE INTO ".$db_prefix."attribute (`attr_id`,`attr_name`,`attr_type`,`attr_value`,`attr_input_type`,`cat_id`)
						VALUES(9,'版型',0,'',1,1)");
$db->exe("REPLACE INTO ".$db_prefix."attribute (`attr_id`,`attr_name`,`attr_type`,`attr_value`,`attr_input_type`,`cat_id`)
						VALUES(10,'颜色',1,'a:9:{i:0;s:7:\"白色\";i:1;s:7:\"黑色\";i:2;s:7:\"黄色\";i:3;s:7:\"蓝色\";i:4;s:7:\"红色\";i:5;s:7:\"灰色\";i:6;s:7:\"绿色\";i:7;s:7:\"橙色\";i:8;s:6:\"棕色\";}',2,2)");
$db->exe("REPLACE INTO ".$db_prefix."attribute (`attr_id`,`attr_name`,`attr_type`,`attr_value`,`attr_input_type`,`cat_id`)
						VALUES(11,'尺寸',1,'a:8:{i:0;s:3:\"35\";i:1;s:3:\"34\";i:2;s:3:\"35\";i:3;s:3:\"36\";i:4;s:3:\"37\";i:5;s:3:\"38\";i:6;s:3:\"39\";i:7;s:0:\"\";}',2,2)");
$db->exe("REPLACE INTO ".$db_prefix."attribute (`attr_id`,`attr_name`,`attr_type`,`attr_value`,`attr_input_type`,`cat_id`)
						VALUES(12,'风格',1,'a:6:{i:0;s:13:\"商务正装\";i:1;s:13:\"欧美风范\";i:2;s:13:\"甜美优雅\";i:3;s:13:\"时尚休闲\";i:4;s:13:\"复古宫廷\";i:5;s:12:\"日韩潮流\";}',2,2)");
$db->exe("REPLACE INTO ".$db_prefix."attribute (`attr_id`,`attr_name`,`attr_type`,`attr_value`,`attr_input_type`,`cat_id`)
						VALUES(13,'跟高',0,'',1,2)");
$db->exe("REPLACE INTO ".$db_prefix."attribute (`attr_id`,`attr_name`,`attr_type`,`attr_value`,`attr_input_type`,`cat_id`)
						VALUES(14,'内里',0,'',1,2)");
$db->exe("REPLACE INTO ".$db_prefix."attribute (`attr_id`,`attr_name`,`attr_type`,`attr_value`,`attr_input_type`,`cat_id`)
						VALUES(15,'皮质',0,'',1,2)");
$db->exe("REPLACE INTO ".$db_prefix."attribute (`attr_id`,`attr_name`,`attr_type`,`attr_value`,`attr_input_type`,`cat_id`)
						VALUES(16,'鞋头',0,'',1,2)");
$db->exe("REPLACE INTO ".$db_prefix."attribute (`attr_id`,`attr_name`,`attr_type`,`attr_value`,`attr_input_type`,`cat_id`)
						VALUES(17,'大底材质',0,'',1,2)");
$db->exe("REPLACE INTO ".$db_prefix."attribute (`attr_id`,`attr_name`,`attr_type`,`attr_value`,`attr_input_type`,`cat_id`)
						VALUES(18,'季节',0,'',1,2)");
$db->exe("REPLACE INTO ".$db_prefix."attribute (`attr_id`,`attr_name`,`attr_type`,`attr_value`,`attr_input_type`,`cat_id`)
						VALUES(19,'类型',0,'',1,2)");
$db->exe("REPLACE INTO ".$db_prefix."attribute (`attr_id`,`attr_name`,`attr_type`,`attr_value`,`attr_input_type`,`cat_id`)
						VALUES(20,'风格',0,'',1,2)");
$db->exe("REPLACE INTO ".$db_prefix."attribute (`attr_id`,`attr_name`,`attr_type`,`attr_value`,`attr_input_type`,`cat_id`)
						VALUES(21,'跟型',0,'',1,2)");
$db->exe("REPLACE INTO ".$db_prefix."attribute (`attr_id`,`attr_name`,`attr_type`,`attr_value`,`attr_input_type`,`cat_id`)
						VALUES(22,'适合人群',0,'',1,2)");
$db->exe("REPLACE INTO ".$db_prefix."attribute (`attr_id`,`attr_name`,`attr_type`,`attr_value`,`attr_input_type`,`cat_id`)
						VALUES(23,'价格区间',0,'',1,2)");
$db->exe("REPLACE INTO ".$db_prefix."attribute (`attr_id`,`attr_name`,`attr_type`,`attr_value`,`attr_input_type`,`cat_id`)
						VALUES(24,'鞋面材质',0,'',1,2)");
$db->exe("REPLACE INTO ".$db_prefix."attribute (`attr_id`,`attr_name`,`attr_type`,`attr_value`,`attr_input_type`,`cat_id`)
						VALUES(25,'工艺',0,'',1,2)");
$db->exe("REPLACE INTO ".$db_prefix."attribute (`attr_id`,`attr_name`,`attr_type`,`attr_value`,`attr_input_type`,`cat_id`)
						VALUES(26,'图案',0,'',1,2)");
$db->exe("REPLACE INTO ".$db_prefix."attribute (`attr_id`,`attr_name`,`attr_type`,`attr_value`,`attr_input_type`,`cat_id`)
						VALUES(27,'流行元素',0,'',1,1)");
$db->exe("REPLACE INTO ".$db_prefix."attribute (`attr_id`,`attr_name`,`attr_type`,`attr_value`,`attr_input_type`,`cat_id`)
						VALUES(28,'筒高',0,'',1,2)");
$db->exe("REPLACE INTO ".$db_prefix."attribute (`attr_id`,`attr_name`,`attr_type`,`attr_value`,`attr_input_type`,`cat_id`)
						VALUES(29,'规格',1,'',1,3)");
$db->exe("REPLACE INTO ".$db_prefix."attribute (`attr_id`,`attr_name`,`attr_type`,`attr_value`,`attr_input_type`,`cat_id`)
						VALUES(31,'功效',0,'',1,3)");
$db->exe("REPLACE INTO ".$db_prefix."attribute (`attr_id`,`attr_name`,`attr_type`,`attr_value`,`attr_input_type`,`cat_id`)
						VALUES(32,'适合肤质',0,'',1,3)");
$db->exe("REPLACE INTO ".$db_prefix."attribute (`attr_id`,`attr_name`,`attr_type`,`attr_value`,`attr_input_type`,`cat_id`)
						VALUES(33,'类型',0,'',1,3)");
$db->exe("REPLACE INTO ".$db_prefix."attribute (`attr_id`,`attr_name`,`attr_type`,`attr_value`,`attr_input_type`,`cat_id`)
						VALUES(34,'温馨提示',0,'',1,3)");
$db->exe("REPLACE INTO ".$db_prefix."attribute (`attr_id`,`attr_name`,`attr_type`,`attr_value`,`attr_input_type`,`cat_id`)
						VALUES(35,'材质',0,'',1,5)");
$db->exe("REPLACE INTO ".$db_prefix."attribute (`attr_id`,`attr_name`,`attr_type`,`attr_value`,`attr_input_type`,`cat_id`)
						VALUES(36,'元素',0,'',1,5)");
$db->exe("REPLACE INTO ".$db_prefix."attribute (`attr_id`,`attr_name`,`attr_type`,`attr_value`,`attr_input_type`,`cat_id`)
						VALUES(37,'类型',0,'',1,5)");
$db->exe("REPLACE INTO ".$db_prefix."attribute (`attr_id`,`attr_name`,`attr_type`,`attr_value`,`attr_input_type`,`cat_id`)
						VALUES(38,'价格区间',0,'',1,1)");
$db->exe("REPLACE INTO ".$db_prefix."attribute (`attr_id`,`attr_name`,`attr_type`,`attr_value`,`attr_input_type`,`cat_id`)
						VALUES(39,'电镀',0,'',1,5)");
$db->exe("REPLACE INTO ".$db_prefix."attribute (`attr_id`,`attr_name`,`attr_type`,`attr_value`,`attr_input_type`,`cat_id`)
						VALUES(40,'工艺',0,'',1,5)");
$db->exe("REPLACE INTO ".$db_prefix."attribute (`attr_id`,`attr_name`,`attr_type`,`attr_value`,`attr_input_type`,`cat_id`)
						VALUES(41,'包型',0,'',1,5)");
$db->exe("REPLACE INTO ".$db_prefix."attribute (`attr_id`,`attr_name`,`attr_type`,`attr_value`,`attr_input_type`,`cat_id`)
						VALUES(42,'面料成分',0,'',1,4)");
$db->exe("REPLACE INTO ".$db_prefix."attribute (`attr_id`,`attr_name`,`attr_type`,`attr_value`,`attr_input_type`,`cat_id`)
						VALUES(43,'大小',0,'',1,4)");
$db->exe("REPLACE INTO ".$db_prefix."attribute (`attr_id`,`attr_name`,`attr_type`,`attr_value`,`attr_input_type`,`cat_id`)
						VALUES(44,'风格',0,'',1,4)");
$db->exe("REPLACE INTO ".$db_prefix."attribute (`attr_id`,`attr_name`,`attr_type`,`attr_value`,`attr_input_type`,`cat_id`)
						VALUES(45,'开袋方式',0,'',1,4)");
$db->exe("REPLACE INTO ".$db_prefix."attribute (`attr_id`,`attr_name`,`attr_type`,`attr_value`,`attr_input_type`,`cat_id`)
						VALUES(46,'价格区间',0,'',1,4)");
$db->exe("REPLACE INTO ".$db_prefix."attribute (`attr_id`,`attr_name`,`attr_type`,`attr_value`,`attr_input_type`,`cat_id`)
						VALUES(47,'适应人群',0,'',1,4)");
$db->exe("REPLACE INTO ".$db_prefix."attribute (`attr_id`,`attr_name`,`attr_type`,`attr_value`,`attr_input_type`,`cat_id`)
						VALUES(48,'适应场合',0,'',1,4)");
$db->exe("REPLACE INTO ".$db_prefix."attribute (`attr_id`,`attr_name`,`attr_type`,`attr_value`,`attr_input_type`,`cat_id`)
						VALUES(49,'适应季节',0,'',1,4)");
$db->exe("REPLACE INTO ".$db_prefix."attribute (`attr_id`,`attr_name`,`attr_type`,`attr_value`,`attr_input_type`,`cat_id`)
						VALUES(50,'流行元素',0,'',1,4)");
$db->exe("REPLACE INTO ".$db_prefix."attribute (`attr_id`,`attr_name`,`attr_type`,`attr_value`,`attr_input_type`,`cat_id`)
						VALUES(51,' 裤长',0,'',1,1)");
$db->exe("REPLACE INTO ".$db_prefix."attribute (`attr_id`,`attr_name`,`attr_type`,`attr_value`,`attr_input_type`,`cat_id`)
						VALUES(52,' 裤型:',0,'',1,1)");
$db->exe("REPLACE INTO ".$db_prefix."attribute (`attr_id`,`attr_name`,`attr_type`,`attr_value`,`attr_input_type`,`cat_id`)
						VALUES(53,' 腰型',0,'',1,1)");
$db->exe("REPLACE INTO ".$db_prefix."attribute (`attr_id`,`attr_name`,`attr_type`,`attr_value`,`attr_input_type`,`cat_id`)
						VALUES(54,'适穿季节',0,'',1,1)");
$db->exe("REPLACE INTO ".$db_prefix."attribute (`attr_id`,`attr_name`,`attr_type`,`attr_value`,`attr_input_type`,`cat_id`)
						VALUES(55,'裙型',0,'',1,1)");
$db->exe("REPLACE INTO ".$db_prefix."attribute (`attr_id`,`attr_name`,`attr_type`,`attr_value`,`attr_input_type`,`cat_id`)
						VALUES(56,'袖型',0,'',1,1)");
