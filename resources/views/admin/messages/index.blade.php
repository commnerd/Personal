@extends('admin.layouts.main')

@section('title', 'Messages')

@section('content')
<h1>Messages</h1>
<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th><input type="checkbox" class="check-all"></th>
            <th>From</th>
            <th>Contact</th>
            <th>Sent</th>
            <th>@include('shared.form.delete_link', ['action' => 'group'])</th>
        </tr>
    </thead>
    <tbody>
        @if(sizeof($messages) > 0)
            @foreach($messages as $message)
                <tr>
                    <td><input type="checkbox" </td>
                    <td><a href="{{ route('contact.show', $message) }}">{{ $message->name }}</a></td>
                    <td><a href="{{ route('contact.show', $message) }}">{{ $message->email_phone }}</a></td>
                    <td>{{ $message->created_at->format('d/m/Y') }}</td>
                    <td>@include('shared.form.delete_link', ['action' => route('contact.destroy', $message)])</td>
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="3">No messages.</td>
            </tr>
        @endif
    </tbody>
</table>
@include('shared.delete-modal', ['entity' => 'message'])
@endsection
