<?php
require_once( dirname(__FILE__) . '/../facebook.php' );
require_once( dirname(__FILE__) . "/../model/Princess.php");

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
for ( $i=0; $i<count($princesses); ++$i ) {
  $resultRef = $Model->findBy(array('facebook_id' => $princesses[$i]['uid']));
  if ( $resultRef->num_rows != 0 ) {  // 登録されてる姫
    $result = $resultRef->fetch_assoc();
    //var_dump($result);
    
    // 姫のDB値設定
    $level       = $result['level'];
    $score       = $result['score'];
    $next_score  = $result['next_score'];
  } else {  // 登録されていない姫
    // DBへInsert
    $data = array();
    $data['facebook_id'] = $princesses[$i]['uid'];
    $data['name']        = $princesses[$i]['name'];
    $data['level']       = 1;
    $data['score']       = 0;
    $data['next_score']  = 100;
    $data['pic']         = $princesses[$i]['pic'];
    $Model->insert($data);
    //var_dump($data);
    
    // 姫のデフォルト値設定
    $level       = 1;
    $score       = 0;
    $next_score  = 100;
  }

  // 姫のDB値設定
  $princesses[$i]['level']       = $level;
  $princesses[$i]['score']       = $score;
  $princesses[$i]['next_score']  = $next_score;
}

//echo '<br />!!!!!!!!!!!!!!!!@@@@@@@@@@@@@@@@======================<br />';

?>


