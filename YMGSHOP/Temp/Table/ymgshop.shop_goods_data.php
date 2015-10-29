<?php if(!defined('HDPHP_PATH'))exit;
return array (
  'gd_id' => 
  array (
    'field' => 'gd_id',
    'type' => 'int(10) unsigned',
    'null' => 'NO',
    'key' => true,
    'default' => NULL,
    'extra' => 'auto_increment',
  ),
  'goods_key' => 
  array (
    'field' => 'goods_key',
    'type' => 'varchar(80)',
    'null' => 'YES',
    'key' => false,
    'default' => NULL,
    'extra' => '',
  ),
  'goods_desc' => 
  array (
    'field' => 'goods_desc',
    'type' => 'varchar(255)',
    'null' => 'YES',
    'key' => false,
    'default' => NULL,
    'extra' => '',
  ),
  'goods_body' => 
  array (
    'field' => 'goods_body',
    'type' => 'varchar(255)',
    'null' => 'YES',
    'key' => false,
    'default' => NULL,
    'extra' => '',
  ),
  'goods_gid' => 
  array (
    'field' => 'goods_gid',
    'type' => 'int(10) unsigned',
    'null' => 'NO',
    'key' => false,
    'default' => NULL,
    'extra' => '',
  ),
);
?>