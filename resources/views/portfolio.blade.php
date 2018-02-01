@extends('layouts.main', ['title' => 'Portfolio', 'slug' => 'portfolio'])

@section('content')
    @foreach($entries as $entry)
        @include('shared.portfolio-entry', $entry->toArray())
    @endforeach
@endsection
