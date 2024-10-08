<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Diskusi;
use App\Models\Forum;
class ForumController extends Controller
{
    public function index($id)
    {
        $title = "Forum diskusi";
        $komentar = Forum::where('diskusi_id', $id)->get();
        $forum = Diskusi::find($id);
        $forum->increment('view');
        return view('forum.index', compact('title', 'komentar', 'forum'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'diskusi_id' => 'required',
            'nama_universitas' => 'required|string|max:255',
            'nim'   => 'required|string|max:20',
            'nama_mahasiswa'    => 'required|string|max:100',
            'email' => 'required|string|max:100',
            'komentar' => 'required|string|max:255'
        ]);
        
        $data = $request->except('_token');
        Forum::create($data);
        return back()->with('msg_forum', 'Komentar berhasil diposting');
    }
}
