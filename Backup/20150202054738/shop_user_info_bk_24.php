<?php if(!defined('HDPHP_PATH'))EXIT;
$db->exe("REPLACE INTO ".$db_prefix."user_info (`addr_id`,`addr_content`,`uid`,`name`,`province`,`city`,`area`,`postcode`,`phone`,`tel`,`email`,`status`)
						VALUES('1','北京市朝阳区小营路5号四方大厦1825','2','李勇','北京市','北京市','朝阳区','100011','1599053123','010-65690200-021','123213@qq.com','0')");
$db->exe("REPLACE INTO ".$db_prefix."user_info (`addr_id`,`addr_content`,`uid`,`name`,`province`,`city`,`area`,`postcode`,`phone`,`tel`,`email`,`status`)
						VALUES('13','北京市朝阳区小营路5号四方大厦1825','2','李勇','山东省','济南市','泰山区','100011','1599053123','010-65690200-021','123213@qq.com','1')");
$db->exe("REPLACE INTO ".$db_prefix."user_info (`addr_id`,`addr_content`,`uid`,`name`,`province`,`city`,`area`,`postcode`,`phone`,`tel`,`email`,`status`)
						VALUES('12','上海市普陀区','4','李勇','上海市','上海市','普陀区','123123','2147483647','010-65690100','626375290@qq.com','0')");
