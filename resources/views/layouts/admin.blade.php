<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <title>{{ config('app.name', 'Grobal - Admin') }}</title>

    <!-- Scripts -->
    {{-- <script src="{{ asset('js/app.js') }}" defer></script> --}}


    <!-- Styles -->
    <link href="{{ asset('assets/admin/css/lib/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/admin/css/lib/themify-icons.css') }}" rel="stylesheet">
    {{-- <link href="{{ asset('assets/admin/css/lib/bootstrap.min.css') }}" rel="stylesheet"> --}}
    <link href="{{ asset('assets/admin/css/lib/helper.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/admin/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/admin/css/custom.css') }}" rel="stylesheet">
</head>

<body style="height: 100vh">
    <div class="h-100">
        <main class="h-100">
            @yield('content')
        </main>
    </div>
</body>

</html>
<script>
    var token = "{{ csrf_token() }}";
</script>
