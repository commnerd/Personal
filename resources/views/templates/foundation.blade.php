<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="/storage/michael-j-miller-logo.ico">
        <title>{{ config('app.name') }}@hasSection('title') - @yield('title')@endif
@endsection</title>
        @vite('resources/css/app.css')
    </head>
    <body class="antialiased">
        @yield('content')
        @vite('resources/js/app.js')
    </body>
</html>