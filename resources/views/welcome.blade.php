<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/font-awesome/fontawesome.css') }}" rel="stylesheet">
    <base href="/" />

</head>
<body>
    <!-- React root DOM -->
    <div id="user" class="h-100"></div>
    <!-- React JS -->
    <script src="{{ asset('js/app.js') }}" ></script>
</body>
</html>
