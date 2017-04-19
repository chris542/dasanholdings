$(document).ready(function() {
    //Carousel
    $('.carousel').carousel({
      interval: 3000
    });
    $(".carousel").swipe({
      swipe: function(event, direction, distance, duration, fingerCount, fingerData) {
        if (direction == 'left') $(this).carousel('next');
        if (direction == 'right') $(this).carousel('prev');
      },
      allowPageScroll:"vertical"
    });

//Top Products Carousel
  $('.carousel-showmanymoveone .item').each(function(){
        var itemToClone = $(this);
        for (var i=1;i<4;i++) {
          itemToClone = itemToClone.next();
          // wrap around if at end of item collection
          if (!itemToClone.length) {
            itemToClone = $(this).siblings(':first');
          }
          // grab item, clone, add marker class, add to collection
          itemToClone.children(':first-child').clone()
            .addClass("cloneditem-"+(i))
            .appendTo($(this));
        }
   });
});
