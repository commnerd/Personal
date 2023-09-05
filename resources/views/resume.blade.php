@extends('templates.foundation')

@section('meta_description')
Insatiable Auto-Didact:
A dynamic and accomplished professional striving to learn as much as he can about the vast techology landscape.
Explore my versatile skill set, proven track record, and passion for excellence on my resume page.
Discover how I can bring value and innovation to your team.
Let's connect and create success together!
@endsection

@section('content')
<header>
    <a href="{{ config('app.url') }}/storage/resume.pdf">
        <i class="bi bi-cloud-download-fill"></i>
    </a>
</header>
@endsection