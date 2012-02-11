<?php
require_once dirname(__FILE__) . '/MySQL.php';

class Princess extends MySQL
{
  public $table = 'princess';
  public $schema = array(
    'facebook_id' => '',
    'name' => 'No name',
    'level' => 0,
    'score' => 0,
    'next_score' => 0,
    'pic' => ''
  );
}
