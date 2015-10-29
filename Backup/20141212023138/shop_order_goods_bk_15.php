<?php if(!defined('HDPHP_PATH'))EXIT;
$db->exe("REPLACE INTO ".$db_prefix."order_goods (`order_list_id`,`order_id`,`goods_name`,`goods_price`,`market_price`,`goods_number`,`goods_gid`,`goods_attr`,`goods_sn`,`product_sn`)
						VALUES('1','1','原创民俗纯手工绣花套头毛衫','299.00','499.00','4','2','颜色:红色|尺寸:M|','ymg_000002','21312312')");
$db->exe("REPLACE INTO ".$db_prefix."order_goods (`order_list_id`,`order_id`,`goods_name`,`goods_price`,`market_price`,`goods_number`,`goods_gid`,`goods_attr`,`goods_sn`,`product_sn`)
						VALUES('2','2','优雅时尚V领中长款套头毛衫','271.00','339.00','2','5','颜色:黑色|尺寸:M|','ymg_000005','21312312')");
