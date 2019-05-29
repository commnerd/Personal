@extends('admin.layouts.main')

@section('title', 'Quote List')

@section('content')
<h1 class="center">Quote List <a class="glyphicon glyphicon-plus" href="{{ route('admin.quotes.create') }}"></a></h1>
{{ $quotes->links() }}
<table class="table">
    <thead>
        <tr>
            <th>Active</th>
            <th>Reference</th>
            <th>Reminder</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @if($quotes->count() <= 0)
            <tr>
                <td colspan="2" class="center">No Quotes</td>
            </tr>
        @else
            @foreach($quotes as $quote)
                <tr>
                    <td>
                        <input type="radio"
                            name="active"
                            value="{{ $quote->id }}"
                            {{ $quote->active ? ' checked' : '' }}
                            data-route="{{ route('admin.quotes.update', ['quote' => $quote]) }}"
                        >
                    </td>
                    <td>{{ $quote->source }}</td>
                    <td>{!! $quote->quote !!}</td>
                    <td>
                        <a class="glyphicon glyphicon-edit" href="{{ route('admin.quotes.edit', [$quote]) }}"></a>
                        @include('shared.form.delete_link', ['action' => route('admin.quotes.destroy', [$quote])])
                    </td>
                </tr>
            @endforeach
        @endif
    </tbody>
</table>
<form method="POST" class="activate" action="{{ route('admin.quotes.activate') }}">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="hidden" name="_method" value="PUT">
</form>
{{ $quotes->links() }}
@include('shared.delete-modal', ['entity' => 'quote'])
@endsection
