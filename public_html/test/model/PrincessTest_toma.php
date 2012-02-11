<?php
require dirname(__FILE__) . '/../../model/Princess.php';

$Model = new Princess();
if ( $resultRef = $Model->findAll() ) {
  while ( $result = $resultRef->fetch_assoc() ) {
    var_dump($result);
    echo '<br />----------------------------<br />';
  }
} else {
  echo "No Result";
}
