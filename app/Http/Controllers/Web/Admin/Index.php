<?php

namespace App\Http\Controllers\Web\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class Index extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(string $sub = ""): Response
    {
        $filePath = storage_path("app/admin-ui/".$sub);
        $contentType = "text/plain";

        if(preg_match('/\.(.*)$/', $sub, $matches)) {
            switch($matches[1]) {
                case 'js':
                    $contentType = 'text/javascript';
                    break;
                case 'css':
                    $contentType = 'text/css';
                    break;
                case 'ico':
                    $contentType = 'image/x-icon';
                    break;
                default:
                    $contentType = "text/plain";
                    break;
            }
        }

        if(!empty($sub) && file_exists($filePath)) {
            return response(file_get_contents($filePath))->header('Content-Type', $contentType);
        }
        return response()->view('admin.index');
    }
}
