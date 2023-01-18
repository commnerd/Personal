<?php

namespace App\Http\Controllers\Api\V1;

use \App\Events\GithubEvent;
use Illuminate\Http\Request;

class GithubController extends Controller
{
    public function execute(Request $request) {
    	event(new GithubEvent($request->all()));
        return response()->json(['status' => 'Success']);
    }
}
