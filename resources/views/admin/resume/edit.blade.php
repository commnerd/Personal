@extends('admin.layouts.main')

@section('title', "Employment Record for $record->employer")

@section('content')
    @include('admin.resume.form', [
        'title' => "Edit Employment Record ($record->employer)",
        'action' => route('resume.update', $record),
        'method' => 'POST',
        'record' => $record,
    ])
@endsection
