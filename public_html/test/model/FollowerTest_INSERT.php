<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
</head>
<body>
<?php
require_once( dirname(__FILE__) . "/../../vendor/php-sdk/src/facebook.php");
require_once( dirname(__FILE__) . "/../../model/Follower.php");

$Follower = new Follower();
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

if ($facebook->getUser()) {
  $fql = 'SELECT uid,name,pic,sex FROM user WHERE uid IN(SELECT uid2 FROM friend where uid1 = me())';
  $followers = $facebook->api(array('method' => 'fql.query', 'query' => $fql));

  foreach ( $followers as $follower ) {
    $data = array();
    $data['facebook_id'] = $follower['uid'];
    $data['name']        = $follower['name'];
    $data['pic']         = $follower['pic'];
    $data['power']       = rand(1, 100);
    $data['money']       = rand(1, 100);
    $data['job_name']    = Job::getJob();
    $uid = $follower['uid'];

    $result = $Follower->findBy(array( 'facebook_id' => $uid ));
    if ( $result->num_rows == 0 ) {
      $Follower->insert($data);
      var_dump($data);
    }
    echo "<hr />";
  }
} else {
?>
<a href="<?php echo $facebook->getLoginUrl($loginParams); ?>">ログイン</a><br />
<?php } ?>
</body>
</html>
