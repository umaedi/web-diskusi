<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Information;
use App\Models\Diskusi;
class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $data['title'] = "Forum diskusi";
        $data['informasi'] = Information::all();
        // $data['diskusi'] = Diskusi::all();
        return view('home.index', $data);
    }
}
