<?php
require dirname(__FILE__) . '/../../model/Princess.php';

$Model = new Princess();
$insertData = array(
);
echo $Model->remove($insertData) . "\n<br />";

var_dump($insertData);
