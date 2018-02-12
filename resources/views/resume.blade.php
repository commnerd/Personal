@extends('layouts.main', ['title' => 'Resume', 'slug' => 'resume'])

@section('title', 'Resume')

@section('header')
<div class="header-content center">
    <a class="btn btn-default" href="/storage/Resume.pdf"><i class="fas fa-download fa-4x"></i><br />Download</a>
</div>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-4">
        <h1>Work Experience</h1>
    </div>
    <div class="col-lg-8">
        @foreach(\App\Work\EmploymentRecord::all()->sortByDesc('sortDate') as $record)
            @include('shared.employment-record', $record->toArray())
        @endforeach
    </div>
</div>
<hr>
<div class="row">
    <div class="col-lg-4">
        <h1>Education</h1>
    </div>
    <div class="col-lg-8">
        <div class="container-fluid">
            <div class="col-lg-12 bold">
                Bachelor of Science, Computer Science
            </div>
            <div class="col-lg-12">
                Corvallis, Oregon | 2003 - 2008
            </div>
            <div class="col-lg-12">
                * Graduated with a 3.0 GPA<br />
                * Senior Capstone ­ Developed a web­based visual web development toolkit using PHP, JavaScript/AJAX, MySQL, and Apache
            </div>
        </div>
    </div>
</div>
@endsection
