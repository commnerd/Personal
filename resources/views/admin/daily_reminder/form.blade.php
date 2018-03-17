@extends('admin.layouts.main', ['errors' => $errors])

@section('title', $title)

@section('content')
    <h1 class="center">{{ $title }}</h1>
    <form method="POST" class="form-horizontal" action="{{ $action }}">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        @if($method !== 'POST')
            <input type="hidden" name="_method" value="{{ $method }}">
        @endif
        @if(isset($reminder))
            <input type="hidden" name="reminder_id" value="{{ $reminder->id }}" />
        @endif
        <div class="col-lg-12">
            @include('shared.form.text_input', [
                'slug' => 'reference',
                'label' => 'Reference',
                'value' => $dailyReminder->reference ?? old('reference'),
                'errors' => $errors->get('reference')
            ])
        </div>
        <div class="col-lg-12">
            @include('shared.form.text_area', [
                'slug' => 'reminder',
                'label' => 'Reminder',
                'value' => $dailyReminder->reminder ?? old('reminder'),
                'errors' => $errors->get('reminder'),
            ])
        </div>
        <div class="col-lg-12">
            @include('shared.form.submit', ['label' => 'Submit'])
        </div>
    </form>
@endsection
