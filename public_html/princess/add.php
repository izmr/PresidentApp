<?php
require_once("../vendor/php-sdk/src/facebook.php");

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
// 

// リダイレクト
header("HTTP/1.1 301 Moved Permanently");
header("Location: /battle");
?>
