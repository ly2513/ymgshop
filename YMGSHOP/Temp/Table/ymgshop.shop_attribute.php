<?php if(!defined('HDPHP_PATH'))exit;
return array (
  'attr_id' => 
  array (
    'field' => 'attr_id',
    'type' => 'int(10) unsigned',
    'null' => 'NO',
    'key' => true,
    'default' => NULL,
    'extra' => 'auto_increment',
  ),
  'attr_name' => 
  array (
    'field' => 'attr_name',
    'type' => 'varchar(45)',
    'null' => 'YES',
    'key' => false,
    'default' => NULL,
    'extra' => '',
  ),
  'attr_type' => 
  array (
    'field' => 'attr_type',
    'type' => 'tinyint(4)',
    'null' => 'YES',
    'key' => false,
    'default' => NULL,
    'extra' => '',
  ),
  'attr_value' => 
  array (
    'field' => 'attr_value',
    'type' => 'varchar(255)',
    'null' => 'YES',
    'key' => false,
    'default' => NULL,
    'extra' => '',
  ),
  'attr_input_type' => 
  array (
    'field' => 'attr_input_type',
    'type' => 'tinyint(4)',
    'null' => 'YES',
    'key' => false,
    'default' => '1',
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
);
?>