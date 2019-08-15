@extends('admin.layouts.main', ['errors' => $errors])

@section('title', $name)

@section('content')
    <h1 class="center">{{ $name }}</h1>
    <form method="POST" class="form-horizontal" action="{{ $action }}">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        @if($method !== 'POST')
            <input type="hidden" name="_method" value="{{ $method }}">
        @endif
        @if(isset($employmentRecord))
            <input type="hidden" name="employment_record_id" value="{{ $drink->id }}" />
        @endif
        <div class="col-lg-12">
            @include('shared.form.text_input', [
                'slug' => 'drink',
                'label' => 'Drink',
                'value' => $drink->name ?? old('name'),
                'errors' => $errors->get('name')
            ])
        </div>
        <div class="col-lg-12">
            @include('shared.form.text_area', [
                'slug' => 'recipe',
                'label' => 'Recipe',
                'value' => drink->recipe ?? old('recipe'),
                'errors' => $errors->get('bullets'),
            ])
        </div>
        <div class="col-lg-12">
            @include('shared.form.submit', ['label' => 'Submit'])
        </div>
    </form>
@endsection
