@extends('admin.layouts.main', ['errors' => $errors])

@section('title', $title)

@section('content')
    <h1 class="center">{{ $title }}</h1>
    <form method="POST" class="form-horizontal" action="{{ $action }}">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        @if($method !== 'POST')
            <input type="hidden" name="_method" value="{{ $method }}">
        @endif
        @if(isset($package))
            <input type="hidden" name="repo_id" value="{{ $package->id }}" />
        @endif
        <div class="col-lg-12">
            @include('shared.form.text_input', [
                'slug' => 'name',
                'label' => 'Name',
                'value' => $package->name ?? old('name'),
                'errors' => $errors->get('name'),
            ])
        </div>
        <div class="col-lg-12">
            @include('shared.form.text_input', [
                'slug' => 'version',
                'label' => 'Version',
                'value' => $package->version ?? old('version'),
                'errors' => $errors->get('version')
            ])
        </div>
        <div class="col-lg-12">
            @include('shared.form.select_input', [
                'slug' => 'type',
                'label' => 'Type',
                'value' => $package->type ?? old('type'),
                'options' => \App\Models\ComposerPackage::TYPES,
                'errors' => $errors->get('type'),
            ])
        </div>
        <div class="col-lg-12">
            @include('shared.form.text_input', [
                'slug' => 'source_reference',
                'label' => 'Reference',
                'value' => $package->source->reference ?? old('source_reference'),
                'errors' => $errors->get('source_reference')
            ])
        </div>
        <div class="col-lg-12">
            @include('shared.form.select_input', [
                'slug' => 'source_type',
                'label' => 'Source Type',
                'value' => $package->source->type ?? old('source_type'),
                'options' => \App\Models\ComposerPackageSource::TYPES,
                'errors' => $errors->get('source_type'),
            ])
        </div>
        <div class="col-lg-12">
            @include('shared.form.text_input', [
                'slug' => 'source_url',
                'label' => 'URL',
                'value' => $package->source->url ?? old('source_url'),
                'errors' => $errors->get('source_url')
            ])
        </div>
        <div class="col-lg-12">
            @include('shared.form.submit', ['label' => 'Submit'])
        </div>
    </form>
@endsection