<?php
require dirname(__FILE__) . '/../model/President.php';
require dirname(__FILE__) . '/../const.php';
require dirname(__FILE__) . '/../vendor/php-sdk/src/facebook.php';

$President = new President(); // Model
$appId = APP_ID;
$secret = APP_SECRET;

$config = array();
$config['appId'] = $appId;
$config['secret'] = $secret;

$facebook = new Facebook($config);
$loginParams = array('scope' => 'user_birthday');
$facebook_id = $facebook->getUser();
if ( !$facebook_id ) {
  header("HTTP/1.1 301 Moved Permanently");
  header("Location: login.php");
}

$result = $President->findBy(array('facebook_id' => $facebook_id));
$me = array();
if ($result->num_rows == 0) {
  $fql = 'SELECT uid,name,pic,sex FROM user where uid = me()';
  $r = $facebook->api(array('method' => 'fql.query', 'query' => $fql));
  $data = array (
    'facebook_id' => $facebook_id,
    'name' => $r[0]['name'],
    'pic' => $r[0]['pic'],
    'updatedAt' => '0',
    'point' => 0,
    'level' => 0
  );
  $President->insert($data);
  $me = $data;
} else {
  $me = $result->fetch_assoc();
}
