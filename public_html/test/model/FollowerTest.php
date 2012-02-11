<?php
require dirname(__FILE__) . '/../../model/Follower.php';

$Model = new Follower();
if ( $resultRef = $Model->findAll() ) {
  $result = $resultRef->fetch_all();
  var_dump($result);
} else {
  echo "No Result";
}
