@extends('layouts.main', ['title' => 'Portfolio', 'slug' => 'portfolio'])

@section('content')
    <div class="section container-fluid">
        @include('partials.section-header', ['label' => 'Quote'])
        <iframe src="http://localhost:8000/"></iframe>
        <p class="col-md-6">
            Summary 1
        </p>
    </div>
    <div class="section">
        @include('partials.section-header', ['label' => 'Quote'])
        <iframe src="http://localhost:8000/"></iframe>
        <p class="col-md-6">
            Summary 2
        </p>
    </div>
@endsection
