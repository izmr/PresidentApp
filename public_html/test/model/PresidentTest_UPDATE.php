<?php
require dirname(__FILE__) . '/../../model/President.php';

$Model = new President();
$data = array(
  'princess_id' => '10'
);
$condition = array(
  'facebook_id' => '1203983052',
);
echo $Model->update($data, $condition) . "\n<br />";

var_dump($insertData);
