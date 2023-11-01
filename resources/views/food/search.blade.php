@extends('templates.foundation')

@section('content')
<header>
  <nav class="navbar bg-body-tertiary">
    <div class="container-fluid">
      <a class="navbar-brand">Navbar</a>
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="q">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </nav>
</header>
<section>
  <div class="container">
    @if(!request()->has('q'))
    Please search for a meal name, an ingredient, or a restaurant name.
    @elseif($list->isEmpty())
    Sorry, no results found for this search.
    @endif
    @foreach($list as $item)
    <div class="row">
      <div class="col-sm">
        @switch(get_class($item))
        @case(\App\Models\Food\Order::class)
        <a href="{{ route('web.food.order', $item->id) }}">{{ $item->label }}</a>
        @break
        @default
        <a href="{{ route('web.food.restaurant', $item->id) }}">{{ $item->name }}</a>
        @endswitch
      </div>
    </div>
    @endforeach
  </div>
</section>
@endsection