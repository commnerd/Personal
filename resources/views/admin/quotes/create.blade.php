@extends('admin.layouts.main')

@section('title', $title)

@section('content')
    @include('admin.quotes.form', [
        'title' => $title,
        'action' => route('admin.manage.quotes.store'),
        'method' => 'POST',
    ])
@endsection
