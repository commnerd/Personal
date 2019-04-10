@extends('admin.layouts.main')

@section('title', $title)

@section('content')
    @include('admin.daily_reminder.form', [
        'title' => $title,
        'action' => route('admin.daily_reminder.store'),
        'method' => 'POST',
    ])
@endsection
