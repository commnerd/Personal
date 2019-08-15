@extends('admin.layouts.main')

@section('title', "Recipe for $drink->name")

@section('content')
    @include('admin.drink.form', [
        'title' => "Edit Employment Record ($drink->name)",
        'action' => route('admin.drink.update', $drink),
        'method' => 'PUT',
        'record' => $drink,
    ])
@endsection
