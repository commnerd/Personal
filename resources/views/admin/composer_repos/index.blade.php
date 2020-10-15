@extends('admin.layouts.main')

@section('title', 'Repo List')

@section('content')
<h1 class="center">Repo List <a class="glyphicon glyphicon-plus" href="{{ route('admin.manage.composer_repos.create') }}"></a></h1>
<form method="GET" class="form-horizontal">
    <div class="col-xs-12 col-md-10">
        <input type="text" class="form-control" name="q" value="{{ request()->q }}" id="query" placeholder="Search" />
    </div>
    <div class="col-xs-12 col-md-2">
        <button type="submit" class="btn btn-primary col-xs-12">Submit</button>
    </div>
</form>
<div class="center">
    {{ $composer_repos->links() }}
</div>
<table class="table">
    <thead>
        <tr>
            <th>Repo URL</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @if($composer_repos->count() <= 0)
            <tr>
                <td colspan="2" class="center">No Records</td>
            </tr>
        @else
            @foreach($composer_repos as $composer_repo)
                <tr>
                    <td><a href="{{ route('admin.manage.composer_repos.show', $composer_repo) }}">{{ $composer_repo->url }}</a></td>
                    <td>
                        <a class="glyphicon glyphicon-edit" href="{{ route('admin.manage.composer_repos.edit', [$composer_repo]) }}"></a>
                        @include('shared.form.delete_link', ['action' => route('admin.manage.composer_repos.destroy', [$composer_repo])])
                    </td>
                </tr>
            @endforeach
        @endif
    </tbody>
</table>
<div class="center">
    {{ $composer_repos->links() }}
</div>
@include('shared.delete-modal', ['entity' => 'repo'])
@endsection
