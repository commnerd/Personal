@extends('admin.layouts.main')

@section('title', 'Message - From: '.$message->name.' ('.$message->email_phone.')')

@section('content')
<h1>Message - From: {{ $message->name }} ({{ $message->email_phone }})</h1>
<div class="message">
    {!! $message->message !!}
</div>
@endsection
