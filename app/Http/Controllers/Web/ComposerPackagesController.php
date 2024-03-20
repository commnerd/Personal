<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Services\ComposerService;
use Illuminate\Http\JsonResponse;

class ComposerPackagesController extends Controller
{
    public function index(): JsonResponse
    {
        return response()->json(ComposerService::buildJsonStructure());
    }
}
