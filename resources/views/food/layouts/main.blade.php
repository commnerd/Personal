<!DOCTYPE html>
<html>
    <head>
        <title>Food Order Organizer - @yield('title')</title>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <link rel="icon" href="/storage/michael-j-miller-logo.ico">
        <link rel="stylesheet" href="{{ elixir('/css/food/app.css') }}">
    </head>
    <body>
        <div class="container-fluid">
            @yield('content')
        </div>
        <script async src="{{ elixir('/js/food/app.js') }}"></script>
    </body>
</html>
