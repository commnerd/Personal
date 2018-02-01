@extends('layouts.home')

@section('header')
<div class="center font-script nav-buffer">Welcome to my website! This site is intended to summarize my life.</div>
<h1>Who I am and <br />what I do</h1>
@endsection

@section('content')
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

        <div class="section resume">
            @include('shared.section-header', ['label' => 'Resume'])
            <div class="header-img center">&nbsp;</div>
            <div class="body center">
                <a class="btn btn-primary" href="/storage/resume.pdf">Download</a>
            </div>
        </div>

        <div class="section image-tiles">
            @include('shared.section-header', ['label' => 'Family'])
            <img src="/storage/family-1.png">
            <img src="/storage/family-2.png">
            <img src="/storage/family-3.png">
            <img src="/storage/family-4.png">
        </div>
@endsection
