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
<a href="<?php echo $facebook->getLogoutUrl($loginParams); ?>">ログアウト</a><br />
<?
$fql = 'SELECT pic,name,birthday,sex from user where uid = me()';
$me = $facebook->api(array('method' => 'fql.query', 'query' => $fql));
?>
<img src="<? echo $me[0]['pic'] ?>" /><br />
Name: <? echo $me[0]['name'] ?><br />
Birthday: <? echo $me[0]['birthday'] ?><br />
Sex: <? echo $me[0]['sex'] ?>
<hr />
<? else: ?>
<a href="<?php echo $facebook->getLoginUrl($loginParams); ?>">ログイン</a><br />
<? endif; ?>
<?php if ( $facebook->getUser() ) {
	$user_id = $facebook->getUser();
	$fql = 'select pic_small,name,sex,birthday_date from user where uid IN (SELECT uid2 from friend where uid1 = me()) and birthday_date != ""';
	$ret = $facebook->api(
		array('method' => 'fql.query', 
		'query' => $fql)); ?>
<table>
<tr>
<th>Picture</th>
<th>Name</th>
<th>Birthday</th>
<th>Sex</th>
</tr>
<? foreach ( $ret as $user ) { ?>
<tr>
<td><img src="<? echo $user['pic_small'] ?>" /></td>
<td><? echo $user['name'] ?></td>
<td><? echo $user['birthday_date'] ?></td>
<td><? echo $user['sex'] ?></td>
</tr>

<?} ?>
</table>
<? } ?>
</body>
</html>
