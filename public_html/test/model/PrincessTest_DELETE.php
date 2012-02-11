<?php
require dirname(__FILE__) . '/../../model/Princess.php';

$Model = new Princess();
$insertData = array(
	'facebook_id' => '1203983052'
);
echo $Model->remove($insertData) . "\n<br />";

var_dump($insertData);
