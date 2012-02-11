<?php
require_once( dirname(__FILE__) . '/index_controller.php' );

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
echo "<br />";
echo '###################################################';
echo "<br />";
echo "<br />";
echo "<br />";
?>


<a href="<?php echo $facebook->getLogoutUrl($loginParams); ?>">ログアウト</a><br />

<?php foreach( $princesses as $princess ): ?>

<img src="<?php echo $princess['pic'] ?>" /><br />
名前：<?php echo $princess['name'] ?><br />
pt:<?php echo $princess['score'] ?><br />
<a href="add.php?princess_id=<?php echo $princess['uid']?>">OK</a><br />

<?php endforeach; ?>




<?php else: ?>
<a href="<?php echo $facebook->getLoginUrl($loginParams); ?>">ログイン</a><br />
<?php endif; ?>

</body>
</html>
