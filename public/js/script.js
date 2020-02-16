$(document).ready(function() {
  $('.menu-button').click(function(){
    $('.nav-menu').addClass('menu-left');
    $('.background-nav').addClass('active');
    $('.mfp-close').addClass('active');
  })
  $('.mfp-close').click(function(){
    $('.nav-menu').removeClass('menu-left');
    $('.background-nav').removeClass('active');
    $('.mfp-close').removeClass('active');
  })
    $('a[href*=#]').bind('click', function(e) {
        e.preventDefault();
        var target = $(this).attr("href");
        $('html, body').stop().animate({
                scrollTop: $(target).offset().top
        }, 600, function() {
                location.hash = target;
        });

        return false;
    });
});

$(window).scroll(function() {
    var scrollDistance = $(window).scrollTop();
    $('.page-section').each(function(i) {
        if ($(this).position().top <= scrollDistance) {
            $('.navigation a.active').removeClass('active');
            $('.navigation a').eq(i).addClass('active');
        }
    });
}).scroll();

//back to top
$(document).ready(function() {
var btn = $('#button');

$(window).scroll(function() {
  if ($(window).scrollTop() > 300) {
    btn.addClass('show');
  } else {
    btn.removeClass('show');
  }
});

btn.on('click', function(e) {
  e.preventDefault();
  $('html, body').animate({scrollTop:0}, '300');
});
 function sendRequest() {
     $("#client_mane").value();

 }

})



//

