<?php require dirname(__FILE__) . '/login_controller.php'; ?>

<html>
<head>
<title>My Page</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
</head>
<body>
<a href="<?php echo $facebook->getLoginUrl($loginParams) ?>">Login</a>
<?php for($i = 0; $i < 100; $i++): ?>
<br />
<?php endfor; ?>
</body>
</html>
