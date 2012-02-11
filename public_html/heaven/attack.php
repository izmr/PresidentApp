<?php
//header('Content-type: application/json');

require_once( dirname(__FILE__) . '/../facebook.php' );
require_once( dirname(__FILE__) . "/../model/President.php");
require_once( dirname(__FILE__) . "/../model/Follower.php");
require_once( dirname(__FILE__) . "/../model/Party.php");

$President = new President();
$Follower  = new Follower();
$Party     = new Party();

// facebook_idの取得
$facebook_id = $facebook->getUser();

// President情報の取得
$presidents = $President->findBy(array('facebook_id' => $facebook_id));
if ( $presidents->num_rows == 0 ) {
	echo 'president取得の失敗なう';
	die;
}
$president = $presidents->fetch_assoc();


// Presidentに紐付くParty情報の取得
$party = array();
$result = $Party->findBy(array('president_id' => $president['id']));
while ($row = $result->fetch_assoc()) {
   array_push($party, $row);
}


// Presidentに紐付くPartyに紐付くFollowersのmoneies情報を取得
$moneies = array();
foreach( $party as $party_member ) {
	$result = $Follower->findBy(array('follower_id' => $party_member['id']));
	while ($row = $result->fetch_assoc()) {
		array_push($moneies, $row['money']);
	}
}

				// 仮データ
				array_push($moneies, '30' );
				array_push($moneies, '20' );
				array_push($moneies, '10' );


// DAMAGE算出

				// 仮データ
				$damages = array();
				array_push($damages, 30 );
				array_push($damages, 20 );
				array_push($damages, 10 );


// SCORE算出

				// 仮データ
				$scores = array();
				array_push($scores, 30 );
				array_push($scores, 20 );
				array_push($scores, 10 );



// make content
$total_money = 0;
foreach( $moneies as $money ) {
	$total_money += $money;
}
$content = array( 'used_money' => $total_money, 'damage' => $damages, 'score' => $scores );

// response by json
echo json_encode( $content );
?>
