<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\RedirectResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use App\Models\ComposerRepo;

class ComposerRepoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): Response
    {
        $composer_repos = ComposerRepo::paginate(self::PAGE_COUNT);

        return response()->view('admin.composer_repos.index', compact('composer_repos'));
    }

    /**
     * Display the specified resource.
     *
     * @param  ComposerRepo  $repo
     * @return \Illuminate\Http\Response
     */
    public function show(ComposerRepo $composer_repo): Response
    {
        return response()->view('admin.composer_repos.show', compact('composer_repo'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(): Response
    {
        $title = 'Create a Composer Repo';
        $composer_repo = new ComposerRepo();

        return response()->view('admin.composer_repos.create', compact('title', 'composer_repo'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate(ComposerRepo::getValidationRules());

        $repo = ComposerRepo::create($request->all());

        return redirect()->route('admin.manage.composer_repos.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ComposerRepo  $repo
     * @return \Illuminate\Http\Response
     */
    public function edit(ComposerRepo $composer_repo): Response
    {
        return response()->view('admin.composer_repos.edit', compact('composer_repo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ComposerRepo  $repo
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, ComposerRepo $composer_repo): RedirectResponse
    {
        $request->validate(ComposerRepo::getValidationRules());

        $composer_repo->update($request->all());

        return redirect()->route('admin.manage.composer_repos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ComposerRepo  $repo
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(ComposerRepo $composer_repo): RedirectResponse
    {
        $composer_repo->delete();

        return redirect()->route('admin.manage.composer_repos.index');
    }
}
