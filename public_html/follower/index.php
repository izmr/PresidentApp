<?php require_once dirname(__FILE__) . "/index_controller.php"; ?>
<html>
<head>
<title>デッキを選ぼう！</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
</head>
<body>
<?php if ($facebook->getUser()): ?>
<!-- ログインしている場合の記述　START -->
<a href="<?php echo $facebook->getLogoutUrl($loginParams); ?>">ログアウト</a><br />

<table>
<tr>
<th>Pic</th>
<th>Name</th>
<th>Power</th>
<th>Money</th>
<th>Job</th>
<th>Sex</th>
</tr>
<?php foreach ( $followers_data as $follower ): ?>
<tr>
<td><img src="<?php echo $follower['pic'] ?>" /></td>
<td><?php echo $follower['name'] ?></td>
<td><?php echo $follower['power'] ?></td>
<td><?php echo $follower['money'] ?></td>
<td><?php echo $follower['job_name'] ?></td>
<td><?php echo $follower['sex'] ? 'Female' : 'Male' ?></td>
</tr>
<?php endforeach; ?>
</table>

<!-- ログインしている場合の記述　END -->
<?php else: ?>
<!-- 未ログインの記述　START --> 
<a href="<?php echo $facebook->getLoginUrl($loginParams); ?>">ログイン</a><br />
<!-- 未ログインの記述　END -->
<?php endif; ?>

</body>
</html>
