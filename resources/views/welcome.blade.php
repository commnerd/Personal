
@extends('templates.foundation')

@section('title'){{ config('app.name') }}@hasSection('title') - @yield('title')@endif
@endsection
