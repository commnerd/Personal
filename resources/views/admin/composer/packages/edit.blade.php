@extends('admin.layouts.main')

@section('title', "Package $package->name")

@section('content')
    @include('admin.composer.packages.form', [
        'title' => "Edit Package ($package->name)",
        'action' => route('admin.manage.composer.packages.update', $package),
        'method' => 'PUT',
        'package' => $package,
    ])
@endsection
