@if(Auth::check())
@else
<div id="subscribe" class="jumbotron">
    <div class="container">
            <h2>Subscribe to Our Newsletter!</h2>
            <h4>We would love to get in touch with you. Please register and subscribe for our newsletter for special deals!</h4>
            <a class="col-md-4 btn btn-default btn-primary" href="/register">Register</a>
    </div>
</div>
@endif

