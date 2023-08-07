@extends('templates.foundation')

@section('content')
<nav class="navbar navbar-light bg-light justify-content-between">
  <a class="navbar-brand">Navbar</a>
  <form class="form-inline">
    <input class="form-control mr-sm-2 form-inline" type="search" placeholder="Search" aria-label="Search">
    <button class="btn btn-outline-success my-2 my-sm-0 form-inline" type="submit">Search</button>
  </form>
</nav>
@endsection