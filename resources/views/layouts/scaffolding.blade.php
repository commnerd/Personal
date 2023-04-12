<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" type="image/x-icon" href="/storage/michael-j-miller-logo.ico" />
        @vite('resources/scss/app.scss')

        @yield('head')

        <title>Michael J. Miller: @yield('subtitle')</title>
    </head>
    <body>
        @yield('content')
        @vite('resources/js/app.js')
    </body>
</html>
