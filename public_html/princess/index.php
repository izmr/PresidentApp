<?php require_once( dirname(__FILE__) . '/index_controller.php' ); ?>
<html>
<head>
<title>Facebook Test</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
</head>
<body>
<a href="<?php echo $facebook->getLogoutUrl($loginParams); ?>">ログアウト</a><br />

<?php foreach( $princesses as $princess ): ?>

<img src="<?php echo $princess['pic'] ?>" /><br />
名前：<?php echo $princess['name'] ?><br />
pt:<?php echo $princess['score'] ?><br />
<a href="add.php?princess_id=<?php echo $princess['uid']?>">OK</a><br />

<?php endforeach; ?>
</body>
</html>
