<?php
require_once dirname(__FILE__) . '/MySQL.php';

class President extends MySQL
{
  public $table = 'president';
  public $schema = array(
    'facebook_id' => '',
    'name' => 'No name',
    'level' => 0,
    'point' => 0,
    'pic' => '',
    'updated_at' => 0,
    'sex' => 0, # 0 = male, 1 = female
    'used_money' => 0,
    'princess_id' => 0
  );
}
