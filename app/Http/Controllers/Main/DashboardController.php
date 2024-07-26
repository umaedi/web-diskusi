<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Information;
use App\Models\Diskusi;
class DashboardController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $data['title'] = "Dahsboard Forum Diskusi";
        $data['informasi'] = Information::all();
        $data['diskusi'] = Diskusi::all();
        return view('main.dashboard.index', $data);
    }
}
