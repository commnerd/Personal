<!DOCTYPE html>
<html>
    <head>
        <title>Food Order Organizer - @yield('title')</title>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="stylesheet" href="{{ elixir('/css/food/app.css') }}">
    </head>
    <body>
        <div class="container">
            @yield('content')
        </div>
        <script src="{{ elixir('/js/food/app.js') }}"></script>
    </body>
</html>
