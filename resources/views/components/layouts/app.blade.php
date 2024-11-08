<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $title ?? 'Page Title' }}</title>

    <link
        href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i&display=swap"
        rel="stylesheet">
    <!-- Bootstrap core CSS -->
    <link href="{{ asset('stand-blog/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">


    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="{{ asset('stand-blog/assets/css/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ asset('stand-blog/assets/css/templatemo-stand-blog.css') }}">
    <link rel="stylesheet" href="{{ asset('stand-blog/assets/css/owl.css') }}">
</head>

<body>
    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>
    <!-- ***** Preloader End ***** -->

    {{ $slot }}


    <!-- Bootstrap core JavaScript -->
    <script src="{{ asset('stand-blog/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('stand-blog/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Additional Scripts -->
    <script src="{{ asset('stand-blog/assets/js/custom.js') }}"></script>
    <script src="{{ asset('stand-blog/assets/js/owl.js') }}"></script>
    <script src="{{ asset('stand-blog/assets/js/slick.js') }}"></script>
    <script src="{{ asset('stand-blog/assets/js/isotope.js') }}"></script>
    <script src="{{ asset('stand-blog/assets/js/accordions.js') }}"></script>
</body>

</html>
