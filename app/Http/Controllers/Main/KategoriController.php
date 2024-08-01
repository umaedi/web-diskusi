<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Kategori;
class KategoriController extends Controller
{
    public function index()
    {
        $data['kategori'] = Kategori::all();
        return view('main.kategori.index', $data);
    }

    public function create()
    {
        $data['title'] = "Buat kategori baru";
        return view('main.kategori.create', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_kategori' => 'required'
        ]);

        Kategori::create([
            'nama_kategori' => $request->nama_kategori,
            'slug'  => Str::slug($request->nama_kategori)
        ]);

        return redirect('/admin/kategori')->with('success', 'Kategori berhasil dibuat');
    }

    public function show($id)
    {
        $data['title']   = "Detail kategori";
        $data['kategori'] = Kategori::find($id);
        return view('main.kategori.show', $data);
    }

    public function update(Request $request,$id)
    {
        $kategori = Kategori::find($id);
        $kategori->update([
            'nama_kategori' => $request->nama_kategori,
            'slug'  => Str::slug($request->nama_kategori)
        ]);
        return redirect('/admin/kategori')->with('success', "Kategori berhasil diupdate!");
    }

    public function delete($id)
    {
        $kategori = Kategori::find($id);
        $kategori->delete($id);
        return back()->with('success', "Kategori berhasil dihapus!");
    }
}
