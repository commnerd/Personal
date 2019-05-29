<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\RedirectResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use App\Models\Quote;

class QuotesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): Response
    {
        $quotes = Quote::paginate(self::PAGE_COUNT);

        return response()->view('admin.quotes.index', compact('quotes'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function activate(Request $request): RedirectResponse
    {
        Quote::where('active', true)->update(['active' => false]);

        Quote::findOrFail($request->activate)->update(['active' => true]);

        return redirect()->route('admin.quotes.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(): Response
    {
        return response()->view('admin.quotes.create', ['title' => 'Create Quote']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        if($request->active) {
            Quote::where('active', true)->firstOrFail()->update(['active' => false]);
        }
        $quote = Quote::create($request->all());

        return redirect()->route('admin.quotes.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Quote  $quote
     * @return \Illuminate\Http\Response
     */
    public function edit(Quote $quote): Response
    {
        return response()->view('admin.quotes.edit', compact('quote'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Quote  $quote
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Quote $quote): RedirectResponse
    {
        if($request->get('active')) {
            Quote::where('active', true)->firstOrFail()->update(['active' => false]);
        }

        $quote->update($request->all());

        return redirect()->route('admin.quotes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Quote  $quote
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Quote $quote): RedirectResponse
    {
        $quote->delete();

        return redirect(route('admin.quotes.index'));
    }
}
