<?php
header('Content-type: application/json');
require_once( dirname(__FILE__) . '/index_controller.php' );
require_once( dirname(__FILE__) . '/attack_controller.php' );

// response by json
echo json_encode( $response_content );
?>
