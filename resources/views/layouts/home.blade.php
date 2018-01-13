<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ env('APP_NAME') }}</title>

        <link rel="stylesheet" href="{{ mix('/css/app.css') }}">
    </head>
    <body class="home">
        <header>
            @include('partials.main-nav')
            @yield('header')
        </header>
        <section class="container-fluid">
            @yield('content')
        </section>
        <script src="{{ mix('/js/app.js') }}"></script>
    </body>
</html>
