//Carousel
$(document).ready(function() {
    $('.carousel').carousel({
      interval: 3000
    })
  });

$(".carousel").swipe({
  swipe: function(event, direction, distance, duration, fingerCount, fingerData) {
    if (direction == 'left') $(this).carousel('next');
    if (direction == 'right') $(this).carousel('prev');
  },
  allowPageScroll:"vertical"
});
