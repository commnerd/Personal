@extends('admin.layouts.main')

@section('title', 'Package List')

@section('content')
<h1 class="center">Package List <a class="glyphicon glyphicon-plus" href="{{ route('admin.manage.composer.packages.create') }}"></a></h1>
<form method="GET" class="form-horizontal">
    <div class="col-xs-12 col-md-10">
        <input type="text" class="form-control" name="q" value="{{ request()->q }}" id="query" placeholder="Search" />
    </div>
    <div class="col-xs-12 col-md-2">
        <button type="submit" class="btn btn-primary col-xs-12">Submit</button>
    </div>
</form>
<div class="center">
    {{ $packages->links() }}
</div>
<table class="table">
    <thead>
        <tr>
            <th>Package Name</th>
            <th>Package Version</th>
            <th>Package Type</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @if($packages->count() <= 0)
            <tr>
                <td colspan="4" class="center">No Records</td>
            </tr>
        @else
            @foreach($packages as $package)
                <tr>
                    <td><a href="{{ route('admin.manage.composer.packages.show', $package) }}">{{ $package->name }}</a></td>
                    <td>{{ $package->version }}</td>
                    <td>{{ $package::TYPES[$package->type] }}</td>
                    <td>
                        <a class="glyphicon glyphicon-edit" href="{{ route('admin.manage.composer.packages.edit', [$package]) }}"></a>
                        @include('shared.form.delete_link', ['action' => route('admin.manage.composer.packages.destroy', [$package])])
                    </td>
                </tr>
            @endforeach
        @endif
    </tbody>
</table>
<div class="center">
    {{ $packages->links() }}
</div>
@include('shared.delete-modal', ['entity' => 'package'])
@endsection
