<?php
/**
 * 未ログインの者は全てここにリダイレクトされる
 * ログインしたらpresident/index.phpにリダイレクト
 */
require_once dirname(__FILE__) . '/../const.php';
require_once dirname(__FILE__) . '/../vendor/php-sdk/src/facebook.php';

$appId = APP_ID;
$secret = APP_SECRET;
$config = array();
$config['appId'] = $appId;
$config['secret'] = $secret;
$facebook = new Facebook($config);

$loginParams = array('scope' => 'user_birthday');
$facebook_id = $facebook->getUser();
if ( $facebook_id ) {
  header("HTTP/1.1 301 Moved Permanently");
  header("Location: /president/index.php");
}
