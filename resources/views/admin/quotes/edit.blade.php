@extends('admin.layouts.main')

@section('title', "Edit Quote")

@section('content')
    @include('admin.quotes.form', [
        'title' => "Edit Quote",
        'action' => route('admin.manage.quotes.update', $quote),
        'method' => 'PUT',
        'dailyReminder' => $quote,
    ])
@endsection
