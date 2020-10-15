@extends('admin.layouts.main')

@section('title', $title)

@section('content')
    @include('admin.composer_repos.form', [
        'title' => $title,
        'action' => route('admin.manage.composer_repos.store'),
        'method' => 'POST',
    ])
@endsection
