@extends('shared.layouts.form')

@section('action', route('restaurants.create'))

@section('method', 'POST');

@section('form_content')
    @include('shared.form.text_input', ['slug' => 'name', 'label' => 'Name', 'classes' => '', 'value' => ''])
    @include('shared.form.submit', ['label' => 'Submit']);
@endsection
