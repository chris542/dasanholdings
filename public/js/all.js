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

    //Cart AJAX
    $('.simpleAddToCart').on('submit', function(e){
            e.stopImmediatePropagation();
            var formData = $(this).serialize();
            $.ajax({
                method: 'POST',
                url: "/addtocart",
                data: formData, // our data object
                dataType: 'json',
                success: function(data){
                    //Cart Navigation Update
                    $(".cartnumber").text(data.count).removeClass('hidden');
                    //Empty Cart Alert disappear
                    $(".emptyCart").parent().addClass('hidden');
                    //Table show
                    $('table').removeClass('hidden');
                    //Update Price
                    $('.summary').removeClass('hidden');
                    $('.subtotal').text("Subtotal : $" + data.subtotal);
                    $('.tax').text("Tax : $" + data.tax);
                    $('.total').text("Total : $" + data.total);
                    //POPUP cartUpdated
                    $('#cartUpdated').animate({
                        bottom:'1px'
                        }, 500, function(){
                            $(this).delay(3000).animate({
                                bottom: '-130px'
                            }, 500)
                        }
                    );
                    //if table has an input field of rowId :
                    if($('.table').find('input[name=rowID][value=' + data.cartDetail.rowId + ']').length){
                        //console.log('Table has an input field so I update the value')
                        //Update the existing field of rowId from cartDetail.qty
                        $('.table').find('input[name=rowID][value=' + data.cartDetail.rowId + ']').parent().find('input[name=qt]').val(data.cartDetail.qty);
                    //if table doesn't have an rowID :
                    } else {
                        //console.log('Table is not there. So i make a new line');
                        //console.log(data.cartDetail.rowId);
                        //Append a table row
                        $('.table tbody').append('<tr> <form class="form-horizontal updateCart"> <input type="hidden" name="_token" value="' + $('meta[name="csrf-token"]').attr('content') + '"> <td class="col-xs-1">'+data.product.name+'</td> <td class="col-xs-1"> <img style="max-width: 30px" class="img-responsive" src="http://dasan.dev/storage/products/'+ data.product.img +'" alt=""></td> <td class="col-xs-1"> <div class="form-group"> <input type="hidden" name="rowID" value="' + data.cartDetail.rowId +'" required> <input class="form-control" type="number" name="qt" min="' + data.product.minimum + '" value="' + data.cartDetail.qty + '" required> </div> </td> <td class="col-xs-1 price">$' + data.cartDetail.price + '</td> <td class="col-xs-1 update"> <button type="submit" class="btn btn-default">Update</button> </td> <td class="col-xs-1 remove"> <a class="btn btn-default btn-danger" href="/removeCart/' + data.cartDetail.rowId +'"><i class="fa fa-times"></i></a> </td> </form> </tr>')
                    }
                },
                error: function(data){
                    console.log(data);
                    console.log("ahh,a problem. Deal with it")
                }
            });
            
            return false;
        });

    $('.updateCart').on('submit',function(e){
        e.stopImmediatePropagation();
        var formData = $(this).serialize();
        $.ajax({
            method:'POST',
            url: "/updateQuantity",
            data:formData,
            dataType:'json',
            success: function (data) {
                console.log(data);
                //Cart Navigation Update
                $(".cartnumber").text(data.count);
                //Update Price
                $('.summary').removeClass('hidden');
                $('.subtotal').text("Subtotal : $" + data.subtotal);
                $('.tax').text("Tax : $" + data.tax);
                $('.total').text("Total : $" + data.total);
                //POPUP cartUpdated
                $('#cartUpdated').animate({
                    bottom:'1px'
                    }, 500, function(){
                        $(this).delay(3000).animate({
                            bottom: '-130px'
                        }, 500)
                    }
                );
            },
            error: function(data) {
                console.log(data);
            }
        });
        return false;
    });

});

//MAP
function initMap() {

    var styledMapType = new google.maps.StyledMapType(
    [ { "elementType": "geometry", "stylers": [ { "color": "#ebe3cd" } ] }, { "elementType": "labels.text.fill", "stylers": [ { "color": "#523735" } ] }, { "elementType": "labels.text.stroke", "stylers": [ { "color": "#f5f1e6" } ] }, { "featureType": "administrative", "elementType": "geometry.stroke", "stylers": [ { "color": "#c9b2a6" } ] }, { "featureType": "administrative.land_parcel", "elementType": "geometry.stroke", "stylers": [ { "color": "#dcd2be" } ] }, { "featureType": "administrative.land_parcel", "elementType": "labels.text.fill", "stylers": [ { "color": "#ae9e90" } ] }, { "featureType": "landscape.natural", "elementType": "geometry", "stylers": [ { "color": "#dfd2ae" } ] }, { "featureType": "poi", "elementType": "geometry", "stylers": [ { "color": "#dfd2ae" } ] }, { "featureType": "poi", "elementType": "labels.text.fill", "stylers": [ { "color": "#93817c" } ] }, { "featureType": "poi.park", "elementType": "geometry.fill", "stylers": [ { "color": "#66ce34" } ] }, { "featureType": "poi.park", "elementType": "labels.text.fill", "stylers": [ { "color": "#447530" } ] }, { "featureType": "road", "elementType": "geometry", "stylers": [ { "color": "#f5f1e6" } ] }, { "featureType": "road.arterial", "elementType": "geometry", "stylers": [ { "color": "#fdfcf8" } ] }, { "featureType": "road.highway", "elementType": "geometry", "stylers": [ { "color": "#f8c967" } ] }, { "featureType": "road.highway", "elementType": "geometry.stroke", "stylers": [ { "color": "#e9c419" } ] }, { "featureType": "road.highway.controlled_access", "elementType": "geometry", "stylers": [ { "color": "#e98d58" } ] }, { "featureType": "road.highway.controlled_access", "elementType": "geometry.stroke", "stylers": [ { "color": "#db8555" } ] }, { "featureType": "road.local", "elementType": "labels.text.fill", "stylers": [ { "color": "#806b63" } ] }, { "featureType": "transit.line", "elementType": "geometry", "stylers": [ { "color": "#dfd2ae" } ] }, { "featureType": "transit.line", "elementType": "labels.text.fill", "stylers": [ { "color": "#8f7d77" } ] }, { "featureType": "transit.line", "elementType": "labels.text.stroke", "stylers": [ { "color": "#ebe3cd" } ] }, { "featureType": "transit.station", "elementType": "geometry", "stylers": [ { "color": "#dfd2ae" } ] }, { "featureType": "water", "elementType": "geometry.fill", "stylers": [ { "color": "#38c6f2" } ] }, { "featureType": "water", "elementType": "labels.text.fill", "stylers": [ { "color": "#92998d" } ] } ], {name: 'Styled Map'}); 
    
    var location = {lat:-37.1051567, lng: 174.9594406};
        
    var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 13,
        center: location,
        mapTypeControlOptions: {
        mapTypeIds: ['roadmap', 'satellite', 'hybrid', 'terrain', 'styled_map']
      }
    });
     var marker = new google.maps.Marker({
          position: location,
          map: map
        });
    map.mapTypes.set('styled_map', styledMapType);
    map.setMapTypeId('styled_map');
}

