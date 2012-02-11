<?php require dirname(__FILE__) . '/index_controller.php';?>
<html>
<head>
<title>My Page</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
</head>
<body>
<img src="<?php echo $me['pic'] ?>" />
<?php echo $me['name'] ?>
<hr />
<a href="/follower/index.php">Card Deck</a>
<hr />
<a href="/princess/index.php">Choice Princess</a>
<hr />
<a href="<?php echo $facebook->getLogoutUrl() ?>">Logout</a>
<?php for($i = 0; $i < 100; $i++): ?>
<br />
<?php endfor; ?>
</body>
</html>
