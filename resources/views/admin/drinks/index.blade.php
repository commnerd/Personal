@extends('admin.layouts.main')

@section('title', 'Drink List')

@section('content')
<h1 class="center">Drink List <a class="glyphicon glyphicon-plus" href="{{ route('admin.drinks.create') }}"></a></h1>
<form method="GET" class="form-horizontal">
    <div class="col-xs-12 col-md-10">
        <input type="text" class="form-control" name="q" value="{{ request()->q }}" id="query" placeholder="Search" />
    </div>
    <div class="col-xs-12 col-md-2">
        <button type="submit" class="btn btn-primary col-xs-12">Submit</button>
    </div>
</form>
<div class="center">
    {{ $drinks->links() }}
</div>
<table class="table">
    <thead>
        <tr>
            <th>Drink</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @if($drinks->count() <= 0)
            <tr>
                <td colspan="2" class="center">No Records</td>
            </tr>
        @else
            @foreach($drinks as $drink)
                <tr>
                    <td><a href="{{ route('admin.drinks.show', $drink) }}">{{ $drink->name }}</a></td>
                    <td>
                        <a class="glyphicon glyphicon-edit" href="{{ route('admin.drinks.edit', [$drink]) }}"></a>
                        @include('shared.form.delete_link', ['action' => route('admin.drinks.destroy', [$drink])])
                    </td>
                </tr>
            @endforeach
        @endif
    </tbody>
</table>
<div class="center">
    {{ $drinks->links() }}
</div>
@include('shared.delete-modal', ['entity' => 'drink'])
@endsection
