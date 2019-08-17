<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\RedirectResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use App\Models\Drink;

class DrinksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): Response
    {
        $drinks = Drink::paginate(self::PAGE_COUNT);

        return response()->view('admin.drinks.index', compact('drinks'));
    }

    /**
     * Display the specified resource.
     *
     * @param  Drink  $drink
     * @return \Illuminate\Http\Response
     */
    public function show(Drink $drink): Response
    {
        return response()->view('admin.drinks.show', compact('drink'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(): Response
    {
        return response()->view('admin.drinks.create', ['title' => 'Create Drink']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate(Drink::getValidationRules());

        $drink = Drink::create($request->all());

        return redirect()->route('admin.drinks.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Drink  $drink
     * @return \Illuminate\Http\Response
     */
    public function edit(Drink $drink): Response
    {
        return response()->view('admin.drinks.edit', compact('drink'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Drink  $drink
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Drink $drink): RedirectResponse
    {
        $request->validate(Drink::getValidationRules());

        $drink->update($request->all());

        return redirect()->route('admin.drinks.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Drink  $drink
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Drink $drink): RedirectResponse
    {
        $drink->delete();

        return redirect(route('admin.drinks.index'));
    }
}
