<?php
require_once( dirname(__FILE__) . "/../../vendor/php-sdk/src/facebook.php");

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
<html>
<head>
<title>Facebook Test</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
</head>
<body>
<?php if ($facebook->getUser()): ?>
<?php 
  $fql = 'SELECT pic, name, sex from user where uid = me()';
  $me = $facebook->api(array('method' => 'fql.query', 'query' => $fql));
  var_dump($facebook->getUser());
  var_dump($me);
?>
<a href="<?php echo $facebook->getLogoutUrl($loginParams); ?>">ログアウト</a><br />
<?php else: ?>
<a href="<?php echo $facebook->getLoginUrl($loginParams); ?>">ログイン</a><br />
<?php endif; ?>
</body>
</html>
