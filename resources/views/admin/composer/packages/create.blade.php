@extends('admin.layouts.main')

@section('title', $title)

@section('content')
    @include('admin.composer.packages.form', [
        'title' => $title,
        'action' => route('admin.manage.composer.packages.store'),
        'method' => 'POST',
    ])
@endsection
