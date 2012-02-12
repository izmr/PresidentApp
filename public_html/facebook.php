<?php
require_once dirname(__FILE__) . '/const.php';
require_once dirname(__FILE__) . '/vendor/php-sdk/src/facebook.php';

// Facebookオブジェクトを生成
$appId = APP_ID;
$secret = APP_SECRET;
$config = array();
$config['appId'] = $appId;
$config['secret'] = $secret;
$facebook = new Facebook($config);

// ログイン確認　未ログインの場合はpresident/login.phpにリダイレクト
if ( !$facebook->getUser() ) {
  header("HTTP/1.1 301 Moved Permanently");
  header("Location: /president/login.php");
}
