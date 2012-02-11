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
<title>デッキを選ぼう！</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
</head>
<body>
<?php if ($facebook->getUser()): ?>
<!-- ログインしている場合の記述　START -->
<?php /* var_dump($facebook->getUser()); */ ?>
<a href="<?php echo $facebook->getLogoutUrl($loginParams); ?>">ログアウト</a><br />

<?php

	//職業・ステータス割り振り関数
	function getFromTable($user_id, $tbl){
		$user_num = intval($user_id);
		$ret = $tbl[$user_num % count($tbl)];
		
		return $ret;
	}
	function getJob($user_id){
	//職業
	$job_table = array("魔法使い", "ニート", "ITベンチャー社長", "学生", "戦士", "騎士", "山賊", "海賊", "サムライ", "商人", "鍛冶屋", "錬金術師", "勇者（時自称）", "あそびにん");
		return getFromTable($user_id, $job_table);
	}
	function getPosition($user_id){
	//位置づけ
	$position_table = array("盛り上げ役", "イケメン", "最低", "人間のクズ", "おちょうしもの", "自由人", "盛り上げ役", "盛り上げ役", "ちょいワル", "しろうと");
		return getFromTable($user_id, $position_table);
	}
	function getMood($user_id){
	//雰囲気
	$mood_table = array("いたいけない", "けむったい", "神々しい", "さしでがましい", "じゃすいぶかい", "トゲトゲしい", "ナウい", "やかましい", "わずらわしい", "どちらでもない",);
		return getFromTable($user_id, $mood_table);
	}
	
	
	$fql = 'SELECT uid, name, pic_square, pic FROM user WHERE uid = me()  OR uid IN (SELECT uid2 FROM friend WHERE uid1 = me())'; //２時間以内
	//$fql = 'SELECT pic, name, birthday, sex from user where uid = me()'; //自分のみ
	
	
	$result = $facebook->api(array('method' => 'fql.query', 'query' => $fql));//fql適用
	

	
	foreach ( $result as $user ) {
		$uid = $user['uid'];
		echo '<img src="'. $user['pic']. '" />'. $user['name']. ' 『'. getMood($uid). '』感じの『'. getPosition($uid). '』な『'.  getJob($uid).  '』<br />';
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

