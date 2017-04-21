<div id="cartUpdated">
    <h4>Thank You!</h4>
    <p>Your cart has been updated!</p>
    <a href="/mycart">
        <i class="fa fa-shopping-cart" aria-hidden="true"></i>
        My Cart <span class="cartnumber @if(Cart::count() == 0)hidden @endif">{{ Cart::count() }}</span>
    </a>
</div>
