<?php
require_once( dirname(__FILE__) . '/../facebook.php' );
require_once( dirname(__FILE__) . "/../model/President.php");
require_once( dirname(__FILE__) . "/../model/Follower.php");
require_once( dirname(__FILE__) . "/../model/Party.php");
require_once( dirname(__FILE__) . "/../model/Princess.php");

// 下準備なう
$President = new President();
$Follower  = new Follower();
$Party     = new Party();
$Princess  = new Princess();

// facebook_idの取得
$facebook_id = $facebook->getUser();

// President情報の取得
$presidents = $President->findBy(array('facebook_id' => $facebook_id));
if ( $presidents->num_rows == 0 ) {
	echo 'president取得の失敗なう';
	die;
}
$president = $presidents->fetch_assoc();

//echo var_dump($president);


// Presidentに紐付くParty情報の取得
echo var_dump($president);
echo '<br />!!!!!!!!!!!!!!!!~~~~~~~~~~~~~~~~======================<br />';
echo $president['id'];
$party = array();
$result = $Party->findBy(array('president_id' => $president['id']));
while ($row = $result->fetch_assoc()) {
   array_push($party, $row);
}
echo '<br />!!!!!!!!!!!!!!!!~~~~~~~~~~~~~~~~======================<br />';
echo var_dump($party);
echo '<br />!!!!!!!!!!!!!!!!~~~~~~~~~~~~~~~~======================<br />';


// Presidentに紐付くPartyに紐付くFollowers情報の取得
$followers = array();
foreach( $party as $party_member ) {
	$result = $Follower->findBy(array('follower_id' => $party_member['id']));
	while ($row = $result->fetch_assoc()) {
		array_push($followers, $row);
	}
}
				// 仮データ
				array_push($followers, array( 'name' => 'follower1（仮ネーム）', 'power' => '10', 'money' => '30', 'pic' => "http://profile.ak.fbcdn.net/hprofile-ak-snc4/371672_1842172315_621016225_s.jpg" ) );
				array_push($followers, array( 'name' => 'follower1（仮ネーム）', 'power' => '20', 'money' => '20', 'pic' => "http://profile.ak.fbcdn.net/hprofile-ak-snc4/371672_1842172315_621016225_s.jpg" ) );
				array_push($followers, array( 'name' => 'follower1（仮ネーム）', 'power' => '30', 'money' => '10', 'pic' => "http://profile.ak.fbcdn.net/hprofile-ak-snc4/371672_1842172315_621016225_s.jpg" ) );

echo '<br />||||||||||||||||||||||||||||||||||||\\<br />';
echo var_dump( $followers );
echo '<br />||||||||||||||||||||||||||||||||||||\\<br />';

// Presidentに紐付くPrincess情報の取得
$result  = $Princess->findBy(array('facebook_id' => $president['princess_id']));
if($result->num_rows == 0 ){
  header("HTTP/1.1 301 Moved Permanently");
  header("Location: /princess/");
  die;
}
$princess  = $result->fetch_assoc();


// followersのmoneyの合計
$total_money = 0;
foreach( $followers as $follower ) {
	$total_money += $follower['money'];
}


echo '<br />!!!!!!!!!!!!!!!!@@@@@@@@@@@@@@@@======================<br />';


?>


<?php

