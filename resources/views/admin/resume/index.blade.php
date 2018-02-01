@extends('admin.layouts.main')

@section('title', 'Employment Record List')

@section('content')
<h1 class="center">Employment Record List</h1>
<table class="table">
    <thead>
        <tr>
            <th>Employer</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @if(empty($records))
            <tr>
                <td colspan="2" class="center">No Records</td>
            </tr>
        @else
            <tr>
                <td>{{ $record->employer }}</td>
                <td>
                    <a class="glyphicon glyphicon-edit" href="{{ route('resume.edit', [$record]) }}"></a>
                    @include('shared.form.delete_link', ['action' => route('resume.destroy', [$record])])
                </td>
            </tr>
        @endif

    </tbody>
</table>
@endsection
