<?php require_once dirname(__FILE__) . "/index_controller.php"; ?>

<!doctype html>
<!-- Conditional comment for mobile ie7 blogs.msdn.com/b/iemobile/ -->
<!--[if IEMobile 7 ]>    <html class="no-js iem7" lang="en"> <![endif]-->
<!--[if (gt IEMobile 7)|!(IEMobile)]><!--> <html class="no-js" lang="en"> <!--<![endif]-->

<head>
  <meta charset="utf-8">
  <title>あんたが社長</title>
  <meta name="description" content="">
  <meta name="HandheldFriendly" content="True">
  <meta name="MobileOptimized" content="320">
  <meta name="viewport" content="width=device-width">
  <link rel="apple-touch-icon-precomposed" sizes="114x114" href="/assets/img/h/apple-touch-icon.png">
  <link rel="apple-touch-icon-precomposed" sizes="72x72" href="/assets/img/m/apple-touch-icon.png">
  <link rel="apple-touch-icon-precomposed" href="/assets/img/l/apple-touch-icon-precomposed.png">
  <link rel="shortcut icon" href="/assets/img/l/apple-touch-icon.png">
  <meta http-equiv="cleartype" content="on">
  <link rel="stylesheet" href="/assets/css/screen.css">
  <script src="/assets/js/libs/modernizr-2.0.6.min.js"></script>
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
  <script>window.jQuery || document.write('<script src="js/libs/jquery-1.7.1.min.js"><\/script>')</script>
  <script src="/assets/js/helper.js"></script>
  <script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.templates/beta1/jquery.tmpl.js"></script>
  <script type="text/javascript" src="/assets/js/follower.js"></script>
</head>
<body id="follower-page">
  <div id="container">
    <header id="global-header">
      <h1>あなたの友達をフォロワーにセットしよう！</h1>
    </header>
    <div id="main" role="main">
      <section id="deck">
        <h1>フォロワー</h1>
        <ul class="follower-cards">
        <?php for ($i = 0; $i < 3; $i++): ?>
        <?php if (array_key_exists($i, $party)): ?>
        <?php $p = $party[$i]; ?>
          <li class="_blank">
            <article class="follower-card">
              <h1><?php echo $p['name'] ?></h1>
              <img class="icon big" src="<?php  echo $p['pic']?>" />
              <p class="power">Power: <?php echo $p['power'] ?></p>
              <p class="money">Money: <?php echo $p['money'] ?></p>
            </article>
          </li>
        <?php else: ?>
          <li class="blank"></li>
        <?php endif; ?>
        <?php endfor; ?>
        </ul>
      </section>
      <section id="followers-wrapper">
        <h1>友達リスト</h1>
        <ul class="followers">
          <?php foreach ( $followers_data as $follower ): ?>
            <li>
              <a href="http://example.com/">
                <article class="follower">
                  <img class="icon" src="<?php echo $follower['pic'] ?>" />
                  <div class="information">
                    <div>
                      <h1 class="name"><?php echo $follower['name'] ?></h1>
                      <span class="sex"><?php echo $follower['sex'] ? '(女性)' : '(男性)' ?></span>
                    </div>
                    <p class="jobname"><?php echo $follower['job_name'] ?></p>
                    <div>
                      <span class="power">Power: <?php echo $follower['power'] ?></span>
                      <span class="money">Money: <?php echo $follower['money'] ?></span>
                    </div>
                    <div class="hidden">
                      <span class="facebook-id"><?php echo $follower['facebook_id'] ?></span>
                      <span class="id"><?php echo $follower['id'] ?></span>
                    </div>
                  </div>
                </article>
              </a>
            </li>
          <?php endforeach; ?>
        </ul>
      </section>
      <p>
        <form id="followers-select-form" method="POST" action="/follower/add.php">
          <input type="hidden" name="follower_id1" value="<?php echo $party[0]['facebook_id'] ?>">
          <input type="hidden" name="follower_id2" value="<?php echo $party[1]['facebook_id'] ?>">
          <input type="hidden" name="follower_id3" value="<?php echo $party[2]['facebook_id'] ?>">
          <input type="submit" class="button" value="OK" />
        </form>
      </p>
    </div>
    <footer id="global-footer">
    </footer>
  </div> <!--! end of #container -->
  <script>
    var _gaq=[["_setAccount","UA-XXXXX-X"],["_trackPageview"]];
    (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];g.async=1;
    g.src=("https:"==location.protocol?"//ssl":"//www")+".google-analytics.com/ga.js";
    s.parentNode.insertBefore(g,s)}(document,"script"));
  </script>
</body>
</html>



