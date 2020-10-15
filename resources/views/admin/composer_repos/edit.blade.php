@extends('admin.layouts.main')

@section('title', "Repo $composer_repo->url")

@section('content')
    @include('admin.composer_repos.form', [
        'title' => "Edit Repo ($composer_repo->url)",
        'action' => route('admin.manage.composer_repos.update', $composer_repo),
        'method' => 'PUT',
        'composer_repo' => $composer_repo,
    ])
@endsection
