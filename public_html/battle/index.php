<?php require_once dirname(__FILE__) . "/index_controller.php"; ?>
<html>
<head>
<title>接待で気持よくさせろ！</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
</head>
<body>





<table>
<tr>
<th>Pic</th>
<th>Name</th>
<th>level</th>
<th>score</th>
<th>next_score</th>
<th>facebook_id</th>
</tr>
<tr>
<td><img src="<?php echo $princess['pic'] ?>" /></td>
<td><?php echo $princess['name'] ?></td>
<td><?php echo $princess['level'] ?></td>
<td><?php echo $princess['score'] ?></td>
<td><?php echo $princess['next_score'] ?></td>
<td><?php echo $princess['facebook_id'] ?></td>
</tr>
</table>

<hr />

<table>
<tr>
<th>Pic</th>
<th>Name</th>
<th>Power</th>
<th>Money</th>
<th>Job</th>
<th>Sex</th>
<th>facebook_id</th>
</tr>
<?php foreach ( $cards_data as $card ): ?>
<tr>
<td><img src="<?php echo $card['pic'] ?>" /></td>
<td><?php echo $card['name'] ?></td>
<td><?php echo $card['power'] ?></td>
<td><?php echo $card['money'] ?></td>
<td><?php echo $card['job_name'] ?></td>
<td><?php echo $card['sex'] ? 'Female' : 'Male' ?></td>
<td><?php echo $card['facebook_id'] ?></td>
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
