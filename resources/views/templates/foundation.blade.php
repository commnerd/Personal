<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="/storage/michael-j-miller-logo.ico">
        <title>{{ config('app.name') }}
            @hasSection('title')
            @section('title') - @yield('title')
            @endsection
            @endif
        </title>
        @vite('resources/sass/app.scss')
    </head>
    <body class="antialiased">
        @yield('content')
        @vite('resources/js/app.js')
    </body>
</html>