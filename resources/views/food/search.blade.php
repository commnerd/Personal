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
    @if(empty(request()->get('q')))
    Please search for a meal name, an ingredient, or a restaurant name.
    @endif
    @foreach($list as $item)
    <div class="row">
      <div class="col-sm">
        {{ $item->label }}
      </div>
    </div>
    @endforeach
  </div>
</section>
@endsection