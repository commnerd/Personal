<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        @hasSection('meta_description')<meta name="description" content="@yield('meta_description')">@endif
        <title>{{ config('app.name') }}@hasSection('title') - @yield('title') @endif</title>
        <link rel="icon" href="/storage/michael-j-miller-logo.ico">
        @hasSection('additional_headers')@yield('additional_headers')@endif
        @vite('resources/sass/'.Route::current()->getName().'.scss')
    </head>
    <body class="antialiased">
        @yield('content')
        <footer>
            <nav class="nav">
                <a class="nav-link{!! Route::current()->getName() == 'welcome' ? ' active" aria-current="page"' : '"' !!} href="/">Home</a>
                <a class="nav-link{!! Route::current()->getName() == 'resume' ? ' active" aria-current="page"' : '"' !!} href="/resume">Resume</a>
            </nav>
        </footer>
        @vite('resources/js/'.Route::current()->getName().'.js')
    </body>
    
</html>