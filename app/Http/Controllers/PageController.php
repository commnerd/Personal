<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
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
        return view('home', ['error' => $error]);
    }

    /**
     * Resume page logic
     *
     * @return View Display resume page
     */
    public function resume(): View {
        return view('resume');
    }
}
