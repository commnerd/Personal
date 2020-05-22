<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Work\PortfolioEntry;
use Illuminate\View\View;
use App\Models\Quote;
use Session;

class PageController extends Controller
{
    /**
     * Home page logic
     *
     * @return View Display home page
     */
    public function home(Request $request): View {
        $error = null;
        if(Session::get('errors')) {
            $error = 'Your form submission was invalid.';
        }

        $quote = Quote::where("active", true)
            ->orderBy("created_at", "DESC")
            ->first();

        return view('home', compact('quote', 'error'));
    }

    /**
     * Resume page logic
     *
     * @return View Display resume page
     */
    public function resume(): View {
        return view('resume');
    }

    /**
     * Resume page logic
     *
     * @return View Display resume page
     */
    public function portfolio(): View {
        $entries = PortfolioEntry::paginate(self::PAGE_COUNT);

        return view('portfolio', compact('entries'));
    }

    /**
     * Quotes page logic
     *
     * @return View Display resume page
     */
    public function quotes(): View {
        $quotes = Quote::orderBy("created_at", "DESC")->paginate(self::PAGE_COUNT);

        return view('quotes', compact('quotes'));
    }
}
