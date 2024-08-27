<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Diskusi;
use App\Models\Forum;
use App\Models\Comment;
class DiskusiController extends Controller
{
    public function index()
    {
        $data['title'] = "Forum diskusi";
        $data['diskusi'] = Diskusi::all();
        return view('main.diskusi.index', $data);
    }

    public function show($id)
    {
        $data['title'] = "Detail forum diskusi";
        $data['diskusi'] = Diskusi::find($id);
        $data['forums'] = Forum::where('diskusi_id', $id)->get();
        return view('main.diskusi.show', $data);
    }

    public function destroy($id)
    {
        $diskusi = Diskusi::find($id);
        $diskusi->delete($id);
        return back()->with('success', 'Topik diskusi berhasil dihapus!');
    }

    public function delkomentar($id)
    {
        $diskusi = Comment::find($id);
        $diskusi->delete($id);
        return back()->with('success', 'Komentar diskusi berhasil dihapus!');
    }
}
