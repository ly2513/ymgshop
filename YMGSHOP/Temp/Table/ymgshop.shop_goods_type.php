<?php if(!defined('HDPHP_PATH'))exit;
return array (
  'cat_id' => 
  array (
    'field' => 'cat_id',
    'type' => 'int(11)',
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
);
?>