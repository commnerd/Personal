@extends('admin.layouts.main')

@section('title', "Edit Daily Reminder")

@section('content')
    @include('admin.daily_reminder.form', [
        'title' => "Edit Daily Reminder",
        'action' => route('admin.daily_reminder.update', $dailyReminder),
        'method' => 'PUT',
        'dailyReminder' => $dailyReminder,
    ])
@endsection
