@extends('admin.layouts.main')

@section('title', $title)

@section('content')
    @include('admin.quotes.form', [
        'title' => $title,
        'action' => route('quotes.store'),
        'method' => 'POST',
    ])
@endsection
