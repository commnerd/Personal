@extends('admin.layouts.main', ['errors' => $errors])

@section('title', $title)

@section('content')
    <h1 class="center">{{ $title }}</h1>
    <form method="POST" class="form-horizontal" action="{{ $action }}">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        @if($method !== 'POST')
            <input type="hidden" name="_method" value="{{ $method }}">
        @endif
        @if(isset($composer_repo))
            <input type="hidden" name="repo_id" value="{{ $composer_repo->id }}" />
        @endif
        <div class="col-lg-12">
            @include('shared.form.select_input', [
                'slug' => 'type',
                'label' => 'Type',
                'value' => $composer_repo->type ?? old('type'),
                'options' => $composer_repo::TYPES,
                'errors' => $errors->get('type'),
            ])
        </div>
        <div class="col-lg-12">
            @include('shared.form.text_input', [
                'slug' => 'url',
                'label' => 'Repo',
                'value' => $composer_repo->url ?? old('url'),
                'errors' => $errors->get('url')
            ])
        </div>
        <div class="col-lg-12">
            @include('shared.form.submit', ['label' => 'Submit'])
        </div>
    </form>
@endsection
