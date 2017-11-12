@extends('shared.layouts.form')

@section('action', route('restaurants.create'))

@section('method', 'POST');

@section('form_content')
    @include('shared.text_input', [
        'slug' => 'name',
        'label' => 'Name',
        'classes' => '',
    ])
@endsection
