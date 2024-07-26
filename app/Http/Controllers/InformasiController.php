<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Information;
use App\Models\Comment;
class InformasiController extends Controller
{
    public function index($id)
    {
        $title = "Forum diskusi";
        $informasi = Information::find($id);
        $comments = Comment::where('informasi_id', $id)->get();
        return view('informasi.index', compact('title', 'informasi', 'comments'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'informasi_id' => 'required',
            'nama_universitas' => 'required|string|max:255',
            'nim'   => 'required|string|max:20',
            'nama_mahasiswa'    => 'required|string|max:100',
            'email' => 'required|string|max:100',
            'komentar' => 'required|string|max:255'
        ]);
        
        $data = $request->except('_token');
        $comment = Comment::create($data);
        return back()->with('msg_forum', 'Komentar berhasil diposting');
      
    }
}
