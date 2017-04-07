<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('title')</title>
        <link rel="icon" href="favicon.ico" type="image/png">
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="/css/bootstrap-3.3.7/dist/css/bootstrap.min.css">
        <!--Fontawesome-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <!-- Bootstrap bootstrap-touch-slider Slider Main Style Sheet -->
        <link href="http://bootstrapthemes.co/demo/resource/BootstrapCarouselTouchSlider/assets/css/bootstrap-touch-slider.css" rel="stylesheet" media="all">
        <!--Custom CSS-->
        <link rel="stylesheet" href="/css/app.css">

    </head>
    <body>
        @include('layouts.navigation')

        <div class="content">
            @yield('content')
        </div>

        @include('layouts.footer')

        <!-- jQuery library -->
        <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
        <!--Bootstrap Js-->
        <script src="/css/bootstrap-3.3.7/dist/js/bootstrap.min.js"></script>
        <!--Boostrap Carousel Touch Slider Js-->
        <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery.touchswipe/1.6.4/jquery.touchSwipe.min.js"></script>
        <!--Custom Js-->
        <script src="/js/all.js"></script>
        <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCAAy7YHw7fKMqyT0ZdBUvPHMwo0Un42rM&callback=initMap"></script>

    </body>
</html>

