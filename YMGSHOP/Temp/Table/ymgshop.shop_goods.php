<?php if(!defined('HDPHP_PATH'))exit;
return array (
  'gid' => 
  array (
    'field' => 'gid',
    'type' => 'int(10) unsigned',
    'null' => 'NO',
    'key' => true,
    'default' => NULL,
    'extra' => 'auto_increment',
  ),
  'goods_name' => 
  array (
    'field' => 'goods_name',
    'type' => 'varchar(100)',
    'null' => 'YES',
    'key' => false,
    'default' => NULL,
    'extra' => '',
  ),
  'goods_sn' => 
  array (
    'field' => 'goods_sn',
    'type' => 'varchar(50)',
    'null' => 'YES',
    'key' => false,
    'default' => NULL,
    'extra' => '',
  ),
  'goods_weight' => 
  array (
    'field' => 'goods_weight',
    'type' => 'varchar(45)',
    'null' => 'YES',
    'key' => false,
    'default' => NULL,
    'extra' => '',
  ),
  'weight_unit' => 
  array (
    'field' => 'weight_unit',
    'type' => 'varchar(45)',
    'null' => 'YES',
    'key' => false,
    'default' => NULL,
    'extra' => '',
  ),
  'original_img' => 
  array (
    'field' => 'original_img',
    'type' => 'varchar(255)',
    'null' => 'YES',
    'key' => false,
    'default' => NULL,
    'extra' => '',
  ),
  'goods_img' => 
  array (
    'field' => 'goods_img',
    'type' => 'varchar(255)',
    'null' => 'YES',
    'key' => false,
    'default' => NULL,
    'extra' => '',
  ),
  'sale_time' => 
  array (
    'field' => 'sale_time',
    'type' => 'int(11)',
    'null' => 'YES',
    'key' => false,
    'default' => NULL,
    'extra' => '',
  ),
  'goods_thumb' => 
  array (
    'field' => 'goods_thumb',
    'type' => 'varchar(255)',
    'null' => 'YES',
    'key' => false,
    'default' => NULL,
    'extra' => '',
  ),
  'goods_number' => 
  array (
    'field' => 'goods_number',
    'type' => 'mediumint(9)',
    'null' => 'YES',
    'key' => false,
    'default' => NULL,
    'extra' => '',
  ),
  'goods_click' => 
  array (
    'field' => 'goods_click',
    'type' => 'mediumint(9)',
    'null' => 'YES',
    'key' => false,
    'default' => NULL,
    'extra' => '',
  ),
  'uid' => 
  array (
    'field' => 'uid',
    'type' => 'int(11)',
    'null' => 'YES',
    'key' => false,
    'default' => NULL,
    'extra' => '',
  ),
  'is_hot' => 
  array (
    'field' => 'is_hot',
    'type' => 'tinyint(4)',
    'null' => 'YES',
    'key' => false,
    'default' => '0',
    'extra' => '',
  ),
  'is_new' => 
  array (
    'field' => 'is_new',
    'type' => 'tinyint(4)',
    'null' => 'YES',
    'key' => false,
    'default' => '0',
    'extra' => '',
  ),
  'is_best' => 
  array (
    'field' => 'is_best',
    'type' => 'tinyint(4)',
    'null' => 'YES',
    'key' => false,
    'default' => '0',
    'extra' => '',
  ),
  'market_price' => 
  array (
    'field' => 'market_price',
    'type' => 'decimal(10,2)',
    'null' => 'YES',
    'key' => false,
    'default' => NULL,
    'extra' => '',
  ),
  'goods_price' => 
  array (
    'field' => 'goods_price',
    'type' => 'decimal(10,2)',
    'null' => 'YES',
    'key' => false,
    'default' => NULL,
    'extra' => '',
  ),
  'is_on_sale' => 
  array (
    'field' => 'is_on_sale',
    'type' => 'tinyint(4)',
    'null' => 'YES',
    'key' => false,
    'default' => NULL,
    'extra' => '',
  ),
  'bid' => 
  array (
    'field' => 'bid',
    'type' => 'int(10) unsigned',
    'null' => 'NO',
    'key' => false,
    'default' => NULL,
    'extra' => '',
  ),
  'cat_id' => 
  array (
    'field' => 'cat_id',
    'type' => 'int(11)',
    'null' => 'NO',
    'key' => false,
    'default' => NULL,
    'extra' => '',
  ),
  'cid' => 
  array (
    'field' => 'cid',
    'type' => 'smallint(6)',
    'null' => 'NO',
    'key' => false,
    'default' => NULL,
    'extra' => '',
  ),
);
?>