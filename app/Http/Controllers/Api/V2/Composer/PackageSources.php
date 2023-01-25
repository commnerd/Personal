<?php

namespace App\Http\Controllers\Api\V2\Composer;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

use App\Models\Composer\PackageSource;

class PackageSources extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(): JsonResponse
    {
        return response()->json(PackageSource::paginate(self::PAGE_COUNT));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        return response()->json(PackageSource::factory()->create($request->all()));
    }

    /**
     * Display the specified resource.
     *
     * @param  PackageSource  $package_source
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(PackageSource $package_source): JsonResponse
    {
        return response()->json($package_source);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  PackageSource  $package_source
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, PackageSource $package_source): JsonResponse
    {
        $package_source->update($request->toArray());
        return response()->json($package_source);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  PackageSource  $package_source
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(PackageSource $package_source): JsonResponse
    {
        $package_source->delete();
        return response()->json($package_source);
    }
}
