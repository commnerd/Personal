<?php

namespace App\Http\Controllers\Api\Composer;

use App\Http\Controllers\Api\Controller;
use App\Models\Composer\PackageSource;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PackageSourcesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(): JsonResponse
    {
        return response()->json(PackageSource::paginate(self::PAGE_SIZE));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): JsonResponse
    {
        $request->validate(PackageSource::getValidationRules());

        $source = PackageSource::create($request->all());

        return response()->json($source);
    }

    /**
     * Display the specified resource.
     */
    public function show(PackageSource $package_source): JsonResponse
    {
        return response()->json($package_source);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PackageSource $package_source): JsonResponse
    {
        $request->validate(PackageSource::getValidationRules());

        $package_source->update($request->all());

        return response()->json($package_source);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PackageSource $package_source)
    {
        $package_source->delete();
    }
}
