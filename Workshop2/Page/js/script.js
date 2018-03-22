//_________________ BUTTONS EVENTS _________________

$('#not_member').click(function () {
    $('.Inscription').slideDown("slow");
});

$('#speach_icon').click(function () {
    $('.chat-window').fadeToggle("fast");
  });


  $('#btn-courses').click(function () {
    $('section.courses-list').slideToggle("fast");
  });