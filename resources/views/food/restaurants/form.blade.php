@extends('food.layouts.main')

@section('title', $title)

@section('content')
    <h1>{{ $title }}</h1>
    <form method="POST" class="form-horizontal" action="{{ $action }}">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        @if($method !== 'POST')
            <input type="hidden" name="_method" value="{{ $method }}">
        @endif
        <div class="row">
            <div class="col-md-12">
                @include('shared.form.text_input', [
                    'slug' => 'name',
                    'label' => 'Name',
                    'value' => $restaurant->name ?? old('name'),
                    'errors' => $errors->get('name')
                ])
            </div>
        </div>
        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
            @if($restaurant->contacts)
                @foreach($restaurant->contacts as $index => $contact)
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="heading{{ $index }}">
                        <h4 class="panel-title">
                            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse{{ $index }}" aria-expanded="true" aria-controls="collapse{{ $index }}">
                                Contact Info #{{ $index }}
                            </a>
                        </h4>
                    </div>
                    <div id="collapse{{ $index }}" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="heading{{ $index }}">
                        <div class="panel-body">
                            @include('shared.form.contact_info', [
                                'parentSlug' => `contact[%{$index}]`,
                                'parentObj' => $restaurant,
                            ])
                        </div>
                    </div>
                </div>
                @endforeach
            @endif
        </div>
        @if(isset($restaurant->id))
            @if(count($restaurant->orders) > 0)
            <h2 class="row col-sm-12">Orders for {{ $restaurant->name }}:</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th>Order</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($restaurant->orders as $order)
                    <tr>
                        <td>{{ $order->label }}</td>
                        <td>
                            <a class="glyphicon glyphicon-edit" href="{{ route('orders.edit', [$restaurant, $order]) }}"></a>
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
