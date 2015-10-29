<?php if(!defined('HDPHP_PATH'))EXIT;
$db->exe("DROP TABLE IF EXISTS `".$db_prefix."access`");
$db->exe("CREATE TABLE `".$db_prefix."access` (
  `access_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `rid` int(11) DEFAULT NULL,
  `module` varchar(30) DEFAULT NULL,
  `controller` varchar(30) DEFAULT NULL,
  `action` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`access_id`)
) ENGINE=MyISAM AUTO_INCREMENT=93 DEFAULT CHARSET=utf8");
$db->exe("DROP TABLE IF EXISTS `".$db_prefix."attribute`");
$db->exe("CREATE TABLE `".$db_prefix."attribute` (
  `attr_id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '属性id',
  `attr_name` varchar(45) DEFAULT NULL COMMENT '属性名称',
  `attr_type` tinyint(4) DEFAULT NULL COMMENT '属性类型0普通属性，1规格属性',
  `attr_value` varchar(255) DEFAULT NULL COMMENT '商品属性值',
  `attr_input_type` tinyint(4) DEFAULT '1' COMMENT '商品录入方式1文本，2下拉列表框，3文本域',
  `cat_id` int(11) NOT NULL COMMENT '商品类型id',
  PRIMARY KEY (`attr_id`)
) ENGINE=MyISAM AUTO_INCREMENT=57 DEFAULT CHARSET=utf8");
$db->exe("DROP TABLE IF EXISTS `".$db_prefix."brand`");
$db->exe("CREATE TABLE `".$db_prefix."brand` (
  `bid` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '品牌id',
  `brand_name` varchar(50) DEFAULT NULL COMMENT '品牌名称',
  `brand_logo` varchar(255) DEFAULT NULL COMMENT '品牌logo',
  `brand_order` smallint(255) DEFAULT NULL COMMENT '品牌排序',
  PRIMARY KEY (`bid`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8");
$db->exe("DROP TABLE IF EXISTS `".$db_prefix."category`");
$db->exe("CREATE TABLE `".$db_prefix."category` (
  `cid` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '栏目id',
  `cat_name` varchar(45) DEFAULT NULL COMMENT '栏目名称',
  `pid` int(11) DEFAULT NULL COMMENT '父级栏目id',
  `is_show` tinyint(4) DEFAULT NULL COMMENT '是否显示',
  `cat_key` varchar(80) DEFAULT NULL COMMENT '栏目关键字',
  `cat_desc` varchar(255) DEFAULT NULL COMMENT '栏目描述',
  `measure_unit` char(10) DEFAULT NULL COMMENT '数量单位',
  `grade` tinyint(255) DEFAULT NULL COMMENT '价格区间',
  `cat_id` int(10) unsigned DEFAULT NULL COMMENT '栏目id',
  PRIMARY KEY (`cid`)
) ENGINE=MyISAM AUTO_INCREMENT=208 DEFAULT CHARSET=utf8");
$db->exe("DROP TABLE IF EXISTS `".$db_prefix."comment`");
$db->exe("CREATE TABLE `".$db_prefix."comment` (
  `comment_id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '评论id',
  `title` varchar(45) DEFAULT NULL COMMENT '评论标题',
  `content` varchar(100) DEFAULT NULL COMMENT '评论内容',
  `color` char(10) DEFAULT NULL COMMENT '商品颜色',
  `size` char(10) DEFAULT NULL COMMENT '商品尺寸',
  `time` int(10) DEFAULT NULL COMMENT '评论添加时间',
  `grade` tinyint(5) DEFAULT NULL COMMENT '评论等级,总共5个等级，1,2,3,4,5',
  `goods_gid` int(10) unsigned NOT NULL COMMENT '商品gid',
  PRIMARY KEY (`comment_id`),
  KEY `fk_shop_comment_shop_goods1_idx` (`goods_gid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8");
$db->exe("DROP TABLE IF EXISTS `".$db_prefix."config`");
$db->exe("CREATE TABLE `".$db_prefix."config` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `name` varchar(45) DEFAULT NULL COMMENT '配置项名称',
  `value` varchar(225) DEFAULT NULL COMMENT '配置项值',
  `type` enum('text','radio','textarea') DEFAULT NULL COMMENT '配置项录入类型显示类型:text/radio/textarea',
  `info` varchar(225) DEFAULT NULL COMMENT '参数如:radio   1|开启,0|关闭',
  `orderlist` smallint(6) DEFAULT NULL,
  `is_show` tinyint(4) DEFAULT NULL COMMENT '是否显示',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8");
$db->exe("DROP TABLE IF EXISTS `".$db_prefix."goods`");
$db->exe("CREATE TABLE `".$db_prefix."goods` (
  `gid` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '商品id',
  `goods_name` varchar(100) DEFAULT NULL COMMENT '商品名',
  `goods_sn` varchar(50) DEFAULT NULL COMMENT '货号',
  `goods_weight` varchar(45) DEFAULT NULL COMMENT '商品种重量',
  `weight_unit` varchar(45) DEFAULT NULL COMMENT '重量单位',
  `original_img` varchar(255) DEFAULT NULL COMMENT '商品原图',
  `goods_img` varchar(255) DEFAULT NULL COMMENT '商品图',
  `sale_time` int(11) DEFAULT NULL COMMENT '上架时间',
  `goods_thumb` varchar(255) DEFAULT NULL COMMENT '商品缩略图',
  `goods_number` mediumint(9) DEFAULT NULL COMMENT '商品库存量',
  `goods_click` mediumint(9) DEFAULT NULL COMMENT '浏览次数',
  `uid` int(11) DEFAULT NULL COMMENT '管理员id',
  `is_hot` tinyint(4) DEFAULT NULL COMMENT '热销',
  `is_new` tinyint(4) DEFAULT NULL COMMENT '新品',
  `is_best` tinyint(4) DEFAULT NULL COMMENT '精品',
  `market_price` decimal(10,2) DEFAULT NULL COMMENT '市场价格',
  `goods_price` decimal(10,2) DEFAULT NULL COMMENT '商城价格',
  `is_on_sale` tinyint(4) DEFAULT NULL COMMENT '上架',
  `bid` int(10) unsigned NOT NULL COMMENT '品牌id',
  `cat_id` int(11) NOT NULL COMMENT '商品类型id',
  `cid` smallint(6) NOT NULL COMMENT '栏目id',
  `user_uid` int(10) unsigned NOT NULL COMMENT '管理员id',
  `status` tinyint(1) DEFAULT '1' COMMENT '1表示不回收，0表示回收',
  PRIMARY KEY (`gid`),
  KEY `fk_shop_goods_shop_brand1_idx` (`bid`),
  KEY `fk_shop_goods_shop_goods_type1_idx` (`cat_id`),
  KEY `fk_shop_goods_shop_user1_idx` (`user_uid`)
) ENGINE=MyISAM AUTO_INCREMENT=31 DEFAULT CHARSET=utf8");
$db->exe("DROP TABLE IF EXISTS `".$db_prefix."goods_attr`");
$db->exe("CREATE TABLE `".$db_prefix."goods_attr` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `attr_value` varchar(200) DEFAULT NULL COMMENT '属性值',
  `attr_price` decimal(10,2) DEFAULT NULL COMMENT '附加价格',
  `goods_gid` int(10) unsigned NOT NULL COMMENT '商品id',
  `attr_id` int(11) NOT NULL COMMENT '属性类型id',
  PRIMARY KEY (`id`),
  KEY `fk_goods_attr_shop_goods1_idx` (`goods_gid`),
  KEY `fk_goods_attr_shop_attribute1_idx` (`attr_id`)
) ENGINE=MyISAM AUTO_INCREMENT=466 DEFAULT CHARSET=utf8");
$db->exe("DROP TABLE IF EXISTS `".$db_prefix."goods_data`");
$db->exe("CREATE TABLE `".$db_prefix."goods_data` (
  `gd_id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '商品id',
  `goods_key` varchar(80) DEFAULT NULL COMMENT '商品关键字',
  `goods_desc` text COMMENT '商品描述',
  `goods_body` text COMMENT '商品详情',
  `goods_gid` int(10) unsigned NOT NULL,
  PRIMARY KEY (`gd_id`),
  KEY `fk_shop_goods_data_shop_goods1_idx` (`goods_gid`)
) ENGINE=MyISAM AUTO_INCREMENT=31 DEFAULT CHARSET=utf8");
$db->exe("DROP TABLE IF EXISTS `".$db_prefix."goods_gallery`");
$db->exe("CREATE TABLE `".$db_prefix."goods_gallery` (
  `gallery_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `img_original` varchar(255) DEFAULT NULL COMMENT '原图',
  `img_url` varchar(255) DEFAULT NULL COMMENT '中图',
  `thumb_url` varchar(255) DEFAULT NULL COMMENT '缩略图',
  `goods_gid` int(10) unsigned NOT NULL,
  PRIMARY KEY (`gallery_id`),
  KEY `fk_shop_goods_gallery_shop_goods1_idx` (`goods_gid`)
) ENGINE=MyISAM AUTO_INCREMENT=207 DEFAULT CHARSET=utf8");
$db->exe("DROP TABLE IF EXISTS `".$db_prefix."goods_type`");
$db->exe("CREATE TABLE `".$db_prefix."goods_type` (
  `cat_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '商品类型表，商品类型id',
  `cat_name` varchar(45) DEFAULT NULL COMMENT '商品类型名',
  PRIMARY KEY (`cat_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8");
$db->exe("DROP TABLE IF EXISTS `".$db_prefix."node`");
$db->exe("CREATE TABLE `".$db_prefix."node` (
  `nid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(30) DEFAULT NULL,
  `title` varchar(100) DEFAULT NULL,
  `pid` int(11) DEFAULT NULL,
  `level` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`nid`)
) ENGINE=MyISAM AUTO_INCREMENT=35 DEFAULT CHARSET=utf8");
$db->exe("DROP TABLE IF EXISTS `".$db_prefix."order`");
$db->exe("CREATE TABLE `".$db_prefix."order` (
  `order_id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '订单id',
  `order_sn` char(12) DEFAULT NULL COMMENT '订单号',
  `uid` int(11) NOT NULL COMMENT '用户',
  `consignee` varchar(50) DEFAULT NULL COMMENT '收货人',
  `address` varchar(255) DEFAULT NULL COMMENT '地址',
  `amount` decimal(10,2) DEFAULT NULL COMMENT '总费用',
  `order_status` tinyint(4) DEFAULT '0' COMMENT '订单状态',
  `cancel_time` int(10) DEFAULT NULL COMMENT '取消时间',
  `add_time` int(10) DEFAULT NULL COMMENT '生成时间',
  `tel` int(11) DEFAULT NULL COMMENT '手机号码',
  `mobile` int(11) DEFAULT NULL COMMENT '电话号码',
  `zipcode` smallint(6) DEFAULT NULL COMMENT '邮编',
  `payway` varchar(30) DEFAULT NULL,
  `order_note` varchar(255) DEFAULT NULL COMMENT '备注',
  PRIMARY KEY (`order_id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8");
$db->exe("DROP TABLE IF EXISTS `".$db_prefix."order_goods`");
$db->exe("CREATE TABLE `".$db_prefix."order_goods` (
  `order_list_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL COMMENT '订单id',
  `goods_name` char(255) DEFAULT NULL COMMENT '商品名称',
  `goods_price` decimal(10,2) DEFAULT NULL COMMENT '商城价',
  `market_price` decimal(10,2) DEFAULT NULL COMMENT '市场价格',
  `goods_number` tinyint(3) unsigned DEFAULT NULL COMMENT '购买数量',
  `goods_gid` int(10) unsigned NOT NULL,
  `goods_attr` varchar(200) DEFAULT NULL COMMENT '商品属性',
  `goods_sn` varchar(20) DEFAULT NULL COMMENT '商品货号',
  `product_sn` int(11) unsigned NOT NULL,
  PRIMARY KEY (`order_list_id`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8");
$db->exe("DROP TABLE IF EXISTS `".$db_prefix."product`");
$db->exe("CREATE TABLE `".$db_prefix."product` (
  `product_id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '货品id',
  `product_sn` varchar(45) DEFAULT NULL COMMENT '货号',
  `product_number` smallint(6) DEFAULT NULL COMMENT '库存量',
  `goods_attr` char(50) DEFAULT NULL COMMENT '组合属性id',
  `goods_gid` int(10) unsigned NOT NULL COMMENT '商品id',
  PRIMARY KEY (`product_id`),
  KEY `fk_product_shop_goods1_idx` (`goods_gid`)
) ENGINE=MyISAM AUTO_INCREMENT=143 DEFAULT CHARSET=utf8");
$db->exe("DROP TABLE IF EXISTS `".$db_prefix."role`");
$db->exe("CREATE TABLE `".$db_prefix."role` (
  `rid` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '角色id',
  `role_name` varchar(50) DEFAULT NULL COMMENT '角色名称',
  PRIMARY KEY (`rid`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8");
$db->exe("DROP TABLE IF EXISTS `".$db_prefix."s_city`");
$db->exe("CREATE TABLE `".$db_prefix."s_city` (
  `CityID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `CityName` char(50) DEFAULT NULL,
  `ZipCode` varchar(50) DEFAULT NULL,
  `ProvinceID` int(10) unsigned NOT NULL,
  `DateCreated` int(10) DEFAULT NULL,
  `DateUpdated` int(10) DEFAULT NULL,
  PRIMARY KEY (`CityID`)
) ENGINE=InnoDB AUTO_INCREMENT=346 DEFAULT CHARSET=utf8");
$db->exe("DROP TABLE IF EXISTS `".$db_prefix."s_district`");
$db->exe("CREATE TABLE `".$db_prefix."s_district` (
  `DistrictID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `DistrictName` varchar(50) DEFAULT NULL,
  `CityID` int(10) unsigned NOT NULL,
  `DateCreated` int(10) DEFAULT NULL,
  `DateUpdated` int(10) DEFAULT NULL,
  PRIMARY KEY (`DistrictID`)
) ENGINE=InnoDB AUTO_INCREMENT=2863 DEFAULT CHARSET=utf8");
$db->exe("DROP TABLE IF EXISTS `".$db_prefix."s_province`");
$db->exe("CREATE TABLE `".$db_prefix."s_province` (
  `ProvinceID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ProvinceName` char(50) DEFAULT NULL,
  `DateCreated` datetime DEFAULT NULL COMMENT '数据创建时间',
  `DateUpdated` datetime DEFAULT NULL COMMENT '数据更新时间',
  PRIMARY KEY (`ProvinceID`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8");
$db->exe("DROP TABLE IF EXISTS `".$db_prefix."user`");
$db->exe("CREATE TABLE `".$db_prefix."user` (
  `uid` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '用户id',
  `username` varchar(50) DEFAULT NULL COMMENT '账号',
  `password` varchar(32) DEFAULT NULL COMMENT '密码',
  `token` varchar(32) DEFAULT NULL COMMENT '令牌',
  `rid` int(10) unsigned NOT NULL,
  `email` varchar(100) DEFAULT NULL COMMENT '用户注册邮箱',
  `phone` int(11) DEFAULT NULL,
  PRIMARY KEY (`uid`),
  KEY `fk_shop_user_shop_role1_idx` (`rid`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8");
$db->exe("DROP TABLE IF EXISTS `".$db_prefix."user_info`");
$db->exe("CREATE TABLE `".$db_prefix."user_info` (
  `addr_id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '地址id',
  `addr_content` varchar(255) DEFAULT NULL COMMENT '用户地址',
  `uid` int(10) unsigned NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `province` varchar(50) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `area` varchar(50) DEFAULT NULL,
  `postcode` varchar(45) DEFAULT NULL,
  `phone` int(11) DEFAULT NULL,
  `tel` varchar(45) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL COMMENT '邮箱',
  `status` tinyint(1) DEFAULT '0' COMMENT '地址状态',
  PRIMARY KEY (`addr_id`),
  KEY `fk_shop_user_addr_shop_user1_idx` (`uid`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8");
$db->exe("DROP TABLE IF EXISTS `".$db_prefix."user_role`");
$db->exe("CREATE TABLE `".$db_prefix."user_role` (
  `uid` int(11) DEFAULT NULL,
  `rid` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8");
