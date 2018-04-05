<!DOCTYPE html>
<html>
    <head>
        <title>Admin - @yield('title')</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <link rel="icon" href="/storage/michael-j-miller-logo.ico">
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
