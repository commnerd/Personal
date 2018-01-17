@extends('food.layouts.main')

@section('title', $restaurant->name)

@section('content')
<h1>{{ $restaurant->name }}</h1>
<div>
    @if(isset($restaurant->active_order))
        <h3>{{ $restaurant->active_order->label}}</h3>
        <div>
            {!! nl2br($restaurant->active_order->notes) !!}
        </div>
    @else
        No active order
    @endif

</div>
@endsection
