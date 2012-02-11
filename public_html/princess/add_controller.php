<?php
require dirname(__FILE__) . '/../facebook.php';
require dirname(__FILE__) . '/../model/President.php';

$facebook_id = $facebook->getUser();

$Model = new President();
$data = array( 'princess_id' => $_GET['princess_id'] );
$condition = array( 'facebook_id' => $facebook_id );
$result = $Model->update( $data, $condition );

// リダイレクト
header("HTTP/1.1 301 Moved Permanently");
header("Location: /president/index.php");
