@extends('admin.layouts.main')

@section('title', $title)

@section('content')
    @include('admin.reminder.form', [
        'title' => $title,
        'action' => route('admin.manage.reminder.store'),
        'method' => 'POST',
    ])
@endsection
