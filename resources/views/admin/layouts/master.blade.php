<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('title')</title>
        <link rel="icon" href="favicon.ico" type="image/png">
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="css/bootstrap-3.3.7/dist/css/bootstrap.min.css">
        <!--Fontawesome-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <!-- SimpleSidebar for CMS -->
        <link rel="stylesheet" href="https://blackrockdigital.github.io/startbootstrap-simple-sidebar/css/simple-sidebar.css">
        <link rel="stylesheet" href="css/app.css">

    </head>
    <body>
        <div id="cms" class="container-fluid">
            <div id="wrapper">
                @include('admin.layouts.navigation')
                <div href="#menu-toggle" id="menu-toggle" class="btn btn-default btn-primary">Menu</div>
                <div id="back-home" class="btn btn-default btn-danger"><a href="/">Back</a></div>
                <div class="container-fluid">
                    @yield('content')
                </div>
            </div>
        </div>

        <!-- jQuery library -->
        <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
        <!--Bootstrap Js-->
        <script src="css/bootstrap-3.3.7/dist/js/bootstrap.min.js"></script>
        <script src="js/all.js"></script>
         <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCAAy7YHw7fKMqyT0ZdBUvPHMwo0Un42rM&callback=initMap"> </script>
        <script>
            $("#menu-toggle").click(function(e) {
                e.preventDefault();
                $("#wrapper").toggleClass("toggled");
            });
        </script>
    </body>
</html>


