@extends('layouts.home')

@section('header')
<h1 class="nav-buffer">Welcome!</h1>
<div class="center font-script">Look around to find out what I'm up to!</div>
@endsection

@section('content')
    <div class="section image-tiles">
        @include('shared.section-header', ['label' => 'Family'])
        <img src="/storage/family-1.png">
        <img src="/storage/family-2.png">
        <img src="/storage/family-3.png">
        <img src="/storage/family-4.png">
    </div>

    <div class="section quote">
        @include('shared.section-header', ['label' => 'Quote'])
        <blockquote>
            <p>
                There is a computer disease that anybody who works with computers knows about.<br />
                It's a very serious disease and it interferes completely with the work.<br />
                The trouble with computers is that you 'play' with them!
            </p>
        </blockquote>
        <i>- Richard P. Feynman</i>
    </div>

    <div class="section social">
        @include('shared.section-header', ['label' => 'Social'])
        <div class="center">
            <a href="https://www.facebook.com/michaeljmiller79"><i style="color: #3097D1" class="fab fa-facebook fa-8x"></i></a>
            <a href="https://github.com/commnerd"><i style="color: gray;" class="fab fa-github fa-8x"></i></a>
            <a href="https://www.linkedin.com/in/michaeljmiller79/"><i style="color: #216a94" class="fab fa-linkedin fa-8x"></i></a>
        </div>
    </div>

    @if(\App\Work\EmploymentRecord::count() > 0)
    <div class="section resume">
        @include('shared.section-header', ['label' => 'Resume'])
        <div class="center">
            <a class="btn btn-primary" href="{{ route('resume') }}"><i class="fas fa-file-alt fa-8x"></i>View</a>
            <a class="btn btn-primary" href="/storage/Resume.pdf"><i class="fas fa-download fa-8x"></i>Download</a>
        </div>
    </div>
    @endif
@endsection
