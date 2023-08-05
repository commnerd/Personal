<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Work\EmploymentRecord;
use Illuminate\Http\{Response,Request};
use Illuminate\Support\Facades\Cache;
use Carbon\Carbon;
use Socialite;

class ResumeController extends Controller
{
    public function index(): Response
    {
        return response()->view('resume', [ 'records' => EmploymentRecord::all() ]);
    }
}
