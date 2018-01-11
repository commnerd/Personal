@extends('food.layouts.main')

@section('title', $restaurant->name)

@section('content')
<h1>{{ $restaurant->name }}
<div class="">
    @if(isset($restaurant->active_order))
        <h3>{{ $restaurant->active_order->label}}</h3>
        <div class="">
            {{ $restaurant->active_order->notes }}
        </div>
    @else
        No active order
    @endif

</div>
@endsection
