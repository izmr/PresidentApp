<?php require_once dirname(__FILE__) . "/index_controller.php"; ?>
<html>
<head>
<title>デッキを選ぼう！</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
</head>
<body>
<a href="<?php echo $facebook->getLogoutUrl(); ?>">ログアウト</a><br />

<form method="POST" action="/follower/add.php">
<input type="text" name="follower_id1" value="<?php echo $party[0]['follower_id'] ?>">
<input type="text" name="follower_id2" value="<?php echo $party[1]['follower_id'] ?>">
<input type="text" name="follower_id3" value="<?php echo $party[2]['follower_id'] ?>">
<input type="submit" value="Add Followers">
</form>

<table>
<tr>
<th>id</th>
<th>Pic</th>
<th>Facebook ID</th>
<th>Name</th>
<th>Power</th>
<th>Money</th>
<th>Job</th>
<th>Sex</th>
</tr>
<?php foreach ( $followers_data as $follower ): ?>
<tr>
<td><?php echo $follower['id'] ?></td>
<td><img src="<?php echo $follower['pic'] ?>" /></td>
<td><?php echo $follower['facebook_id'] ?></td>
<td><?php echo $follower['name'] ?></td>
<td><?php echo $follower['power'] ?></td>
<td><?php echo $follower['money'] ?></td>
<td><?php echo $follower['job_name'] ?></td>
<td><?php echo $follower['sex'] ? 'Female' : 'Male' ?></td>
</tr>
<?php endforeach; ?>
</table>

</body>
</html>
