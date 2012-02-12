<?php
/**
 * 全コントローラの開始時に計算する
 * used_moneyが0より大きい時、updated_atから再計算
 * 現在の設定：1秒に1回復
 */
require_once dirname(__FILE__) . '/model/President.php';
require_once dirname(__FILE__) . '/facebook.php';

define(RECOVER_RATE, 1);

function __calc_used_money($facebook) {
  $President = new President();
  $condition = array(
    'facebook_id' => $facebook->getUser()
  );
  $me = $President->findBy($condition)->fetch_assoc();
  if ( $me['used_money'] > 0 ) {
    $now = time();
    $updated_at = $me['updated_at'];

    // 回復量を計算
    $recover = ($now - $updated_at) * RECOVER_RATE;
    $used_money = $me['used_money'] - $recover;
    if ( $used_money < 0 ) $used_money = 0;
    $data = array(
      'used_money' => $used_money,
      'updated_at' => $now
    );
    $President->update($data, $condition);
  }
}
__calc_used_money($facebook);
