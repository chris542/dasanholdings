<div id="bannerCarousel" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
        @foreach($banners as $banner)
            @if($banner->id == 1)
        <li data-target="#bannerCarousel" data-slide-to="0" class="active"></li>
            @else
        <li data-target="#bannerCarousel" data-slide-to="{{ ( $banner->id - 1 ) }}"></li>
            @endif
        @endforeach
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
    @foreach($banners as $banner)
        @if($banner->id == 1)
            <div class="item active">
        @else
            <div class="item">
        @endif
                <div class="container">
                    <img src="img/banner/{{ $banner->bgImg }}" alt="Chania">
                    <h1>{{ $banner->title }}</h1>
                    <p>{{ $banner->description }}</p>
                </div>
            </div>
    @endforeach
  </div>

  <!-- Left and right controls -->
  <a class="left carousel-control" href="#bannerCarousel" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#bannerCarousel" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
