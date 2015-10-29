<?php if(!defined('HDPHP_PATH'))EXIT;
$db->exe("REPLACE INTO ".$db_prefix."order (`order_id`,`order_sn`,`uid`,`consignee`,`address`,`amount`,`order_status`,`cancel_time`,`add_time`,`tel`,`mobile`,`zipcode`,`payway`,`order_note`)
						VALUES('1','SN0141212570','2','李勇','安徽省合肥市瑶海区山东路11号','1196.00','0','','1418353940','10','1599053123','32767','','')");
$db->exe("REPLACE INTO ".$db_prefix."order (`order_id`,`order_sn`,`uid`,`consignee`,`address`,`amount`,`order_status`,`cancel_time`,`add_time`,`tel`,`mobile`,`zipcode`,`payway`,`order_note`)
						VALUES('2','SN0141212127','2','李勇','安徽省合肥市瑶海区山东路11号','542.00','2','1418365689','1418365673','10','1599053123','32767','','')");
