<?php
require dirname(__FILE__) . '/../../model/Princess.php';

$Model = new Princess();
if ( $resultRef = $Model->findAll() ) {
  $result = $resultRef->fetch_all();
  var_dump($result);
} else {
  echo "No Result";
}
if ( $resultRef = $Model->findBy(array('id' => '2')) ) {
  $result = $resultRef->fetch_all();
  var_dump($result);
} else {
  echo "No Result";
}
