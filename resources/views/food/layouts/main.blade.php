<!DOCTYPE html>
<html>
    <head>
        <title>Food Order Organizer - @yield('title')</title>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="stylesheet" href="{{ elixir('/food/css/app.css') }}">
    </head>
    <body>
        <div class="container">
            @yield('content')
        </div>
        <script src="{{ elixir('/food/js/app.js') }}"></script>
    </body>
</html>
