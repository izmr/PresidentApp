<?php
class Job
{
  //名称、ATK、Money
  //職業
  public static $job_table = array(
  array("魔法使い", 20, 20),
  array("ニート",  -20, -20),
  array("ITベンチャー社長",  -20, 50),
  array("学生",  10, 0),
  array("戦士", 10, 0),
  array("騎士",  10, 0),
  array("山賊", -20, 0),
  array("海賊", 20, 20),
  array("サムライ", 20, 10),
  array("商人", 0, 40),
  array("鍛冶屋",  0, -10),
  array("錬金術師", -40, 60),
  array("勇者（自称）", -10, 0),
  array("あそびにん", 80, -40)
  );
  //位置づけ
  public static $position_table = array(
  array("盛り上げ役",  20, 0),
  array("イケメン", 20, 0),
  array("最低", -30, 0),
  array("人間のクズ", -20, -10),
  array("おちょうしもの",  20, -10),
  array("自由人", 10, 10),
  array("盛り上げ役", 20, 0),
  array("盛り上げ役", 20, 0),
  array("ちょいワル", 10, 10),
  array("しろうと", 0, 0)
  );
  //雰囲気
  public static $mood_table = array(
  array("いたいけない",  10, 0),
  array("けむったい", -10, 0),
  array("神々しい", 40, 0),
  array("さしでがましい", -30, 0),
  array("じゃすいぶかい",  -10, 10),
  array("トゲトゲしい", -10, 0),
  array("ナウい", 30, 0),
  array("やかましい", 0, 0),
  array("わずらわしい", -50, -50),
  array("どちらでもない", 0, 0)
  );
  
  
  public static function getTableValue($user_id, $tbl, $idx) {
    $user_num = intval($user_id);
    return $tbl[$user_num % count($tbl)][$idx];
  }
  public static function getParamValue($user_id, $idx){
    $revision_param = getTableValue($user_id, self::$job_table, 1) +getTableValue($user_id, self::$mood_table, 1) +getTableValue($user_id, self::$position_table, 1) ;
   
   $base_param = intval($user_id) % 80;
   $param = $revision_param + $base_param;
   if($param > 100){
      return 100;
   }else if($param < 0){
      return 0;
   }else{
      return $param;
   }
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
    return getParamValue($user_id, 1);
 }
 public static function getMoney($user_id){
    return getParamValue($user_id, 2);
 }
  
  
  
  

}
