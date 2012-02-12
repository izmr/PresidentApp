<?php
require dirname(__FILE__) . '/../../model/Follower.php';

$Model = new Follower();
$insertData = array(
);
echo $Model->deleteAll() . "\n<br />";

var_dump($insertData);
