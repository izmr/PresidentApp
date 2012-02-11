<?php
require dirname(__FILE__) . '/../vendor/php-sdk/src/facebook.php';

$appId = '346346428729240';
$secret = 'ea5fd9a005c0becd9e5277864bdf5417';
$config = array();
$config['appId'] = $appId;
$config['secret'] = $secret;

$facebook = new Facebook($config);
$loginParams = array('scope' => 'user_birthday');
$facebook_id = $facebook->getUser();
if ( $facebook_id ) {
  header("HTTP/1.1 301 Moved Permanently");
  header("Location: index.php");
}
