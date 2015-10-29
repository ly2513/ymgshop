<?php if(!defined('HDPHP_PATH'))exit;
return array (
  'cid' => 
  array (
    'field' => 'cid',
    'type' => 'int(10) unsigned',
    'null' => 'NO',
    'key' => true,
    'default' => NULL,
    'extra' => 'auto_increment',
  ),
  'cat_name' => 
  array (
    'field' => 'cat_name',
    'type' => 'varchar(45)',
    'null' => 'YES',
    'key' => false,
    'default' => NULL,
    'extra' => '',
  ),
  'pid' => 
  array (
    'field' => 'pid',
    'type' => 'int(11)',
    'null' => 'YES',
    'key' => false,
    'default' => NULL,
    'extra' => '',
  ),
  'is_show' => 
  array (
    'field' => 'is_show',
    'type' => 'tinyint(4)',
    'null' => 'YES',
    'key' => false,
    'default' => NULL,
    'extra' => '',
  ),
  'cat_key' => 
  array (
    'field' => 'cat_key',
    'type' => 'varchar(80)',
    'null' => 'YES',
    'key' => false,
    'default' => NULL,
    'extra' => '',
  ),
  'cat_desc' => 
  array (
    'field' => 'cat_desc',
    'type' => 'varchar(255)',
    'null' => 'YES',
    'key' => false,
    'default' => NULL,
    'extra' => '',
  ),
  'measure_unit' => 
  array (
    'field' => 'measure_unit',
    'type' => 'char(10)',
    'null' => 'YES',
    'key' => false,
    'default' => NULL,
    'extra' => '',
  ),
  'grade' => 
  array (
    'field' => 'grade',
    'type' => 'tinyint(255)',
    'null' => 'YES',
    'key' => false,
    'default' => NULL,
    'extra' => '',
  ),
);
?>