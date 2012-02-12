(function ($) {
  var json = {"used_money":68,"damage":[91,27,32],"score":0, 'expend_money': 5, 'next_money': 2000000};
  var isAnimating = false;

  var calcTotalDamage = function (damage) {
    var sum = 0;
    for (var i = 0; i < damage.length ; i++) sum += damage[i];
    return sum;
  };

  var showDamageMessage = function (damage, duration) {
     var message = $('#damage-message');
    message.find('.value').text(damage);
    message.fadeIn(duration, function () {
      message.fadeOut(duration);
    });
  };

  var showEffect = function () {
    switch (Math.floor(Math.random() * 5)) {
      case 1:
        heart();
        break;
      case 2:
        angry();
        break;
      case 3:
        coin();
        break;
      default:
        happy();
        break;
    }
  };

  var animationAttack = function (index, damage) {
    var card = $('#follower' + (index + 1));
    var top = card.css('top');
    var left = card.css('left');

    card.animate({
      'top': '30px',
      'left': '103px'
    }, 200, 'swing', function () {
      showDamageMessage(damage[index], 170);
    });
    card.animate({
      'top': top,
      'left': left
    }, 200, 'swing', function () {
      if (index < 2) {
        animationAttack(index + 1, damage);
      } else {
        isAnimating = false;
      }
    });
  };

  $(document).on('click', '#attack-button', function (event) {
    if (!isAnimating) {
      $.getJSON('/heaven/attack.php', function (json) {
        isAnimating = true;

        if (Math.floor(Math.random() * 3) == 1) {
          animationAttack(0, json.damage);
        } else {
          var i = Math.floor(Math.random() * 4);

          if (i == 1) {
            animateTotalAttack1(json.damage);
          } else if (i == 2) {
            animateTotalAttack2(json.damage);
          } else {
            animateTotalAttack3(json.damage);
          }
        }

        $('#score .value').text(json.score);
        $('#score .next').text(json.next_score);
        $('#expend-money .value').text(json.expend_money);
        var money = $('#total-money .value');
        money.text(money.text() - json.used_money);
      });
    }

    event.preventDefault();
  });

  // 合体攻撃
  var animateTotalAttack1 = function (damage) {
    $("#follower1").animate({top: "-20px" , left: "100px"});
    $("#follower1").animate({top: "165px" , left: "10px"}, function () {
      showDamageMessage(calcTotalDamage(damage), 400);
      showEffect();
    });

    $("#follower2").animate({top: "-20px" , left: "100px"});
    $("#follower2").animate({top: "165px" , left: "10px"});
    $("#follower2").animate({left: "103px"});

    $("#follower3").animate({top: "-20px" , left: "100px"});
    $("#follower3").animate({top: "165px" , left: "10px"});
    $("#follower3").animate({left: "198px"});
  };

  var animateTotalAttack2 = function (damage) {
    $("#follower1").animate({top: "-20px" , left: "100px"});
    $("#follower1").animate({top: "165px" , left: "10px"}, function () {
      showDamageMessage(calcTotalDamage(damage), 400);
      showEffect();
    });

    $("#follower2").animate({top: "-20px" , left: "100px"});
    $("#follower2").animate({top: "165px" , left: "103px"});

    $("#follower3").animate({top: "-20px" , left: "100px"});
    $("#follower3").animate({top: "165px" , left: "198px"});

  };

  var animateTotalAttack3 = function (damage) {
    $("#follower1").animate({top: "-100px"});
    $("#follower1").animate({top: "165px" , left: "198px"});
    $("#follower1").animate({left: "10px"}, function () {
      showDamageMessage(calcTotalDamage(damage), 400);
      showEffect();
    });

    $("#follower2").animate({top: "60px"});
    $("#follower2").animate({top: "165px"});

    $("#follower3").animate({top: "-100px"});
    $("#follower3").animate({top: "165px" , left: "10px"});
    $("#follower3").animate({left: "198px"});
  };

  // ❤がくるくる回る
  function heart(){
    $("#princess").append("<div id='heartAttack'><ul class='none'><li id='check'>❤</li><li>❤</li><li>❤</li></ul></div>");
    //$(".happy").css("-webkit-animation-play-state", "running");
    $("#check").bind("webkitAnimationEnd",function(){
      $("#heartAttack").remove();
      isAnimating = false;
    });
  }

  // coinが上から降ってくる
  function coin(){
    $("#princess").append("<div id='coinAttack'><ul class='none'><li id='check'><img src='/assets/img/coin.jpeg'></li></ul></div>");
    $("#check").bind("webkitAnimationEnd",function(){
      $("#coinAttack").remove();
      isAnimating = false;
    });
    // $("#princess").addClass("coin");
    // $(".coin").css("-webkit-animation-play-state", "running");
    setInterval(addCoin, 500);
  }

  var coinIndex=0;
  function addCoin(){
    $(".none").append("<li><img style='left: " + (Math.random()*100 -30)  + "px' src='/assets/img/coin.jpeg'></li>");
    if(coinIndex<5){
      coinIndex+=1;
      setInterval(addCoin, Math.random() * 1000 + 100);
    }
  }

  // 怒る
  function angry() {
    $("#princess").addClass("angry");
    $("#princess").append("<div class='condition'>!!</div>");
    $("#princess").bind("webkitAnimationEnd", function(){
      $('.condition').remove();
      $(this).removeClass('angry');
      isAnimating = false;
    });
  }

  function happy() {
    $("#princess").addClass("happy");
    $("#princess").append("<div class='condition'>❤</div>");
    $("#princess").bind("webkitAnimationEnd", function(){
      $('.condition').remove();
      $(this).removeClass('happy');
      isAnimating = false;
    });
  }
})(jQuery);

