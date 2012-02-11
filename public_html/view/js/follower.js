(function ($) {
  $(document).on('click', '.followers a', function (event) {
    var name = $(this).find('.name').text();
    var imgPath = $(this).find('.icon').attr('src');
    var id = $(this).find('.id').text();
    var input = $('#followers-select-form').find('input[value=""]:first');

    if (input.length) {
      input.attr('value', id);
      $('.follower-cards li.blank:first').append('' +
            '<article class="follower-card">' +
              '<img class="icon big" src="' + imgPath + '" />' +
              '<h1>' + name + '</h1>' +
            '</article>');
      $(this).parents('li').remove();
    } else {
      alert('セットできるフォロワーは3人までです');
    }

    event.preventDefault();
  });
})(jQuery);

