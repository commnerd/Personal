@extends('admin.layouts.main', ['errors' => $errors])

@section('title', $title)

@section('content')
    <h1 class="center">{{ $title }}</h1>
    <form method="POST" class="form-horizontal" action="{{ $action }}">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        @if($method !== 'POST')
            <input type="hidden" name="_method" value="{{ $method }}">
        @endif
        @if(isset($quote))
            <input type="hidden" name="reminder_id" value="{{ $quote->id }}" />
        @endif
        <div class="col-lg-12">
            @include('shared.form.text_input', [
                'slug' => 'source',
                'label' => 'Source',
                'value' => $quote->source ?? old('source'),
                'errors' => $errors->get('source')
            ])
        </div>
        <div class="col-lg-12">
            @include('shared.form.text_area', [
                'slug' => 'quote',
                'label' => 'Quote',
                'value' => $quote->quote ?? old('quote'),
                'errors' => $errors->get('quote'),
            ])
        </div>
        <div class="col-lg-12">
            @include('shared.form.check_input', [
                'slug' => 'active',
                'label' => 'Activate',
                'value' => true,
                'errors' => $errors->get('active'),
            ])
        </div>
        <div class="col-lg-12">
            @include('shared.form.submit', ['label' => 'Submit'])
        </div>
    </form>
@endsection
