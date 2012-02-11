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
<html>
<head>
<title>Facebook Test</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
</head>
<body>
<?php if ($facebook->getUser()): ?>
<?php var_dump($facebook->getUser()); ?>
<a href="<?php echo $facebook->getLogoutUrl($loginParams); ?>">ログアウト</a><br />
<?php else: ?>
<a href="<?php echo $facebook->getLoginUrl($loginParams); ?>">ログイン</a><br />
<?php endif; ?>

<?php
$fql = 'SELECT uid2 FROM friend WHERE uid1 = me()';
$friends_uid = $facebook->api(array('method' => 'fql.query', 'query' => $fql));


echo '@@@@@@@@@@@@@@@@======================';
echo "<br />";
$tmp_uids = array();
for( $i=0; $i<count($friends_uid); ++$i ) {
	array_push( $tmp_uids, $friends_uid[$i]['uid2'] );
}
$fql = 'SELECT pic,name from user where uid in ( ' . join( ',', $tmp_uids ) . ' )';
echo $fql;
echo "<br />";
$friends = $facebook->api(array('method' => 'fql.query', 'query' => $fql));



for( $i=0; $i<count($friends_uid); ++$i ) {
	$friends[$i]['point'] = 0;
}

?>


<?php
echo "<br />";
echo '@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@';
echo "<br />";
echo var_dump($friends);
echo "<br />";
echo '###################################################';
echo "<br />";
echo "<br />";
echo "<br />";
?>



<?php

for( $i=0; $i<count($friends); ++$i ) {
	echo '<img src="' . $friends[$i]['pic'] . '" />';
	echo '<br />';
	echo '名前：' . $friends[$i]['name'];
	echo '<br />';
	
	echo 'pt:' . $points[$i];
	echo '<br />';
}

?>


<a href="add.php">OK</a>


</body>
</html>
