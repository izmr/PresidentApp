<?php
require dirname(__FILE__) . '/../../model/Follower.php';

$Model = new Follower();
$insertData = array(
);
echo $Model->remove($insertData) . "\n<br />";

var_dump($insertData);
