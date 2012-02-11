<?php
class MySQL
{
  public $mysql;

  public function __construct() {
    $this->mysql = new mysqli(
      'mysqlserver',
      'mypresident2',
      'mypresident2',
      '20120211'
    );
  }
}
