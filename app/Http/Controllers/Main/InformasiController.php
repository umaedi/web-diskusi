<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Information;
use App\Models\Kategori;
use App\Models\Comment;
class InformasiController extends Controller
{
    public function index() {
        $data['title'] = "Informasi penelitian dan pendidikan";
        $data['informasi'] = Information::all();
        return view('main.informasi.index', $data);
    }

    public function create()
    {
        $data['kategori'] = Kategori::all();
        $data['title'] = 'Buat informasi diskusi';
        return view('main.informasi.create',$data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|max:255',
            'konten'    => 'required',
        ]);

        if($request->hasFile('img')) {
            $imgName = $request->file('img')->store('informasi', 'public');
        }else {
            $imgName = 'informasi/informasi.jpg';
        }

        Information::create([
            'user_id'   => Auth::user()->id,
            'kategori_id'  => $request->kategori_id,
            'judul' => $request->judul,
            'konten'    => $request->konten,
            'img'   => $imgName
        ]);

        return back()->with('succeess', 'Infromasi berhasil dibuat');
    }

    public function show($id)
    {
        $data['title'] = 'Detail informasi';
        $data['informasi'] = Information::find($id);
        $data['comments'] = Comment::where('informasi_id', $id)->get();
        return view('main.informasi.show', $data);
    }

    public function edit($id)
    {
        $data['title']  = "Edit informasi";
        $data['informasi'] = Information::find($id);
        $data['kategori'] = Kategori::all();
        return view('main.informasi.edit',$data);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required|max:255',
            'konten'    => 'required',
        ]);

        if($request->hasFile('img')) {
            $imgName = $request->file('img')->store('informasi', 'public');
        }

        $informasi = Information::find($id);
        $informasi->update([
            'user_id'   => Auth::user()->id,
            'kategori_id'  => $request->kategori_id ?? $informasi->kategori_id,
            'judul' => $request->judul,
            'konten'    => $request->konten,
            'img'   => $imgName ?? $informasi->img
        ]);

        return back()->with('succeess', 'Infromasi berhasil diupdate');
    }
    public function destroy($id)
    {
        $informasi = Information::find($id);
        $informasi->delete($id);
        return back()->with('success', 'Informasi berhasil dihapus');
    }
}
