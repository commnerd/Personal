<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ setting('site.title', config('app.name')) }} - {{ $title }}</title>
        <link rel="icon" href="/storage/michael-j-miller-logo.ico">
        <link rel="stylesheet" href="{{ mix('/css/app.css') }}">
    </head>
    <body class="{{ $slug }}">
        @include('shared.flash-message')
        <header>
            {{ menu('primary', ($searchable ?? false) ? 'vendor.voyager.menu.search' : 'vendor.voyager.menu.default') }}
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
