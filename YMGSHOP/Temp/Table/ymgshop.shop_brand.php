<?php if(!defined('HDPHP_PATH'))exit;
return array (
  'bid' => 
  array (
    'field' => 'bid',
    'type' => 'int(10) unsigned',
    'null' => 'NO',
    'key' => true,
    'default' => NULL,
    'extra' => 'auto_increment',
  ),
  'brand_name' => 
  array (
    'field' => 'brand_name',
    'type' => 'varchar(50)',
    'null' => 'YES',
    'key' => false,
    'default' => NULL,
    'extra' => '',
  ),
  'brand_logo' => 
  array (
    'field' => 'brand_logo',
    'type' => 'varchar(255)',
    'null' => 'YES',
    'key' => false,
    'default' => NULL,
    'extra' => '',
  ),
  'brand_order' => 
  array (
    'field' => 'brand_order',
    'type' => 'smallint(255)',
    'null' => 'YES',
    'key' => false,
    'default' => NULL,
    'extra' => '',
  ),
);
?>