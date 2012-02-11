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
<table>
<tr>
<?php foreach($party as $p): ?>
<td><img src="<?php echo $p['pic'] ?>"></td>
<?php endforeach; ?>
</tr>
<tr>
<?php foreach($party as $p): ?>
<td><?php echo $p['name'] ?></td>
<?php endforeach; ?>
</tr>
</table>
<a href="/follower/index.php">Card Deck</a>
<hr />
<?php if ( $princess ): ?>
<table>
<tr>
<td><img src="<?php echo $princess['pic'] ?>"></td>
<td><?php echo $princess['name'] ?></td>
</tr>
</table>
<?php endif; ?>
<a href="/princess/index.php">Choice Princess</a>
<hr />
<a href="<?php echo $facebook->getLogoutUrl() ?>">Logout</a>
<?php for($i = 0; $i < 100; $i++): ?>
<br />
<?php endfor; ?>
</body>
</html>
