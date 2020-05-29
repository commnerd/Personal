@extends('admin.layouts.main')

@section('title', "Employment Record for $record->employer")

@section('content')
    @include('admin.resume.form', [
        'title' => "Edit Employment Record ($record->employer)",
        'action' => route('admin.manage.resume.update', $record),
        'method' => 'PUT',
        'record' => $record,
    ])
@endsection
