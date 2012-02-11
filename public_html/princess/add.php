<?php
require_once("../vendor/php-sdk/src/facebook.php");
require dirname(__FILE__) . '/../model/President.php';

$appId = '346346428729240';
$secret = 'ea5fd9a005c0becd9e5277864bdf5417';
$config = array();
$config['appId'] = $appId;
$config['secret'] = $secret;

$facebook = new Facebook($config);
$loginParams = array('scope' => 'user_birthday');
$statusParam = array(
  'ok_session' => 'Now Login',
  'no_user' => 'No User',
  'no_session' => 'No Session'
);
?>

<?php

// 姫登録
$fql = 'SELECT uid FROM user WHERE uid = me()';
//$fql = 'SELECT me()';
$me = $facebook->api(array('method' => 'fql.query', 'query' => $fql));

echo $me[0]['uid'];

//echo $_GET['princess_id'];

$Model = new President();
$data = array( 'princess_id' => $_GET['princess_id'] );
$condition = array( 'facebook_id' => $me[0]['uid'] );
$result = $Model->update( $data, $condition );

//echo '<br />-----------------------------<br />';
//echo var_dump($data);
//echo '<br />-----------------------------<br />';
//echo var_dump($condition);
//echo '<br />-----------------------------<br />';
//echo var_dump($result);


// リダイレクト
header("HTTP/1.1 301 Moved Permanently");
header("Location: /president");
?>
