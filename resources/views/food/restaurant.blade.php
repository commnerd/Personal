<a href="{{ route('web.food') }}">Back</a>
<h1>{{ $restaurant->name }}</h1>
<section>
    @foreach($restaurant->orders as $order)
    <h2>{{ $order->label }}</h2>
    <div>
        {!! $order->notes !!}
    </div>
    @endforeach
</section>