@extends('admin.layouts.main')

@section('title', "Edit Reminder")

@section('content')
    @include('admin.reminder.form', [
        'title' => "Edit Reminder",
        'action' => route('admin.manage.reminder.update', $reminder),
        'method' => 'PUT',
        'reminder' => $reminder,
    ])
@endsection
