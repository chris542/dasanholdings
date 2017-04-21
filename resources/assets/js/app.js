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
