<?php
require dirname(__FILE__) . '/MySQL.php';

class President extends MySQL
{
  public $table = 'president';
  public $schema = array(
    'facebook_id' => '',
    'name' => 'No name',
    'level' => 0,
    'point' => 0,
    'pic' => ''
  );
}
