@extends('templates.foundation')

@section('content')
<header>
  <nav class="navbar navbar-light bg-light justify-content-between">
    <a class="navbar-brand" href="{{ route('welcome') }}">Navbar</a>
    <form class="form-inline">
      <input class="form-control mr-sm-2 form-inline" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0 form-inline" type="submit">Search</button>
    </form>
  </nav>
</header>
<section>
  <div class="container">
    @foreach($list as $item)
    <div class="row">
      <div class="col-sm">
        {{ $item->label }}
      </div>
      <div class="col-sm">
        {{ $item->label }}
      </div>
    </div>
    @endforeach
    
  </div>
</section>
@endsection