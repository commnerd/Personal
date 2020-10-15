@extends('admin.layouts.main')

@section('title', $composer_repo->url)

@section('content')
<h1>{{ $composer_repo->url }}</h1>
<p class="message">
    {!! $composer_repo->url !!}
</p>
@endsection
