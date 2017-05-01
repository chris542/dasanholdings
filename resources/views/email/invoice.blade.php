<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Invoice from {{$user->first_name}} {{$user->last_name}}</title>
    <link rel="icon" href="{{ asset('favicon.png') }}" type="image/png">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="{{ asset('css') }}/bootstrap-3.3.7/dist/css/bootstrap.min.css">
    <!--Fontawesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{asset('css')}}/app.css"> </head>
<body>
<div id="invoice" class="container">
    <h1 class="title">Thanks for shopping with us!</h1>

    <h2>Invoice - {{$user->first_name}} {{$user->last_name}}</h2>
    <hr>
    <h4>Full Name : {{$user->first_name}} {{$user->last_name}}</h4>
    <h4>Date : {{$dateOfPurchase}}<h4>
    <h4>Email : {{$user->email}}</h4>
    <h4>Address : {{$user->address}}</h4>
    <h4>Phone : {{$user->phone}}</h4>
    <h4>Mobile : {{$user->mobile}}</h4>
    <hr>
    <table class="table table-responsive table-condensed table-hover {{ !Cart::count() ?  'hidden' : '' }}">
        <thead>
            <tr>
                <td>Product</td>
                <td>Image</td>
                <td>Quantity</td>
                <td class="price">price</td>
            </tr>
        </thead>
        <tbody>
            @foreach($cartProducts as $product)
            <tr>
                    <td class="col-xs-1">{{ $product->name }}</td>
                    <td class="col-xs-1"><img style="max-width: 30px" class="img-responsive" src="{{ asset('/storage/products') }}/{{ $product->options->img }}" alt=""></td>
                    <td class="col-xs-1">{{ $product->qty }}</td>
                    <td class="col-xs-1 price">${{ $product->price }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <!--End Table-->

    <!--Total-->
    <div class="row summary {{ !Cart::count() ?  'hidden' : '' }}">
        <div class="col-sm-12">
           <div class="subtotal">
               Subtotal : ${{  Cart::subtotal() }} 
           </div>
           <div class="tax">
               Tax : ${{ ( Cart::tax()) }} 
           </div>
           <div class="total">
               Total : ${{ ( Cart::total()) }} 
           </div>
        </div>
    </div>
    <!--End of Total-->

    <div class="direction">
        <p>Payment must be completed within 3 days from the day you have purchased. Please feel free to contact us if you would like to change or cancel the transaction.</p>
        <p>ANZ xx-xxxxxx-xxxxxx-xx</p>
        <p>Dasan Holdings Ltd.</p>
    </div>
    
</div>
    
</body>
</html>
