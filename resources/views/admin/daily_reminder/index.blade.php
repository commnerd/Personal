@extends('admin.layouts.main')

@section('title', 'Daily Reminder List')

@section('content')
<h1 class="center">Daily Reminder List <a class="glyphicon glyphicon-plus" href="{{ route('admin.daily_reminder.create') }}"></a></h1>
{{ $dailyReminders->links() }}
<table class="table">
    <thead>
        <tr>
            <th>Reference</th>
            <th>Reminder</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @if($dailyReminders->count() <= 0)
            <tr>
                <td colspan="2" class="center">No Reminders</td>
            </tr>
        @else
            @foreach($dailyReminders as $reminder)
                <tr>
                    <td>{{ $reminder->reference }}</td>
                    <td>{{ $reminder->reminder }}</td>
                    <td>
                        <a class="glyphicon glyphicon-edit" href="{{ route('admin.daily_reminder.edit', [$reminder]) }}"></a>
                        @include('shared.form.delete_link', ['action' => route('admin.daily_reminder.destroy', [$reminder])])
                    </td>
                </tr>
            @endforeach
        @endif
    </tbody>
</table>
{{ $dailyReminders->links() }}
@include('shared.delete-modal', ['entity' => 'reminder'])
@endsection
