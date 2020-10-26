<?php

namespace App\Http\Controllers\Admin\Composer;

use Illuminate\Http\RedirectResponse;
use App\Models\ComposerPackageSource;
use App\Http\Controllers\Controller;
use App\Models\ComposerPackage;
use Illuminate\Http\Response;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  ComposerPackage  $repo
     * @return \Illuminate\Http\Response
     */
    public function show(ComposerPackage $package): Response
    {
        return response()->view('admin.composer.packages.show', compact('package'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(): Response
    {
        $title = 'Create a Composer Package';
        $package = new ComposerPackage();

        return response()->view('admin.composer.packages.create', compact('title', 'package'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate(ComposerPackage::getValidationRules());
        $input = $request->all();

        $package = ComposerPackage::create($input);
        ComposerPackageSource::create([
            'composer_package_id' => $package->id,
            'reference' => $input['source_reference'],
            'type' => $input['source_type'],
            'url' => $input['source_url'],
        ]);

        return redirect()->route('admin.manage.composer.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ComposerPackage $package
     * @return \Illuminate\Http\Response
     */
    public function edit(ComposerPackage $package): Response
    {
        return response()->view('admin.composer.packages.edit', compact('package'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ComposerPackage  $package
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, ComposerPackage $package): RedirectResponse
    {
        $request->validate(ComposerPackage::getValidationRules());

        $input = $request->all();
        $package->update($input);
        $package->source->update([
            'reference' => $input['source_reference'],
            'type' => $input['source_type'],
            'url' => $input['source_url'],
        ]);

        return redirect()->route('admin.manage.composer.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ComposerPackage  $package
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(ComposerPackage $package): RedirectResponse
    {
        $package->delete();

        return redirect()->route('admin.manage.composer.index');
    }
}
