<?php

namespace App\Http\Controllers\Api\Blog;

use App\Http\Controllers\Api\Controller;
use App\Models\Blog\Post;
use Illuminate\Http\{JsonResponse, Request};
use Auth;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        return response()->json(Post::paginate(self::PAGE_SIZE));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): JsonResponse
    {
        $request->validate(Post::getValidationRules());

        $submission = array_merge($request->all(), ['created_by' => Auth::user()->id]);

        $package = Post::create($submission);

        return response()->json($package);
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post): JsonResponse
    {
        return response()->json($post);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post): JsonResponse
    {
        $request->validate(Post::getValidationRules());

        $post->update($request->all());

        return response()->json($post);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();
    }
}
