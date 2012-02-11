<?php
require_once dirname(__FILE__) . '/../model/Princess.php';
require_once dirname(__FILE__) . '/../model/President.php';
require_once dirname(__FILE__) . '/../model/Party.php';
require_once dirname(__FILE__) . '/../model/Follower.php';
require dirname(__FILE__) . '/../const.php';
require dirname(__FILE__) . '/../vendor/php-sdk/src/facebook.php';


$President = new Princess(); // Model
$President = new President();
$Party = new Party();
$Follower = new Follower();
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
  header("Location: ../login.php");
  }
  
//姫取得
$president = $President->findBy(array('facebook_id' => $facebook_id));
$result  = $Princess->findBy(array('facebook_id' => $president['princess_id']));
if($result->num_rows == 0 ){
  header("HTTP/1.1 301 Moved Permanently");
  header("Location: ../princess.php");
}else{
  $princess  = $result->fetch_assoc();
}

//パーティー取得
//カード取得
$cards_data = array();
$result = $Party->findBy(array('president_id' => $facebook_id));
while ($row = $result->fetch_assoc()) {
   array_push($cards_data, $row);
}



