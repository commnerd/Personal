@extends('food.layouts.main')

@section('title', 'Search')

@section('content')
<form method="GET" class="form-horizontal" action="{{ route('food.search') }}">
    <input type="text" class="form-control" name="search" id="search" placeholder="Search" />
</form>
@endsection
