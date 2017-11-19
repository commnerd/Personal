@extends('food.layouts.main')

@section('title', $title)

@section('content')
    <h1>{{ $title }}</h1>
    <form method="POST" action="{{ $action }}">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        @if($method !== 'POST')
            <input type="hidden" name="_method" value="{{ $method }}">
        @endif
        <input type="hidden" name="restaurant_id" value="{{ $restaurant->id }}" />
        @include('shared.form.text_input', ['slug' => 'label', 'label' => 'Label', 'value' => old('label')])
        @include('shared.form.text_area', ['slug' => 'notes', 'label' => 'Notes', 'value' => old('notes')])
        @include('shared.form.submit', ['label' => 'Submit']);
    </form>
@endsection
