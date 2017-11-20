@extends('food.layouts.main')

@section('title', $restaurant->name.' Orders List')

@section('content')
    <h1>{{$restaurant->name}} Orders List <a class="glyphicon glyphicon-plus" href="{{ route('orders.create', $restaurant) }}"></a></h1>
    <table class="table">
        <thead>
            <tr>
                <th>Active</th><th>Order</th><th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($restaurant->orders as $order)
            <tr>
                <td>{{ $order->label }}</td>
                <td>
                    <a class="glyphicon glyphicon-edit" href="{{ route('orders.edit', [$restaurant, $order]) }}"></a>');
                    <a href="#">Delete</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection
