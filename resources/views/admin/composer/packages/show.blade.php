@extends('admin.layouts.main')

@section('title', $package->name)

@section('content')
<h1>{{ $package->name }}</h1>
<p class="message">
    {!! $package->name !!}
</p>
@endsection
