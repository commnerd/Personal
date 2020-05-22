@extends('food.layouts.main')

@section('title', 'Search')

@section('content')
    <form method="GET" class="form-horizontal" action="{{ route('food.search') }}">
        <div class="col-xs-12 col-md-10">
            <input type="text" class="form-control" name="q" value="{{ request()->q }}" id="query" placeholder="Search" />
        </div>
        <div class="col-xs-12 col-md-2">
            <button type="submit" class="btn btn-primary col-xs-12">Submit</button>
        </div>
    </form>
    @if(!empty(request()->q) && $results->count() > 0)
        @foreach($results as $result)
            <div class="result">
                <a href="{{ $result["route"] }}">{{$result["label"]}}</a>
            </div>
        @endforeach
    @else
        <div class="result center">
            Nothing Found.
        </div>
    @endif
@endsection
