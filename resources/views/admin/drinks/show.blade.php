@extends('admin.layouts.main')

@section('title', $drink->name)

@section('content')
<h1>{{ $drink->name }}</h1>
<p class="message">
    {!! nl2br($drink->recipe) !!}
</p>
@endsection
