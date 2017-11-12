@extends('food.layouts.main')

@section('title', $title)

@section('content')
    <h1>{{ $title }}</h1>
    <form method="POST" action="{{ $action }}">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        @if($method !== 'POST')
            <input type="hidden" name="_method" value="{{ $method }}">
        @endif
        @include('shared.form.text_input', ['slug' => 'name', 'label' => 'Name', 'classes' => '', 'value' => ''])
        @include('shared.form.submit', ['label' => 'Submit']);
    </form>
@endsection
