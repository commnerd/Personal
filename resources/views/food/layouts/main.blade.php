<!DOCTYPE html>
<html>
    <head>
        <title>Food Order Organizer - @yield('title')</title>
        <link rel="stylesheet" href="{{ elixir('/food/css/app.css') }}">
    </head>
    <body>
        <div class="container">
            @yield('content')
        </div>
        <script src="{{ elixir('/food/js/app.js') }}"></script>
    </body>
</html>
