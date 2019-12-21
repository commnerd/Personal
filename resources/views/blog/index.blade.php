@extends('layouts.main', ['slug' => 'blog', 'title' => sprintf('%s — %s', config('app.name'), __('canvas::blog.title'))])

@section('title', sprintf('%s — %s', config('app.name'), __('canvas::blog.title')))

@section('header')
    <div class="header-center-content">
        <h1>{{ setting('blog.title', "Blog") }}</h1>
        @if($data['topics']->isNotEmpty())
            <div class="center nav-scroller py-1 mb-2">
                <nav class="nav d-flex justify-content-between">
                    @foreach($data['topics'] as $topic)
                        <a class="p-2 text-muted" href="{{ route('blog.topic', $topic->slug) }}">{{ $topic->name }}</a>
                    @endforeach
                </nav>
            </div>
        @endif
        <div class="center nav-scroller py-1 mb-2">
            <nav class="nav d-flex justify-content-between">
                @foreach($data['tags'] as $tag)
                    <a class="p-2 text-muted" href="{{ route('blog.tag', $tag->slug) }}">{{ $tag->name }}</a>
                @endforeach
            </nav>
        </div>
  </div>
@endsection

@section('content')
        <main role="main">
            <div class="row">
                <div class="col-md-8 blog-main">
                    @if(count($data['posts']) > 0)
                        @foreach($data['posts'] as $post)
                            <div class="blog-post">
                                <h2 class="blog-post-title"><a href="{{ route('blog.post', $post->slug) }}" class="text-dark text-decoration-none">{{ $post->title }}</a></h2>
                                <p class="blog-post-meta small">Published {{ $post->published_at->format('M d') }} by {{ $post->author->name }} </p>
                                <p><a href="{{ route('blog.post', $post->slug) }}" class="text-dark text-decoration-none">{{ $post->summary }}</a></p>
                            </div>
                        @endforeach
                    @else
                        <p class="mt-4">No blog posts available.</p>
                    @endif
                </div>
            </div>
        </main>
    </div>
@endsection
