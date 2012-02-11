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
  "トゲトゲしい", "ナウい", "やかましい", "わずらわしい", "どちらでもない",);
  public static function getJob() {
    return self::$mood_table[ rand(0, count(self::$mood_table)) ]
    . self::$position_table[ rand(0, count(self::$position_table)) ]
    . self::$job_table[ rand(0, count(self::$job_table)) ];
  }
}
