<?php require_once( dirname(__FILE__) . '/index_controller.php' ); ?>
<!doctype html>
<!-- Conditional comment for mobile ie7 blogs.msdn.com/b/iemobile/ -->
<!--[if IEMobile 7 ]>    <html class="no-js iem7" lang="en"> <![endif]-->
<!--[if (gt IEMobile 7)|!(IEMobile)]><!--> <html class="no-js" lang="en"> <!--<![endif]-->

<head>
  <meta charset="utf-8">

  <title></title>
  <meta name="description" content="">

  <!-- Mobile viewport optimization h5bp.com/ad -->
  <meta name="HandheldFriendly" content="True">
  <meta name="MobileOptimized" content="320">
  <meta name="viewport" content="width=device-width">

  <!-- Home screen icon  Mathias Bynens mathiasbynens.be/notes/touch-icons -->
  <!-- For iPhone 4 with high-resolution Retina display: -->
  <link rel="apple-touch-icon-precomposed" sizes="114x114" href="/assets/img/h/apple-touch-icon.png">
  <!-- For first-generation iPad: -->
  <link rel="apple-touch-icon-precomposed" sizes="72x72" href="/assets/img/m/apple-touch-icon.png">
  <!-- For non-Retina iPhone, iPod Touch, and Android 2.1+ devices: -->
  <link rel="apple-touch-icon-precomposed" href="/assets/img/l/apple-touch-icon-precomposed.png">
  <!-- For nokia devices: -->
  <link rel="shortcut icon" href="/assets/img/l/apple-touch-icon.png">

  <!-- iOS web app, delete if not needed. https://github.com/h5bp/mobile-boilerplate/issues/94 -->
  <!-- <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-bar-style" content="black"> -->
  <!-- <script>(function(){var a;if(navigator.platform==="iPad"){a=window.orientation!==90||window.orientation===-90?"img/startup-tablet-landscape.png":"img/startup-tablet-portrait.png"}else{a=window.devicePixelRatio===2?"img/startup-retina.png":"img/startup.png"}document.write('<link rel="apple-touch-startup-image" href="'+a+'"/>')})()</script> -->
  
  <!-- The script prevents links from opening in mobile safari. https://gist.github.com/1042026 -->
  <!-- <script>(function(a,b,c){if(c in b&&b[c]){var d,e=a.location,f=/^(a|html)$/i;a.addEventListener("click",function(a){d=a.target;while(!f.test(d.nodeName))d=d.parentNode;"href"in d&&(d.href.indexOf("http")||~d.href.indexOf(e.host))&&(a.preventDefault(),e.href=d.href)},!1)}})(document,window.navigator,"standalone")</script> -->
  
  <!-- Mobile IE allows us to activate ClearType technology for smoothing fonts for easy reading -->
  <meta http-equiv="cleartype" content="on">

  <!-- more tags for your 'head' to consider h5bp.com/d/head-Tips -->

  <!-- Main Stylesheet -->
  <link rel="stylesheet" href="/assets/css/screen.css">

  <!-- All JavaScript at the bottom, except for Modernizr which enables HTML5 elements & feature detects -->
  <script src="/assets/js/libs/modernizr-2.0.6.min.js"></script>
  <!-- Grab Google CDN's jQuery, with a protocol relative URL; fall back to local if necessary -->
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
  <script>window.jQuery || document.write('<script src="js/libs/jquery-1.7.1.min.js"><\/script>')</script>
  <script src="/assets/js/battle.js"></script>
</head>

<body id="battle-page">

  <div id="container">
    <header id="global-header">
      <h1>戦闘開始</h1>
    </header>
    <div id="main" role="main">
      <section id="battle-status">
        <span id="score">スコア: <span class="value"><?php echo $princess['score'] ?></span> / <span class="next"><?php echo $princess['next_score'] ?></span>
      </section>
      <section id="field">
        <h1 class="subhead">戦闘フィールド</h1>
        <p id="damage-message"><span class="value">100</span>pt ♥</p>
        <article id="princess" class="follower-card">
          <h1><?php echo $princess['name'] ?></h1>
          <img class="icon big" src="<?php echo $princess['pic'] ?>" />
        </article>
        <ul class="follower-cards">
          <?php for ( $i = 1; $i <= 3; $i++ ): ?>
          <?php if ( array_key_exists($i-1, $followers) ): ?>
          <?php $p = $followers[$i-1] ?>
          <li>
            <article id="follower<?php echo $i ?>" class="follower-card">
              <h1><?php $p['name'] ?></h1>
              <img class="icon big" src="<?php echo $p['pic'] ?>" />
              <p class="power">Power: <?php echo $p['power'] ?></p>
              <p class="money">Money: <?php echo $p['money'] ?></p>
            </article>
          </li>
          <?php else: ?>
          <li>
          </li>
          <?php endif; ?>
          <?php endfor; ?>
        </ul>
      </section>
      <section id="user-status">
      <p id="total-power">Total Power: <span class="value"><?php echo $president['power'] ?></span> <span id="expend-money">(-<span class="value"><?php echo $president['used_money'] ?></span>)</span></p>
        <p id="total-money">Total Money: <span class="value"><?php echo $president['money'] ?></span></p>
        
      </section>
      <a id="attack-button" class="button" href="#">あたっく ♥</a>
      <a id="help-button" class="button" href="help/index.php/">HELP</a>
    </div>
    <footer id="global-footer">
    </footer>
  </div> <!--! end of #container -->


  <!-- JavaScript at the bottom for fast page loading -->


  <!-- scripts concatenated and minified via ant build script-->
  <script src="/assets/js/helper.js"></script>
  <!-- end scripts-->

  <!-- Debugger - remove for production -->
  <!-- <script src="https://getfirebug.com/firebug-lite.js"></script> -->

  <!-- Asynchronous Google Analytics snippet. Change UA-XXXXX-X to be your site's ID.
       mathiasbynens.be/notes/async-analytics-snippet -->
  <script>
    var _gaq=[["_setAccount","UA-XXXXX-X"],["_trackPageview"]];
    (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];g.async=1;
    g.src=("https:"==location.protocol?"//ssl":"//www")+".google-analytics.com/ga.js";
    s.parentNode.insertBefore(g,s)}(document,"script"));
  </script>

</body>
</html>
