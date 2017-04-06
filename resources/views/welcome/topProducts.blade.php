<div id="topProducts" class="container">
<h2>Top Products</h2>
      <div class="carousel carousel-showmanymoveone slide" id="carousel-tilenav" data-interval="false">
         <div class="carousel-inner">
                @foreach($topProducts as $product)
                @if($product->tpOrder == 1)
                <div class="item active">
                @else
                <div class="item">
                @endif
                   <div class="single-item col-xs-12 col-sm-6 col-md-2">
                        <div class="addtocart">
                            <a href="/addtocart">
                                <i class="fa fa-cart-plus" aria-hidden="true"></i>
                            </a>
                        </div>
                      <a href="#">
                        <img src="img/products/demoItem.png" class="img-responsive center-block">
                        <div class="details">
                            <h4>{{$product->name}}</h4>
                            <p>${{$product->price}}</p>
                        </div>
                      </a>
                   </div>
                </div>
                @endforeach
         </div>
         <a class="left carousel-control" href="#carousel-tilenav" data-slide="prev"><i class="glyphicon glyphicon-chevron-left"></i></a>
         <a class="right carousel-control" href="#carousel-tilenav" data-slide="next"><i class="glyphicon glyphicon-chevron-right"></i></a>
      </div>
</div>
