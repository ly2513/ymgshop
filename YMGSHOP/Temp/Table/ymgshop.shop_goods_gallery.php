<?php if(!defined('HDPHP_PATH'))exit;
return array (
  'gallery_id' => 
  array (
    'field' => 'gallery_id',
    'type' => 'int(10) unsigned',
    'null' => 'NO',
    'key' => true,
    'default' => NULL,
    'extra' => 'auto_increment',
  ),
  'img_original' => 
  array (
    'field' => 'img_original',
    'type' => 'varchar(255)',
    'null' => 'YES',
    'key' => false,
    'default' => NULL,
    'extra' => '',
  ),
  'img_url' => 
  array (
    'field' => 'img_url',
    'type' => 'varchar(255)',
    'null' => 'YES',
    'key' => false,
    'default' => NULL,
    'extra' => '',
  ),
  'thumb_url' => 
  array (
    'field' => 'thumb_url',
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