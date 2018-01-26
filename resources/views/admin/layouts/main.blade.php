<!DOCTYPE html>
<html>
    <head>
        <title>Admin - @yield('title')</title>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="stylesheet" href="{{ elixir('/food/css/app.css') }}">
    </head>
    <body>
        <div class="container-fluid">
            @yield('content')
        </div>
        <script src="{{ elixir('/admin/js/app.js') }}"></script>
    </body>
</html>
