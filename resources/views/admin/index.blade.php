@extends('admin.layouts.index')

@section('content')
<div class="row">
    <fieldset class="col-sm-12">
        <legend>System</legend>
        <div class="col-sm-4">
            <div class="list-group">
                <span class="list-group-item">
                    <span class="item-label">Disk Usage:</span>
                    <span class="item-value">{{ $diskUsage }}</span>
                </span>
                <span class="list-group-item">Moar</span>
            </div>
        </div>
    </fieldset>
</div>
<div class="row">
    <fieldset class="col-sm-6">
        <legend>Messages</legend>
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th colspan="3">Newest Messages</th>
                </tr>
                <tr>
                    <th>From</th><th>Contact</th><th>Sent</th>
                </tr>
            </thead>
            <tbody>
                @if(sizeof($messages) > 0)
                    @foreach($messages as $message)
                        <tr>
                            <td>{{ $message->name }}</td>
                            <td>{{ $message->email_phone }}</td>
                            <td>{{ $message->created_at }}</td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="3">No new messages.</td>
                    </tr>
                @endif
            </tbody>
        </table>
        <div class="list-group">
            <a href="{{ route('admin.contact.index') }}" class="list-group-item">View All Messages</a>
        </div>
    </fieldset>
    <fieldset class="col-sm-6">
        <legend>Resume</legend>
        <div class="list-group">
            <a href="{{ route('admin.resume.index') }}" class="list-group-item">Edit Resume</a>
            <a href="{{ route('admin.resume.create') }}" class="list-group-item">Add Employment Record</a>
        </div>
    </fieldset>
</div>
<div class="row">
    <fieldset class="col-sm-6">
        <legend>Daily Reminders</legend>
        <div class="list-group">
            <a href="{{ route('admin.daily_reminder.index') }}" class="list-group-item">Manage Daily Reminders</a>
            <a href="{{ route('admin.daily_reminder.create') }}" class="list-group-item">Add Daily Reminder</a>
        </div>
    </fieldset>
    <fieldset class="col-sm-6">
        <legend>Quotes</legend>
        <div class="list-group">
            <a href="{{ route('admin.quotes.index') }}" class="list-group-item">Manage Quotes</a>
            <a href="{{ route('admin.quotes.create') }}" class="list-group-item">Add Quote</a>
        </div>
    </fieldset>
</div>
@endsection
