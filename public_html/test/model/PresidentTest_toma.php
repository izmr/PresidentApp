<?php
require dirname(__FILE__) . '/../../model/President.php';

$Model = new President();
if ( $resultRef = $Model->findAll() ) {
  while ( $result = $resultRef->fetch_assoc() ) {
	  var_dump($result);
	  echo '<br />--------------<br />';
	}
} else {
  echo "No Result";
}
