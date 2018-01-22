@extends('layouts.main', ['title' => 'Portfolio', 'slug' => 'portfolio'])

@section('content')
    @foreach($entries as $entry)
        @include('partials.portfolio-entry', $entry->toArray())
    @endforeach
@endsection
