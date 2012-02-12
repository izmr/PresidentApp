(function ($) {
  $(document).on('click', '.followers a', function (event) {
    var name = $(this).find('.name').text();
    var imgPath = $(this).find('.icon').attr('src');
    var power = $(this).find('.power').text();
    var money = $(this).find('.money').text();
    var jobName = $(this).find('.jobname').text();;
    var id = $(this).find('.facebook-id').text()
    var input = $('#followers-select-form').find('input[value=""]:first');

    if (input.length) {
	
      input.attr('value', id);
      var target = $('.follower-cards li._blank:first');
      target.children().remove();
      target.append('' +

            '<article class="follower-card" style="height:135px;"">' +
              '<h1>' + name + '</h1>' +
              '<img class="icon big" src="' + imgPath + '" />' +
              '<p class="power">' + power + '</p>' +
              '<p class="money">' + money + '</p>' +
              '<p class="jobName">' + jobName + '</p>' +
            '</article>').removeClass('_blank');
      $(this).parents('li').remove();
    } else {
      alert('セットできるフォロワーは3人までです');
    }

    event.preventDefault();
  });
})(jQuery);

