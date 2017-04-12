<!-- <CART-NAV></CART-NAV> -->
<nav class="navbar navbar-default cart-nav">
        <div class="container">
                <ul class="nav navbar-header">
                    <button type="button" data-target="#navbarCollapse" data-toggle="collapse" class="navbar-toggle">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </ul>
                <div id="navbarCollapse" class="collapse navbar-collapse">
                    <ul class="nav navbar-nav">
                        <li><a href=""><i class="fa fa-shopping-cart" aria-hidden="true"></i> My Cart</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        @if(Auth::check())
                            @if(Auth::user()->isAdmin == 1)
                            <li><a href="/cms"><i class="fa fa-unlock-alt"></i> Manage</a></li>
                        @endif
                        <li><a href=""><span class="glyphicon glyphicon-user"></span> {{ Auth::user()->first_name }}</a></li>
                        <li><a href="/logout"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
                        @else
                        <li><a href="/register"><span class="glyphicon glyphicon-user"></span> Register</a></li>
                        <li><a href="/login"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                        @endif
                    </ul>
                </div>
        </div>
</nav>
<!-- <SEARCH-NAV></SEARCH-NAV> -->
<nav class="navbar navbar-default search-nav">
    <div class="container">

            <div class="col-md-2 navbar-logo">
                <a href="/">
                    <img class="img-responsive center-block" src="/img/logo/Logo.png" alt="DasanHoldingsLtdLogo">
                </a>
            </div>

            <div class="col-md-10 form-group navbar-search">
                <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search Product..">
                        <span class="input-group-btn">
                           <button class="btn btn-default nav-search-btn" type="button">
                              <i class="glyphicon glyphicon-search"></i>
                            </button>
                       </span>
                </div>          
            </div>

    </div>
</nav>
<!-- <CATEGORY-NAV></CATEGORY-NAV> -->
<nav class="navbar navbar-default category-nav" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span>Category List</span>
            </button>
        </div>
        
        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav">
                @foreach($navCat as $category)
              <li><a href="/category/{{ $category->id }}">{{ $category->name }}</a></li>
                @endforeach
            </ul>
        </div>
    </div>
</nav>
