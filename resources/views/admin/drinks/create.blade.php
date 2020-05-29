@extends('admin.layouts.main')

@section('title', $title)

@section('content')
    @include('admin.drinks.form', [
        'title' => $title,
        'action' => route('admin.manage.drinks.store'),
        'method' => 'POST',
    ])
@endsection
