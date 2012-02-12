<?php
class MySQL
{
  public $mysql;
  public $table = 'MySQL';
  public $schema = array();

  public function __construct() {
    $this->mysql = new mysqli(
      "mysqlserver",
      "mypresident2",
      "20120211",
      "mypresident2"
    );
  }

  public function update( $data, $condition ) {
    $sql = "UPDATE " . $this->table . " SET ";
    foreach ( $data as $key => $value ) {
      $sql .= " $key='$value',";
    }
    $sql = rtrim($sql, ',');

    if ( $condition ) {
      $sql .= " WHERE ";
      $and = false;
      foreach ($condition as $key => $value) {
        if ($and) $sql .= ' AND ';
        $sql .= " $key='$value' ";
      }
    }
    return $this->mysql->query($sql);
  }

  public function findBy ( $condition ) {
    $sql = "SELECT * FROM " . $this->table;
    if ( $condition ) {
      $sql .= " WHERE ";
      $and = false;
      foreach ($condition as $key => $value) {
        if ($and) $sql .= ' AND ';
        $sql .= " $key='$value' ";
      }
    }
    return $this->mysql->query($sql);
  }

  public function findAll() {
    $sql = "SELECT * FROM " . $this->table;
    return $this->mysql->query($sql);
  }

  public function insert($data) {
    $insertData = array();
    foreach( $this->schema as $key => $value ) {
      if ( array_key_exists($key, $data) ) {
        $insertData[$key] = $data[$key];
      } else {
        $insertData[$key] = $value; // set default value
      }
    }
    
    if ( $insertData ) {
      $sql = "INSERT INTO " . $this->table . "( ";
      foreach ( $insertData as $key => $value ) {
        $sql .= $key . ',';
      }
      $sql = rtrim($sql, ',');
      $sql .= ') ';
      $sql .= " VALUES ( ";
      foreach ( $insertData as $value ) {
        $sql .= "'$value',";
      }
      $sql = rtrim($sql, ',');
      $sql .= ') ';
      return $this->mysql->query($sql);
    }
  }

  public function remove( $condition ) {
    $sql = "DELETE FROM " . $this->table;
    if ( $condition ) {
      $sql .= " WHERE ";
      $and = false;
      foreach ($condition as $key => $value) {
        if ($and) $sql .= ' AND ';
        $sql .= " $key='$value' ";
      }
    }
    return $this->mysql->query($sql);
   }
   public function deleteAll(){
     $sql = "TRUNCATE " . $this->table;
     return $this->mysql->query($sql);
   }
}
