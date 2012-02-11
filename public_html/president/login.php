<?php require_once dirname(__FILE__) . '/login_controller.php'; ?>

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
  <link rel="apple-touch-icon-precomposed" sizes="114x114" href="/view/img/h/apple-touch-icon.png">
  <link rel="apple-touch-icon-precomposed" sizes="72x72" href="/view/img/m/apple-touch-icon.png">
  <link rel="apple-touch-icon-precomposed" href="/view/img/l/apple-touch-icon-precomposed.png">
  <link rel="shortcut icon" href="/view/img/l/apple-touch-icon.png">
  <meta http-equiv="cleartype" content="on">
  <link rel="stylesheet" href="/view/css/screen.css">
  <script src="/view/js/libs/modernizr-2.0.6.min.js"></script>
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
  <script>window.jQuery || document.write('<script src="js/libs/jquery-1.7.1.min.js"><\/script>')</script>
  <script src="/view/js/helper.js"></script>
  <script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.templates/beta1/jquery.tmpl.js"></script>
  <script type="text/javascript" src="/view/js/girl.js"></script>
</head>
<body id="top-page">
  <div id="container">
    <header id="global-header">
    </header>
    <div id="main" role="main">
      <h1 id="logo">あなたが社長!! わたしが会長!!</h1>
      <a class="button" href="<?php echo $facebook->getLoginUrl() ?>">ログイン</a>
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
