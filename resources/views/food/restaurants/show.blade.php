@extends('food.layouts.main')

@section('title', $restaurant->name)

@section('content')
<h1>{{ $restaurant->name }}</h1>
<div>
    @if($restaurant->orders->count() > 0)
        <ol class="orders">
        @foreach($restaurant->orders as $order)
            <li>
                <h3>{{ $order->label}}</h3>
                <div>
                    {!! nl2br($order->notes) !!}
                </div>
            </li>
        @endforeach
        </ol>
    @else
        No Orders
    @endif

</div>
@endsection
