<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Grobal - @yield('title') </title>

    <!-- Styles -->
    <link href="{{ asset('assets/admin/css/lib/calendar2/pignose.calendar.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/admin/css/lib/chartist/chartist.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/admin/css/lib/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/admin/css/lib/themify-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/admin/css/lib/owl.carousel.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/admin/css/lib/owl.theme.default.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/admin/css/lib/weather-icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/admin/css/lib/menubar/sidebar.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/admin/css/lib/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/admin/css/lib/helper.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/admin/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/admin/css/custom.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/admin/css/lib/sweetalert/sweetalert.css') }}" rel="stylesheet">

    @yield('style')
</head>
<body class="h-100" onclick="btnToggle('body')">

    <input type="hidden" value="{{ csrf_token() }}" id="laravelToken">
    
    <div id="app" class="h-100">

        {{-- SidebarCode --}}
        @include('layouts.includes.sidebar')
        {{-- NavbarCde --}}
        @include('layouts.includes.navbar')

        <div class="content-wrap">
            <div class="main">
                <div class="container-fluid">
                    @yield('content')
                </div>
            </div>
        </div>

    </div>




        <!-- jquery vendor -->
        <script src="{{ asset('assets/admin/js/lib/jquery.min.js') }}"></script>
        <script src="{{ asset('assets/admin/js/lib/jquery.nanoscroller.min.js') }}"></script>
        <!-- nano scroller -->
        <script src="{{ asset('assets/admin/js/lib/menubar/sidebar.js') }}"></script>
        <script src="{{ asset('assets/admin/js/lib/preloader/pace.min.js') }}"></script>
        <!-- sidebar -->

        <script src="{{ asset('assets/admin/js/lib/bootstrap.min.js') }}"></script>
        <script src="{{ asset('assets/admin/js/scripts.js') }}"></script>
        <!-- bootstrap -->

        <script src="{{ asset('assets/admin/js/lib/calendar-2/moment.latest.min.js') }}"></script>
        <script src="{{ asset('assets/admin/js/lib/calendar-2/pignose.calendar.min.js') }}"></script>
        <script src="{{ asset('assets/admin/js/lib/calendar-2/pignose.init.js') }}"></script>


        <script src="{{ asset('assets/admin/js/lib/weather/jquery.simpleWeather.min.js') }}"></script>
        <script src="{{ asset('assets/admin/js/lib/weather/weather-init.js') }}"></script>
        <script src="{{ asset('assets/admin/js/lib/circle-progress/circle-progress.min.js') }}"></script>
        <script src="{{ asset('assets/admin/js/lib/circle-progress/circle-progress-init.js') }}"></script>
        <script src="{{ asset('assets/admin/js/lib/chartist/chartist.min.js') }}"></script>
        <script src="{{ asset('assets/admin/js/lib/sparklinechart/jquery.sparkline.min.js') }}"></script>
        <script src="{{ asset('assets/admin/js/lib/sparklinechart/sparkline.init.js') }}"></script>
        <script src="{{ asset('assets/admin/js/lib/owl-carousel/owl.carousel.min.js') }}"></script>
        <script src="{{ asset('assets/admin/js/lib/owl-carousel/owl.carousel-init.js') }}"></script>
        <script src="{{ asset('assets/admin/js/lib/sweetalert/sweetalert.min.js') }}"></script>
        <!-- scripit init-->
        <script src="{{ asset('assets/admin/js/dashboard2.js') }}"></script>

        {{-- custom Js --}}
        <script src="{{ asset('assets/admin/js/custom.js') }}"></script>


        <script>

            function btnToggle(where) {
                document.getElementById("Dropdown").classList.remove("show");
                if(where == 'body' && document.getElementById("Dropdown").classList.contains('show')){
                    document.getElementById("Dropdown").classList.remove("show");
                }
                if(where == 'any'){
                    document.getElementById("Dropdown").classList.toggle("show");
                }
            }

            // Prevents menu from closing when clicked inside
            document.getElementById("Dropdown").addEventListener('click', function (event) {
                event.stopPropagation();
            });

        </script>


        @yield('script')

</body>
</html>
