<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Information;
use App\Models\Diskusi;

class CariController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $data['title'] = "Cari informasi dan diskusi";
        $data['informasi'] = Information::where('judul', 'like', '%' . $request->q . '%')->get();
        $data['diskusi'] = Diskusi::where('judul', 'like', '%' . $request->q . '%')->get();
        return view('main.pencarian.index', $data);
    }
}
