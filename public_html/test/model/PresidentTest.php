<?php
require dirname(__FILE__) . '/../../model/President.php';

$Model = new President();
if ( $result = $Model->find() ) {
  var_dump($result);
} else {
  echo "No Result";
}
