@extends('admin.layouts.main', ['errors' => $errors])

@section('title', $title)

@section('content')
    <h1 class="center">{{ $title }}</h1>
    <form method="POST" class="form-horizontal" action="{{ $action }}">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        @if($method !== 'POST')
            <input type="hidden" name="_method" value="{{ $method }}">
        @endif
        @if(isset($employmentRecord))
            <input type="hidden" name="employment_record_id" value="{{ $employmentRecord->id }}" />
        @endif
        <div class="col-lg-12">
            @include('shared.form.text_input', [
                'slug' => 'employer',
                'label' => 'Employer',
                'value' => $record->employer ?? old('employer'),
                'errors' => $errors->get('employer')
            ])
        </div>
        <div class="col-lg-12">
            @include('shared.form.text_input', [
                'slug' => 'position',
                'label' => 'Position',
                'value' => $record->position ?? old('position'),
                'errors' => $errors->get('position')
            ])
        </div>
        <div class="col-lg-12">
            @include('shared.form.text_input', [
                'slug' => 'location',
                'label' => 'Location',
                'value' => $record->location ?? old('location'),
                'errors' => $errors->get('location')
            ])
        </div>
        <div class="col-lg-12">
            <div class="col-lg-6">
                @include('shared.form.month-picker_input', [
                    'slug' => 'start_date',
                    'label' => 'Start Date',
                    'value' => $record->start_date ?? old('start_date'),
                    'errors' => $errors->get('start_date'),
                ])
            </div>
            <div class="col-lg-6">
                @include('shared.form.month-picker_input', [
                    'slug' => 'end_date',
                    'label' => 'End Date',
                    'value' => $record->end_date ?? old('end_date'),
                    'errors' => $errors->get('end_date'),
                ])
            </div>
        </div>
        <div class="col-lg-12">
            @include('shared.form.text_area', [
                'slug' => 'bullets',
                'label' => 'Bullets',
                'value' => $record->bullets ?? old('bullets'),
                'errors' => $errors->get('bullets'),
            ])
        </div>
        <div class="col-lg-12">
            @include('shared.form.submit', ['label' => 'Submit'])
        </div>
    </form>
@endsection
