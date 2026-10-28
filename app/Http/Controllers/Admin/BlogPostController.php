<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog\{Post, Tag, PostTag};
use Inertia\{Inertia, Response};
use App\Http\Requests\{StorePostRequest, UpdatePostRequest};
use Illuminate\Support\Facades\DB;

class BlogPostController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        return Inertia::render('Admin/Blog/Index', [
            'posts' => Post::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Admin/Blog/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        $rqAry = $request->toArray();
        $rqAry['user_id'] = auth()->user()->id;

        $storedTags = Tag::whereIn('title', $request->tags);
        $unstoredTags = $request->tags->map(fn($tag) => $tag->title);

        dd($unstoredTags);

        
        DB::transaction(function() use ($request, $rqAry, $tags) {
            $post = Post::create($rqAry);

            foreach($tags as $tag) {
                PostTag::create([
                    'post_id' => $post->id,
                    'tag_id' => $tag->id,
                ]);
            }
        });
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return Inertia::render('Admin/Blog/Show', [
            'post' => $post,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return Inertia::render('Admin/Blog/Update', [
            'post' => $post,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        $ary = $request->toArray();
        $ary['user_id'] = auth()->user()->id;
        $post->update($ary);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();
    }
}
