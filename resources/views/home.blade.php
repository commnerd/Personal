@extends('layouts.home')

@section('header')
<div class="center font-script nav-buffer">Welcome to my website! This site is intended to summarize my life.</div>
<h1>Who I am and <br />what I do</h1>
@endsection

@section('content')
    @include('partials.section-header', ['label' => 'Family'])
    <div class="image-tiles">
        <img src="/storage/family-1.png">
        <img src="/storage/family-2.png">
    </div>
@endsection
