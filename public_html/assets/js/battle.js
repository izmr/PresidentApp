(function ($) {
  var json = {"used_money":68,"damage":[91,27,32],"score":0, 'expend_money': 5, 'next_money': 2000000};

  var animationAttack = function (index, damage) {
    var card = $('#follower' + (index + 1));
    var top = card.css('top');
    var left = card.css('left');

    card.animate({
      'top': '30px',
      'left': '103px'
    }, 200, 'swing', function () {
      var message = $('#damage-message');
      message.find('.value').text(damage[index]);
      message.fadeIn(170, function () {
        message.fadeOut(170);
      });
    });
    card.animate({
      'top': top,
      'left': left
    }, 200, 'swing', function () {
      if (index < 3) {
        animationAttack(index + 1, damage);
      }
    });
  };

  $(document).on('click', '#attack-button', function (event) {
    
    $.getJSON('/heaven/attack.php', function (json) {
      animationAttack(0, json.damage);
      $('#score .value').text(json.score);
      $('#score .next').text(json.next_score);
      $('#expend-money .value').text(json.expend_money);
      var money = $('#total-money .value');
      money.text(money.text() - json.used_money);
    });
    event.preventDefault();
  });

  var animateTotalAttack1 = function (damage) {
    $("#follower1").animate({top: "-20px" , left: "100px"});
    $("#follower1").animate({top: "165px" , left: "10px"});

    $("#follower2").animate({top: "-20px" , left: "100px"});
    $("#follower2").animate({top: "165px" , left: "10px"});
    $("#follower2").animate({left: "103px"});

    $("#follower3").animate({top: "-20px" , left: "100px"});
    $("#follower3").animate({top: "165px" , left: "10px"});
    $("#follower3").animate({left: "198px"});
  };

  var animateTotalAttack2 = function (damage) {
    $("#follower1").animate({top: "-20px" , left: "100px"});
    $("#follower1").animate({top: "165px" , left: "10px"});

    $("#follower2").animate({top: "-20px" , left: "100px"});
    $("#follower2").animate({top: "165px" , left: "103px"});

    $("#follower3").animate({top: "-20px" , left: "100px"});
    $("#follower3").animate({top: "165px" , left: "198px"});

  };

  var animateTotalAttack3 = function (damage) {
    $("#follower1").animate({top: "-100px"});
    $("#follower1").animate({top: "165px" , left: "198px"});
    $("#follower1").animate({left: "10px"});

    $("#follower2").animate({top: "60px"});
    $("#follower2").animate({top: "165px"});

    $("#follower3").animate({top: "-100px"});
    $("#follower3").animate({top: "165px" , left: "10px"});
    $("#follower3").animate({left: "198px"});
  };
})(jQuery);

