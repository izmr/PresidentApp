<?php
require_once dirname(__FILE__) . '/../const.php';
require_once dirname(__FILE__) . "/../vendor/php-sdk/src/facebook.php";
require_once dirname(__FILE__) . '/../model/Follower.php';

$Follower = new Follower();
$appId = APP_ID;
$secret = APP_SECRET;
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

$fql = 'SELECT uid,name,pic,sex FROM user WHERE uid IN (SELECT uid2 FROM friend WHERE uid1 = me())';
$followers = $facebook->api(array('method' => 'fql.query', 'query' => $fql));
$followers_data = array();
foreach ( $followers as $follower ) {
  $uid = $follower['uid'];
  $result = $Follower->findBy(array('facebook_id' => $uid));
  if ( $result->num_rows == 0 ) {
    $data = array(
      'facebook_id' => $uid,
      'name' => $follower['name'],
      'power' => rand(0, 100),
      'money' => rand(0, 100),
      'pic' => $follower['pic'],
      'sex' => $follower['sex'] == 'male' ? 0 : 1,
      'job_name' => Job::getJob()
    );
    $Follower->insert($data);
    array_push($followers_data, $data);
  } else {
    $follower_info = $result->fetch_assoc();
    array_push($followers_data, $follower_info );
  }
}
