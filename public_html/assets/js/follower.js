(function ($) {
  $(document).on('click', '.followers a', function (event) {
    var name = $(this).find('.name').text();
    var imgPath = $(this).find('.icon').attr('src');
    var power = $(this).find('.power .value').text();
    var money = $(this).find('.money .value').text();
    var id = $(this).find('.facebook-id').text();
    var input = $('#followers-select-form').find('input[value=""]:first');

    if (input.length) {
      input.attr('value', id);
      $('.follower-cards li.blank:first').append('' +

            '<article class="follower-card">' +
              '<h1>' + name + '</h1>' +
              '<img class="icon big" src="' + imgPath + '" />' +
              '<p class="power">Power: ' + power + '</p>' +
              '<p class="money">Money: ' + money + '</p>' +
            '</article>').removeClass('blank');
      $(this).parents('li').remove();
    } else {
      alert('セットできるフォロワーは3人までです');
    }

    event.preventDefault();
  });
})(jQuery);

