<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ env('APP_NAME') }} - {{ $title }}</title>
        <link rel="icon" href="/storage/michael-j-miller-logo.ico">
        <link rel="stylesheet" href="{{ mix('/css/app.css') }}">
    </head>
    <body class="{{ $slug }}">
        @include('shared.flash-message')
        <header>
            @include('shared.main-nav')
            @yield('header')
        </header>
        <section>
            @yield('content')
        </section>
        @include('shared.footer')
        <script src="{{ mix('/js/app.js') }}"></script>
        @include('shared.google-analytics')
    </body>
</html>
