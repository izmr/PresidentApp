<?php
require_once dirname(__FILE__) . '/MySQL.php';

class Party extends MySQL
{
  public $table = 'party';
  public $schema = array(
    'follower_id' => 0,
    'president_id' => 0,
  );
}
