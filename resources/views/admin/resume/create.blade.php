@extends('admin.layouts.main')

@section('title', $title)

@section('content')
    @include('admin.resume.form', [
        'title' => $title,
        'action' => route('resume.store'),
        'method' => 'POST',
    ])
@endsection
