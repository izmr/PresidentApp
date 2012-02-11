<?php
require '../vendor/php-sdk/src/facebook.php';

$facebook = new Facebook(array(
  'appId' => '346346428729240',
  'secret' => 'ea5fd9a005c0becd9e5277864bdf5417'
));

$user = $facebook->getUser();

if ( $user ) {
  echo "login!";
} else {
  $loginUrl = $facebook->getLoginUrl();
}
