<div id="bootstrap-touch-slider" class="carousel bs-slider fade  control-round indicators-line" data-ride="carousel" data-pause="hover" data-interval="false" >
  <!-- Indicators -->
  <ol class="carousel-indicators">
        @foreach($banners as $banner)
            @if($banner->id == 1)
        <li data-target="#bootstrap-touch-slider" data-slide-to="0" class="active"></li>
            @else
        <li data-target="#bootstrap-touch-slider" data-slide-to="{{ ( $banner->id - 1 ) }}"></li>
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
                <img src="img/banner/{{ $banner->bgImg }}" alt="{{ $banner->bgImg }}" class="slide-image">
                <div class="container">
                    <div class="row">
                        <div class="slide-text slide_style_left">
                            <h1 data-animation="animated zoomInRight">{{ $banner->title }}</h1>
                            <p data-animation="animated fadeInLeft">{{ $banner->description }}</p>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <a class="left carousel-control" href="#bootstrap-touch-slider" role="button" data-slide="next">
        <span class="fa fa-angle-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>

    <!-- Right Control -->
    <a class="right carousel-control" href="#bootstrap-touch-slider" role="button" data-slide="prev">
        <span class="fa fa-angle-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>
