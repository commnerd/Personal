@extends('admin.layouts.main')

@section('title', $drink->name)

@section('content')
<h1>{{ $drink->name }}</h1>
<p class="message">
    {!! $drink->recipe !!}
</p>
@endsection
