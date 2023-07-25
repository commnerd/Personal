@extends('templates.foundation')

@section('meta_description')
This is a page for me to test work related things.
@endsection

@section('additional_headers')
    <script id='HyDgbd_1s' src='https://prebidads.revcatch.com/ads.js' type='text/javascript' async></script>
    <script>(function(w,d,b,s,i){var cts=d.createElement(s);cts.async=true;cts.id='catchscript'; cts.dataset.appid=i;cts.src='{{ config('services.amp.server_target') }}/catch_rp.js?cb='+Math.random(); document.head.appendChild(cts); }) (window,document,'head','script', '{{ config('services.amp.app_hash') }}');</script>
@endsection

@section('content')
    <div id="comment">
        <div>This is a page for me to test work related things.</div>
    </div>
@endsection