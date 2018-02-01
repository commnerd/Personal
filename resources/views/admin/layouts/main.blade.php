<!DOCTYPE html>
<html>
    <head>
        <title>Admin - @yield('title')</title>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="stylesheet" href="{{ elixir('/css/admin/app.css') }}">
        <link rel="stylesheet" href="{{ elixir('/css/admin/etc.css') }}">
    </head>
    <body>
        <div class="container-fluid">
            @yield('content')
        </div>
        <script src="{{ elixir('/js/admin/app.js') }}"></script>
    </body>
</html>
