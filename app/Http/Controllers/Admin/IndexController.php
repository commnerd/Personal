<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog\{Post, Tag};
use Inertia\{Inertia, Response};

class IndexController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        return Inertia::render('Admin/Index', [
            'post_count' => Post::count(),
            'tag_count' => Tag::count(),
        ]);
    }
}
