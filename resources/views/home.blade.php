@extends('layouts.home')

@section('header')
<div class="center font-script nav-buffer">Welcome to my website! This site is intended to summarize my life.</div>
<h1>Who I am and <br />what I do</h1>
@endsection

@section('content')
        <div class="section intro">
            @include('partials.section-header', ['label' => 'Hello'])
            <p>
                Currently, there is not much here.<br />
                This is an extreme improvement over what was here.<br />
                Please come back and view my updates.
            </p>
        </div>

        <div class="section image-tiles">
            @include('partials.section-header', ['label' => 'Family'])
            <img src="/storage/family-1.png">
            <img src="/storage/family-2.png">
            <img src="/storage/family-3.png">
            <img src="/storage/family-4.png">
        </div>
    </section>

@endsection
