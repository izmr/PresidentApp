<?php
/**
 * My Pageトップ画面
 * 未ログインの場合はlogin.phpにリダイレクトされる
 * また、Partyが未選択の場合は自動的にFollower選択画面に遷移
 */
require dirname(__FILE__) . '/../facebook.php';
require dirname(__FILE__) . '/../model/President.php';
require dirname(__FILE__) . '/../model/Princess.php';
require dirname(__FILE__) . '/../model/Party.php';
require dirname(__FILE__) . '/../model/Follower.php';

// President,Princess,Party モデルを用意
$President = new President();
$Princess = new Princess();
$Party = new Party();
$Follower = new Follower();

// PresidentがDBに存在するか確認
$result = $President->findBy(array('facebook_id' => $facebook->getUser()));

// ログイン中のPresiden情報
$me = array();

// MySQLにデータが存在しない場合はINSERT
if ($result->num_rows == 0) {
  $fql = 'SELECT uid,name,pic_small,sex FROM user where uid = me()';
  $r = $facebook->api(array('method' => 'fql.query', 'query' => $fql));
  // Presidentデータを用意
  $data = array (
    'facebook_id' => $r[0]['uid'],
    'name' => $r[0]['name'],
    'pic' => $r[0]['pic_small'],
    'updatedAt' => mktime(),
    'point' => 0,
    'level' => 0,
    'sex' => $r[0]['sex'] == 'male' ? 0 : 1
  );
  $President->insert($data);
  $me = $data;
} else {
  $me = $result->fetch_assoc();
}

// Party情報取得を試みる
$party = array();
$partyResult = $Party->findBy(array('president_id' => $facebook->getUser()));

// Partyが0以上 = 誰かしらデッキに入ってる場合
if ( $partyResult->num_rows > 0 ) {
  while ($p = $partyResult->fetch_assoc()) {
    $follower = $Follower->findBy(array('facebook_id' => $p['follower_id']));
    $f = $follower->fetch_assoc();
    if ( !is_null($f) ) array_push($party, $f);
  }
}

// Partyが空=未選択の場合, /follower/index.phpにリダイレクト
if ( count($party) == 0 ) {
  header("HTTP/1.1 301 Moved Permanently");
  header("Location: /follower/index.php");
}

// Princess情報取得を試みる
$princess = array();
if ( isset($me['princess_id']) ) {
  $result = $Princess->findBy(array('facebook_id' => $me['princess_id']));
  if ( $result->num_rows != 0 ) {
    $princess = $result->fetch_assoc();
  }
}
