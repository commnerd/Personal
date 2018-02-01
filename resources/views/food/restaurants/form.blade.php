@extends('food.layouts.main')

@section('title', $title)

@section('content')
    <h1>{{ $title }}</h1>
    <form method="POST" class="form-horizontal" action="{{ $action }}">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        @if($method !== 'POST')
            <input type="hidden" name="_method" value="{{ $method }}">
        @endif
        @include('shared.form.text_input', [
            'slug' => 'name',
            'label' => 'Name',
            'value' => $restaurant->name ?? old('name'),
            'errors' => $errors->get('name')
        ])
        @if(isset($restaurant->id))
            @if(count($restaurant->orders) > 0)
            <h2 class="row col-sm-12">Choose the active order for {{ $restaurant->name }}:</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th>Default</th>
                        <th>Order</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($restaurant->orders as $order)
                    <tr>
                        <td><input type="radio" name="default_order" value="{{ $order->id }}"{{ $order->active ? ' checked' : '' }} /></td>
                        <td>{{ $order->label }}</td>
                        <td>
                            <a class="glyphicon glyphicon-edit" href="{{ route('orders.edit', ['restaurant' => $restaurant, 'order' => $order]) }}"></a>
                            @include('shared.form.delete_link', ['action' => route('orders.destroy', [$restaurant, $order])])
                            </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @endif
            <div>
                <a href="{{ route('orders.create', $restaurant) }}">Add Order</a>
            </div>
        @endif
        <div>
            @include('shared.form.submit', ['label' => 'Submit'])
        </div>
    </form>
    @include('shared.delete-modal', ['entity' => 'order'])
@endsection
