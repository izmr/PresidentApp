<?php
require dirname(__FILE__) . '/MySQL.php';

class President extends MySQL
{
  public $table = 'president';

  public function find() {
    $sql = "SELECT * FROM " . $table;
    return $this->mysql->query($sql);
  }
}
