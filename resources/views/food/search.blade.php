@extends('food.layouts.main')

@section('title', 'Search')

@section('content')
<form method="GET" class="form-horizontal" action="{{ route('food.search') }}">
    <input type="text" class="form-control" name="term" id="term" placeholder="Search" />
</form>
@if(!empty(request()->term) && $results->count() > 0)
    @foreach($results as $result)
        <div class="result">
            <a href="?term='{{ $result }}'">{{$result}}</a>
        </div>
    @endforeach
@else
    <div class="result center">
        Nothing Found.
    </div>
@endif
@endsection
