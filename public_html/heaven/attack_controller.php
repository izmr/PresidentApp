<?php
header('Content-type: application/json');
require_once( dirname(__FILE__) . '/index_controller.php' );




// 貢ぎによる計算
$current_money = $total_money - $president['used_money'];
$princess_need_money = $princess['level'] * PRINCESS_NEED_MONEY_COEFFICIENT;
if( $current_money >= $princess_need_money ) {
  $damage_coefficient = 1;
  $current_used_money = $princess_need_money;
  $total_used_money   = $president['used_money'] + $princess_need_money;
}
else {
  $damage_coefficient = $current_money / $princess_need_money;
  $current_used_money = $current_money;
  $total_used_money   = $total_money;
}
// メンバ全員のpowerの合計を算出
$damages  = array();
$damage   = 0;
foreach( $followers as $follower ) {
  $damage += (int)($follower["power"] * $damage_coefficient);
  array_push( $damages, (int)($follower["power"] * $damage_coefficient) );
}
$score  = $damage;
  // !!!ここら辺にPresidentのlevelやらpointの計算が入る感じ？
$President->update(array('used_money' => $total_used_money), array('facebook_id' => $facebook_id));
$princess_score      = $princess['score'] + $score;
$princess_level      = $princess['level'];
$princess_next_score = $princess['next_score'];
$is_level_up = $princess_score >= $princess['next_score'];
if ( $is_level_up ) {
  $princess_level      = $princess['level'] + 1;
  $princess_next_score = $princess['level'] * 300;
}
$Princess->update(array('score' => $princess_score), array('facebook_id' => $princess['facebook_id']));
$Princess->update(array('level' => $princess_level), array('facebook_id' => $princess['facebook_id']));
$Princess->update(array('next_score' => $princess_next_score), array('facebook_id' => $princess['facebook_id']));
/*
echo '$total_used_money : ' . $total_used_money;
echo '---';
echo "princess['score'] : " . $princess['score'];
echo '---';
echo '$score : ' . $score;
echo '---';
echo '$princess_score : ' . $princess_score;
echo '---';
echo '$princess_level : ' . $princess_level;
echo '---';
echo '$princess_next_score : ' . $princess_next_score;
echo '---';
*/

// 更に貢ぐとしたらどれくらいかかるかの値を取得
$current_money = $total_money - $total_used_money;
$princess_need_money = $princess_level * PRINCESS_NEED_MONEY_COEFFICIENT;
if( $current_money >= $princess_need_money ) {
  $expend_money = $princess_need_money;
}
else {
  $expend_money = $current_money;
}




// make response content
$response_content = array( 'used_money' => $current_used_money, 'damage' => $damages, 'score' => $princess['score'], 'next_score' => $princess['next_score'], 'expend_money' => $expend_money, 'is_level_up' => $is_level_up );

?>
