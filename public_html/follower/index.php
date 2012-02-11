<?php
require_once("../vendor/php-sdk/src/facebook.php");

require_once("../model/MySQL.php");
require_once("../model/Job.php");



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
<title>デッキを選ぼう！</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
</head>
<body>
<?php if ($facebook->getUser()): ?>
<!-- ログインしている場合の記述　START -->
<?php /* var_dump($facebook->getUser()); */ ?>
<a href="<?php echo $facebook->getLogoutUrl($loginParams); ?>">ログアウト</a><br />

<?php
	
	
	$fql = 'SELECT uid, name, pic_square, pic FROM user WHERE uid IN (SELECT uid2 FROM friend WHERE uid1 = me())'; //自分を除外したフレンド
	
	$result = $facebook->api(array('method' => 'fql.query', 'query' => $fql));//fql適用
	
	
	foreach ( $result as $user ) {
		$uid = $user['uid'];
		
		
		
		echo '<img src="'. $user['pic']. '" />'. $user['name']. ' 『'. Job::getMood($uid). '』感じの『'. Job::getPosition($uid). '』な『'.  Job::getJob($uid).  '』<br />';
	}
	
?>


<!-- ログインしている場合の記述　END -->
<?php else: ?>
<!-- 未ログインの記述　START --> 
<a href="<?php echo $facebook->getLoginUrl($loginParams); ?>">ログイン</a><br />
<!-- 未ログインの記述　END -->
<?php endif; ?>

</body>
</html>
</html>

