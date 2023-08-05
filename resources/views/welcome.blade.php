@extends('templates.foundation')

@section('meta_description')
Welcome to my personal website! Discover my ongoing journey of constant improvement as I work on updating and enhancing the site. Stay tuned for exciting and frequent updates coming your way.
@endsection

@section('content')
<header>
    <div id="comment">
        <blockquote
            @if($quote->quote_citation)
            cite="{{ $quote->quote_citation }}"
            @endif
        >
        <p>{!! $quote->quote !!}</p>
        <footer>— {{$quote->source}}@if($quote->source_citation)<cite>{{ $quote->source_citation }}</cite>@endif</footer>
        </blockquote>
    </div>
</header>
<footer>

</footer>
@endsection