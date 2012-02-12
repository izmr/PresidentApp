<?php require_once( dirname(__FILE__) . '/index_controller.php' ); ?>

<html>
<head>
<title>Facebook Test</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
</head>
<body>
<?php if ($facebook->getUser()): ?>



<?php
echo "<br />";
echo '###################################################';
echo "<br />";
echo "<br />";
echo "<br />";
?>


<a href="<?php echo $facebook->getLogoutUrl($loginParams); ?>">ログアウト</a><br />


<table>
<tr>
<td><img src="<?php echo $princess['pic'] ?>"></td>
<td>【姫】</td>
<td>name:<?php echo $princess['name'] ?></td>
<td>score:<?php echo $princess['score'] ?></td>
<td>next_score:<?php echo $princess['next_score'] ?></td>
</tr>
</table>


<?php foreach( $followers as $follower ): ?>
<table>
<tr>
<td><img src="<?php echo $follower['pic'] ?>"></td>
<td>【仲間】</td>
<td>name:<?php echo $follower['name'] ?></td>
<td>power:<?php echo $follower['power'] ?></td>
<td>money:<?php echo $follower['money'] ?></td>
</tr>
</table>
<?php endforeach; ?>


<?php

?>


<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js">
</script>
<script type="text/javascript">
function getJson(){
  $.getJSON("/heaven/attack.php", function(json){
    console.log( json );
  });
}
</script>

<br />
合計金額:<?php echo $total_money?>
<br />
<br />
<a style="color:#069" onclick="getJson()">あたっく</a>
<br />

【HELPボタン】（←これどーすんの？）

<?php else: ?>
<a href="<?php echo $facebook->getLoginUrl($loginParams); ?>">ログイン</a><br />
<?php endif; ?>

</body>
</html>
