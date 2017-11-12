<!-- Stored in resources/views/child.blade.php -->

@extends('food.layouts.main')

@section('title', 'Restaurant List')

@section('content')
    <h1>Create Restaurant</h1>
    @include('food.restaurants.form', ['action' => route('restaurants.store'), 'method' => 'post']);
@endsection
