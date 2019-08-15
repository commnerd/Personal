@extends('admin.layouts.main')

@section('title', $name)

@section('content')
    @include('admin.drink.form', [
        'title' => $title,
        'action' => route('admin.drink.store'),
        'method' => 'POST',
    ])
@endsection
