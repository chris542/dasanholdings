<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('title')</title>
        <link rel="icon" href="favicon.ico" type="image/png">
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
        <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <!--Fontawesome-->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <!--animate-->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css" rel="stylesheet" media="all">
        <!-- Bootstrap bootstrap-touch-slider Slider Main Style Sheet -->
        <link href="http://bootstrapthemes.co/demo/resource/BootstrapCarouselTouchSlider/assets/css/bootstrap-touch-slider.css" rel="stylesheet" media="all">
        <!--Custom CSS-->
        <link rel="stylesheet" href="css/app.css">

    </head>
    <body>
        @include('layouts.navigation')

        <div class="content">
            @yield('content')
        </div>

        @include('layouts.footer')

        <!--Bootstrap Js-->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <!--Boostrap Carousel Touch Slider Js-->
        <script src="http:////cdnjs.cloudflare.com/ajax/libs/jquery.touchswipe/1.6.4/jquery.touchSwipe.min.js"></script>
        <!--Custom Js-->
        <script src="js/all.js"></script>
        <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCAAy7YHw7fKMqyT0ZdBUvPHMwo0Un42rM&callback=initMap"></script>

    </body>
</html>

