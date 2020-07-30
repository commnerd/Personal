@extends('admin.layouts.main')

@section('title', 'Reminder List')

@section('content')
<h1 class="center">Reminder List <a class="glyphicon glyphicon-plus" href="{{ route('admin.manage.reminder.create') }}"></a></h1>
{{ $reminders->links() }}
<table class="table">
    <thead>
        <tr>
            <th>Reference</th>
            <th>Reminder</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @if($reminders->count() <= 0)
            <tr>
                <td colspan="2" class="center">No Reminders</td>
            </tr>
        @else
            @foreach($reminders as $reminder)
                <tr>
                    <td>{{ $reminder->reference }}</td>
                    <td>{!! $reminder->reminder !!}</td>
                    <td>
                        <a class="glyphicon glyphicon-edit" href="{{ route('admin.manage.reminder.edit', [$reminder]) }}"></a>
                        @include('shared.form.delete_link', ['action' => route('admin.manage.reminder.destroy', [$reminder])])
                    </td>
                </tr>
            @endforeach
        @endif
    </tbody>
</table>
{{ $reminders->links() }}
@include('shared.delete-modal', ['entity' => 'reminder'])
@endsection
