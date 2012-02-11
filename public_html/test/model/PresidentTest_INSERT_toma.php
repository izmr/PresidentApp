<?php
require dirname(__FILE__) . '/../../model/President.php';

$Model = new President();
$insertData = array(
  'facebook_id' => '100003256942366',
  'pic' => '',
  'name' => 'toma'
);
echo $Model->insert($insertData) . "\n<br />";

var_dump($insertData);
