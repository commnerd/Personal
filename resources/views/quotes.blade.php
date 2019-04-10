@extends('layouts.main', ['title' => 'Quotes', 'slug' => 'quotes'])

@section('content')
    @foreach($quotes as $quote)
        @include('shared.quote', ['quote' => $quote])
    @endforeach
@endsection
