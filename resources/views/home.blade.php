@extends('layouts.home', ['errors' => $errors])

@section('header')
<div class="header-center-content">
    <h1>{{ setting('site.greeting', "Welcome!") }}</h1>
    <div class="center font-script">{{ setting('site.description', "Look around to find out what I'm up to!") }}</div>
</div>
@endsection

@section('content')
    <div class="section image-tiles">
        @include('shared.section-header', ['label' => 'Family'])
        <img src="/storage/family-1.png">
        <img src="/storage/family-2.png">
        <img src="/storage/family-3.png">
        <img src="/storage/family-4.png">
    </div>

    @if($quote)
    <div class="section quote">
        @include('shared.section-header', ['label' => 'Quote'])
        <blockquote>
            <p>{!! $quote->quote !!}</p>
        </blockquote>
        <i>- {{ $quote->source }}</i>
    </div>
    @endif

    <div class="section social">
        @include('shared.section-header', ['label' => 'Social'])
        <div class="center">
            <a href="https://www.facebook.com/michaeljmiller79"><i style="color: #3097D1" class="fab fa-facebook fa-8x"></i></a>
            <a href="https://github.com/commnerd"><i style="color: gray;" class="fab fa-github fa-8x"></i></a>
            <a href="https://www.linkedin.com/in/michaeljmiller79/"><i style="color: #216a94" class="fab fa-linkedin fa-8x"></i></a>
        </div>
    </div>

    @if(\App\Models\Work\EmploymentRecord::count() > 0)
    <div class="section resume">
        @include('shared.section-header', ['label' => 'Resume'])
        <div class="center">
            <a class="btn btn-primary" href="{{ route('resume') }}"><i class="fas fa-file-alt fa-8x"></i>View</a>
            <a class="btn btn-primary" href="/storage/Resume.pdf"><i class="fas fa-download fa-8x"></i>Download</a>
        </div>
    </div>
    @endif

    <div class="section contact">
        @include('shared.section-header', ['label' => 'Contact'])
        <form id="contact" class="form-horizontal col-lg-12" method="POST" action="{{ route('contact.store') }}">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            @include('shared.form.text_input', [
                'label' => 'Name',
                'slug' => 'name',
                'value' => old('name'),
                'errors' => $errors->get('name')
            ])
            @include('shared.form.text_input', [
                'label' => 'Email/Phone',
                'slug' => 'email_phone',
                'value' => old('email_phone'),
                'errors' => $errors->get('email_phone')
            ])
            @include('shared.form.text_area', [
                'label' => 'Message',
                'slug' => 'message',
                'value' => old('message'),
                'errors' => $errors->get('message')
            ])
            <button
                class="btn btn-submit btn-primary g-recaptcha"
                data-sitekey="6LehkkYUAAAAAHFNjT-D6-NX1sCRjU0H9o4lQ0Cs"
                data-callback="recaptcha_callback_handler">
                Submit
            </button>
            @if(config('app.env') === 'production')
            <script async type="text/javascript">
                function recaptcha_callback_handler() {
                    var form = $("form#contact");
                    $('.quill-editor', form).each(function() {
                        var editor = this;
                        var content = $('.ql-editor', editor).html();
                        var name = $(editor).attr("data-name");
                        if($('.ql-editor', editor).text().trim() == "") {
                            content = "";
                        }
                        $(form).append('<textarea name="'+name+'" style="display:none">'+content+'</textarea>');
                   });
                   form.submit();
                }
            </script>
            @endif
        </form>
    </div>
@endsection
