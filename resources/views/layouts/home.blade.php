<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ setting('site.title', config('app.name')) }}</title>
        <link rel="icon" href="/storage/michael-j-miller-logo.ico">
        <link rel="stylesheet" href="{{ mix('/css/app.css') }}">
        @if(config('app.env') === 'production')
        <script async src='https://www.google.com/recaptcha/api.js'></script>
        @endif
    </head>
    <body class="home">
        @include('shared.flash-message', ['error' => $error])
        <header>
            {{ menu('primary') }}
            <div class="header-content">
                @yield('header')
            </div>
        </header>
        <section>
            @yield('content')
        </section>
        @include('shared.footer')
        <script async src="{{ mix('/js/app.js') }}"></script>
        @include('shared.google-analytics')
    </body>
</html>
