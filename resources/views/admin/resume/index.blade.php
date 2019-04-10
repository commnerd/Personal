@extends('admin.layouts.main')

@section('title', 'Employment Record List')

@section('content')
<h1 class="center">Employment Record List <a class="glyphicon glyphicon-plus" href="{{ route('admin.resume.create') }}"></a></h1>
<table class="table">
    <thead>
        <tr>
            <th>Employer</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @if($records->count() <= 0)
            <tr>
                <td colspan="2" class="center">No Records</td>
            </tr>
        @else
            @foreach($records as $record)
                <tr>
                    <td>{{ $record->employer }}</td>
                    <td>
                        <a class="glyphicon glyphicon-edit" href="{{ route('admin.resume.edit', [$record]) }}"></a>
                        @include('shared.form.delete_link', ['action' => route('admin.resume.destroy', [$record])])
                    </td>
                </tr>
            @endforeach
        @endif
    </tbody>
</table>
@include('shared.delete-modal', ['entity' => 'record'])
@endsection
