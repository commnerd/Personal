<!-- Stored in resources/views/child.blade.php -->

@extends('food.layouts.main')

@section('title', 'Restaurant List')

@section('content')
    <h1>Restaurant List</h1>
    {{ $restaurants->links() }}
    <table class="table">
        <thead>
            <tr>
                <th>Restaurant</th><th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($restaurants as $restaurant)
            <tr>
                <td>{{ $restaurant->name }}</td>
                <td><a href="#">Edit</a><a href="#">Delete</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $restaurants->links() }}
@endsection
