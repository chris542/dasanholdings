<div id="topProducts" class="container">
<h2>Top Products</h2>
<div class="row col-md-12">
    <div class="carousel carousel-showmanymoveone slide" id="carousel-tilenav" data-interval="false">
     <div class="carousel-inner">
            @foreach($topProducts as $key => $product)
            @if($key == 0)
            <div class="item active">
            @else
            <div class="item">
            @endif
               <div class="single-item col-xs-12 col-sm-6 col-md-3">
                    @if(Auth::check())
                    <div class="addtocart">
                        <form action="/addtocart">
                            <input type="hidden" name="id" value="{{ $product->id }}">
                            <input type="hidden" name="qt" value="{{ $product->minimum}}">
                            <button type="submit"><i class="fa fa-cart-plus" aria-hidden="true"></i>
                                  </button>
                        </form>
                    </div>
                    @endif
                  <a href="product/{{ $product->id }}">
                    <img src="{{ asset('storage/products') }}/{{ $product->img }}" class="img-responsive center-block">
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
</div>
