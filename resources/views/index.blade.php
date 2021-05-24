<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Michael J. Miller</title>
        <base href="/">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" type="image/x-icon" href="favicon.ico">
        <link rel="stylesheet" href="/js/ng/styles.css">
    </head>
    <body class="container-fluid">
        <app-root></app-root>
        <script src="/ng/runtime.js" defer></script>
        <script src="/ng/polyfills.js" defer></script>
        <script src="/ng/scripts.js" defer></script>
        <script src="/ng/vendor.js" defer></script>
        <script src="/ng/main.js" defer></script>
    </body>
</html>
