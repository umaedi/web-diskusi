<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Diskusi;
use App\Models\Forum;

class DiskusiController extends Controller
{
    public function index()
    {
        $title = "Topik diskusi";
        $comments = Comment::where('topic_id', 1)->get();
        return view('diskusi.index', compact('title', 'comments'));
    }

    public function edit($id)
    {
        $data['title'] = "Edit topik diskusi";
        $data['diskusi'] = Diskusi::find($id);
        return view('diskusi.edit', $data);
    }
    public function store(Request $request)
    {
        $request->validate([
            'nama_universitas' => 'required|string|max:255',
            'nim'   => 'required|string|max:20',
            'nama_mahasiswa'    => 'required|string|max:100',
            'email' => 'required|string|max:100',
            'judul' => 'required|string|max:255',
            'konten' => 'required|string|max:255',
            'img'   => 'file|mimes:jpg,jpeg,png|max:2048'
        ]);
        
        if($request->hasFile('img')) {
            $imgName = $request->file('img')->store('forum', 'public');
        }else {
            $imgName = "forum/forum.jpg";
        }

        $data = $request->except('_token');
        $randomNumber = rand(100000, 999999);
        $data['id_forum'] = $randomNumber;
        $data['img'] = $imgName;

        Diskusi::create($data);
        return back()->with('msg_forum', 'Pertanyaan berhasil diposting. ID-FORUM: ' . $randomNumber);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'id_forum'  => 'required|max:6',
            'nama_universitas' => 'required|string|max:255',
            'nim'   => 'required|string|max:20',
            'nama_mahasiswa'    => 'required|string|max:100',
            'email' => 'required|string|max:100',
            'judul' => 'required|string|max:255',
            'konten' => 'required|string|max:255',
        ]);

        $diskusi = Diskusi::find($id);
        if($diskusi->id_forum !== $request->id_forum) {
            return back()->with('error', 'ID Diskusi tidak terdaftar!');
        }

        if($request->hasFile('img')) {
            $imgName = $request->file('img')->store('forum', 'public');
        }else {
            $imgName = $diskusi->img;
        }

        $data = $request->except('_token');
        $data['img'] = $imgName;
        $diskusi->update($data);
        return back()->with('success', 'Topik diskusi berhasil di update');
    }

    public function destroy(Request $request,$id)
    {
        $diskusi = Diskusi::find($id);
        if($diskusi->id_forum !== $request->id_forum) {
            return back()->with('error', 'ID Diskusi tidak terdaftar!');
        }
        $diskusi->delete($id);
        return redirect('/')->with("success", "Topik diskusi berhasil dihapus!");
    }
}
