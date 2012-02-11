<?php
require dirname(__FILE__) . '/../../model/President.php';

$Model = new President();
$insertData = array(
  'facebook_id' => '1203983052',
  'pic' => 'http://profile.ak.fbcdn.net/hprofile-ak-snc4/187226_1203983052_6480414_s.jpg',
  'name' => 'Tatsuya Izumori'
);
echo $Model->insert($insertData) . "\n<br />";

var_dump($insertData);
