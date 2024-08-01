<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index()
    {
        // $data['kategori'] = Kategori::all();
        return view('main.kategori.index');
    }
}
