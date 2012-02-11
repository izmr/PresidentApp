<?php
//require_once( dirname(__FILE__) . '/../facebook.php' );
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


<table>
<tr>
<td><img src="<?php echo $princess['pic'] ?>"></td>
<td>name:<?php echo $princess['name'] ?></td>
<td>score:<?php echo $princess['score'] ?></td>
<td>next_score:<?php echo $princess['next_score'] ?></td>
</tr>
</table>


<?php foreach( $followers as $follower ): ?>
<table>
<tr>
<td><img src="<?php echo $follower['pic'] ?>"></td>
<td>name:<?php echo $follower['name'] ?></td>
<td>power:<?php echo $follower['power'] ?></td>
<td>money:<?php echo $follower['money'] ?></td>
</tr>
</table>
<?php endforeach; ?>


<?php

?>


<script type="text/javascript">
function getJson(){
	alert( 1 );
}
</script>

<a style="color:#069" onclick="getJson()">あたっく</a>

【HELPボタン】（←これどーすんの？）

<?php else: ?>
<a href="<?php echo $facebook->getLoginUrl($loginParams); ?>">ログイン</a><br />
<?php endif; ?>

</body>
</html>
