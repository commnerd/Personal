@extends('templates/page')

@section('title')
My Blog
@endSection

@section('main-nav')
<a href="#about" class="hover:text-blue-600">About</a>
<!--a href="#blog" class="hover:text-blue-600">Blog</a-->
<a href="/resume" class="hover:text-blue-600">Resume</a>
<!--a href="#contact" class="hover:text-blue-600">Contact</a-->
<a href="#connect" class="hover:text-blue-600">Connect</a>
@endsection

@section('hero')
<h2 class="text-4xl md:text-5xl font-bold mb-4">Welcome to my Blog!</h2>
<p class="text-xl mb-8">Please look around! I have a lot to say...</p>
<div class="space-x-4">
    <a href="#blog" class="bg-white text-blue-600 font-semibold px-6 py-3 rounded hover:bg-gray-100 transition">🧭 Explore Blog</a>
</div>
@endsection


@section('body')
<div class="flex flex-col">
    <h1 class="flex flex-row justify-center text-4xl font-extrabold tracking-tight text-gray-900 sm:text-5xl">My Blog</h1>
</div>
@endSection