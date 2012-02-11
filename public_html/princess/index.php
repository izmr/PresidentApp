<?php
require_once("../vendor/php-sdk/src/facebook.php");
require_once( dirname(__FILE__) . "/../model/Princess.php");

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
// princessの構成
$fql = 'SELECT uid,pic,name FROM user WHERE uid IN ( SELECT uid2 FROM friend WHERE uid1 = me() )';
//echo $fql . "<br />";
$princesses = $facebook->api(array('method' => 'fql.query', 'query' => $fql));

//echo '<br />!!!!!!!!!!!!!!!!@@@@@@@@@@@@@@@@======================<br />';

// 【DB】
// 既にDBに登録されている姫：
//   情報（Scoreとか）を引っ張ってくる
// DBに未登録の姫：
//   登録する
$Model = new Princess();
foreach ( $princesses as $princess ) {
	$resultRef = $Model->findBy(array('facebook_id' => $princess['uid']));
	if ( $resultRef->num_rows != 0 ) {	// 登録されてる姫
		$result = $resultRef->fetch_assoc();
		//var_dump($result);
	} else {	// 登録されていない姫
		$data = array();
		$data['facebook_id'] = $princess['uid'];
		$data['name']        = $princess['name'];
		$data['level']       = 1;
		$data['score']       = 0;
		$data['next_score']  = 100;
		$data['pic']         = $princess['pic'];
		
		$Model->insert($data);
		//var_dump($data);
	}
}

//echo '<br />!!!!!!!!!!!!!!!!@@@@@@@@@@@@@@@@======================<br />';

?>


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
	<a href="add.php?princess_id=<?php echo $princess['uid']?>">OK</a>

<?php endforeach; ?>





<?php
/*
require_once( dirname(__FILE__) . "/../model/Follower.php");

$Follower = new Follower();

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
*/
?>



<?php else: ?>
<a href="<?php echo $facebook->getLoginUrl($loginParams); ?>">ログイン</a><br />
<?php endif; ?>

</body>
</html>
