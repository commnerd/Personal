<?php

namespace App\Http\Controllers\Admin\Composer;

use App\Http\Controllers\Controller;
use App\Models\ComposerPackage;
use Illuminate\Http\Response;

class MainController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): Response
    {
        $packages = ComposerPackage::paginate(self::PAGE_COUNT);

        return response()->view('admin.composer.index', compact('packages'));
    }
}
