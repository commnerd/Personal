@extends('layouts.main', ['title' => 'Quotes', 'slug' => 'quotes', 'searchable' => true])

@section('content')
    @if($quotes->count() <= 0)
        @include('shared.quote', ['quote' => new App\Models\Quote([
            "source" => "Michael J. Miller",
            "quote" => "No quotes found.",
        ])])
    @else
        <div class="center">
            {{ $quotes->links() }}
        </div>
        @foreach($quotes as $quote)
            @include('shared.quote', ['quote' => $quote])
        @endforeach
        <div class="center">
            {{ $quotes->links() }}
        </div>
    @endif
@endsection
