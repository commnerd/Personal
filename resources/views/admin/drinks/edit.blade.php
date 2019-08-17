@extends('admin.layouts.main')

@section('title', "Recipe for $drink->name")

@section('content')
    @include('admin.drinks.form', [
        'title' => "Edit Drink ($drink->name)",
        'action' => route('admin.drinks.update', $drink),
        'method' => 'PUT',
        'record' => $drink,
    ])
@endsection
