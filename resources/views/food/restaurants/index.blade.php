@extends('food.layouts.main')

@section('title', 'Restaurant List')

@section('content')
    <h1>Restaurant List <a class="glyphicon glyphicon-plus" href="{{ route('restaurants.create') }}"></a></h1>
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
                <td><a href="{{ route('restaurants.show', $restaurant) }}">{{ $restaurant->name }}</a></td>
                <td>
                    <a class="glyphicon glyphicon-edit" href="{{ route('restaurants.edit', $restaurant) }}"></a>
                    <a href="#">Delete</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $restaurants->links() }}
@endsection
