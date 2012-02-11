<?php
class Job
{
  //名称、ATK、Money
  //職業
  public static $job_table = array(
  array("魔法使い", 0, 0),
  array("ニート",  0, 0),
  array("ITベンチャー社長",  0, 0),
  array("学生",  0, 0),
  array("戦士", 0, 0),
  array("騎士",  0, 0),
  array("山賊", 0, 0),
  array("海賊", 0, 0),
  array("サムライ", 0, 0),
  array("商人", 0, 0),
  array("鍛冶屋",  0, 0),
  array("錬金術師", 0, 0),
  array("勇者（自称）", 0, 0),
  array("あそびにん", 0, 0)
  );
  //位置づけ
  public static $position_table = array(
  array("盛り上げ役",  0, 0),
  array("イケメン", 0, 0),
  array("最低", 0, 0),
  array("人間のクズ", 0, 0),
  array("おちょうしもの",  0, 0),
  array("自由人", 0, 0),
  array("盛り上げ役", 0, 0),
  array("盛り上げ役", 0, 0),
  array("ちょいワル", 0, 0),
  array("しろうと", 0, 0)
  );
  //雰囲気
  public static $mood_table = array(
  array("いたいけない",  0, 0),
  array("けむったい", 0, 0),
  array("神々しい", 0, 0),
  array("さしでがましい", 0, 0),
  array("じゃすいぶかい",  0, 0),
  array("トゲトゲしい", 0, 0),
  array("ナウい", 0, 0),
  array("やかましい", 0, 0),
  array("わずらわしい", 0, 0),
  array("どちらでもない", 0, 0)
  );
  
  
  public static function getTableValue($user_id, $tbl, $idx) {
    $user_num = intval($user_id);
    return $tbl[$user_num % count($tbl)][$idx];
  }
  
  public static function getJob($user_id) {
    return getTableValue($user_id, self::$job_table, 0);
  }
  public static function getMood($user_id) {
    return getTableValue($user_id, self::$mood_table, 0);
  }
  public static function getPosition($user_id) {
    return getTableValue($user_id, self::$position_table, 0);
  }
  
  public static function getPower($user_id){
    return getTableValue($user_id, self::$position_table, 1);
  }
  
  public static function getMoney($user_id){
    return getTableValue($user_id, self::$position_table, 2);
  }
  
  
  
  

}
