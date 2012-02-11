<?php
require dirname(__FILE__) . '/../../model/President.php';

$Model = new President();
$insertData = array(
);
echo $Model->remove($insertData) . "\n<br />";

var_dump($insertData);
