<?php require_once( dirname(__FILE__) . '/index_controller.php' ); ?>

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
  <script type="text/javascript" src="/assets/js/girl.js"></script>
</head>

<body>

  <div id="container">
    <header id="global-header">
      <h1>応援するお姫様を選択してね</h1> 
    </header>
    <div id="main" role="main">
      <ul class="princesses">
        <?php foreach( $princesses as $princess ): ?>
        <li>
          <a href="add.php?princess_id=<?php echo $princess['uid']?>">
            <article class="princess">
              <img class="icon" src="<?php echo $princess['pic'] ?>" />
              <div class="information">
                <div>
                  <span class="level">レベル: <?php echo $princess['level'] ?></span>
                  <h1 class="name"><?php echo $princess['name'] ?></h1>
                </div>
                <div>
                  <span class="status">ヘブン状態！</span>
                  <span class="score">スコア: <?php echo $princess['score'] ?></span>
                </div>
                <div>
                  <span class="status">次のレベルまであと <?php echo $princess['next_score'] ?></span>
                </div>
              </div>
            </article>
          </a>
        </li>
        <?php endforeach; ?>
      </ul>
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
