<?php
class Job
{
  public static $job_table = array("魔法使い","ニート", 
  "ITベンチャー社長", "学生", "戦士", "騎士", 
  "山賊", "海賊", "サムライ", "商人", "鍛冶屋", 
  "錬金術師", "勇者（時自称）", "あそびにん");
//位置づけ
  public static $position_table = array("盛り上げ役", 
  "イケメン", "最低", "人間のクズ", "おちょうしもの", 
  "自由人", "盛り上げ役", "盛り上げ役", "ちょいワル", "しろうと");
//雰囲気
  public static $mood_table = array("いたいけない", 
  "けむったい", "神々しい", "さしでがましい", "じゃすいぶかい", 
  "トゲトゲしい", "ナウい", "やかましい", "わずらわしい", "どちらでもない");
  
  
  public static function getJob($user_id) {
    $user_num = intval($user_id);
    return self::$job_table[$user_num % count(self::$job_table)];
  }
  public static function getMood($user_id) {
    $user_num = intval($user_id);
    return self::$mood_table[$user_num % count(self::$mood_table)];
  }
  public static function getPosition($user_id) {
    $user_num = intval($user_id);
    return self::$position_table[$user_num % count(self::$position_table)];
  }
}
