<?php
/**
 * Followerを最大3名受け取ってカードデッキに格納する
 */
require_once dirname(__FILE__) . '/../facebook.php';
require_once dirname(__FILE__) . '/../model/Party.php';

// Party Model用意
$Party = new Party();
$president_id = $facebook->getUser();

// follower_ids = Facebook ID
$follower_ids = array();
array_push($follower_ids, $_POST['follower_id1']);
array_push($follower_ids, $_POST['follower_id2']);
array_push($follower_ids, $_POST['follower_id3']);

if ( count($follower_ids) > 0 ) {
  $Party->remove(array('president_id' => $president_id));

  foreach( $follower_ids as $follower_id ) {
    $data = array(
      'president_id' => $president_id,
      'follower_id' => $follower_id
    );
    $Party->insert($data);
  }
}

header("HTTP/1.1 301 Moved Permanently");
header("Location: /president/index.php");
