<!DOCTYPE html>
<html>
    <head>
        <title>Admin</title>
        <link rel="stylesheet" href="{{ elixir('/food/css/app.css') }}">
    </head>
    <body>
        <div class="container-fluid">
            @yield('content')
        </div>
        <script src="{{ elixir('/admin/js/app.js') }}"></script>
    </body>
</html>
