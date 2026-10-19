@extends('templates/html')

@hasSection('main-nav')
<!-- Navbar -->
    <header class="sticky top-0 bg-white shadow z-50">
      <div class="max-w-7xl mx-auto px-4 py-4 flex justify-between items-center">
        <h1 class="text-2xl font-bold"><a href="/">Michael J. Miller</a></h1>
        <nav class="space-x-6 text-sm font-semibold">
          
        </nav>
      </div>
    </header>
@endif

@hasSection('hero')
<section class="bg-gradient-to-r from-blue-500 to-teal-400 text-white py-20 text-center">
    <div class="max-w-3xl mx-auto px-4">
        @yield('hero')
    </div>
</section>
@endif

@section('body')
tested
    

@endsection