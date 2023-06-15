
@extends('templates.foundation')

@section('title'){{ config('app.name') }}@hasSection('title') - @yield('title')@endif
@endsection

@section('content')
<div class="container py-4 px-3 mx-auto">
    <h1>Hello, Bootstrap and Vite!</h1>
    <button class="btn btn-primary">Primary button</button>
</div>
@endsection