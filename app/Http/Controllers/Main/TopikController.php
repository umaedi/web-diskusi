<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Topic;

class TopikController extends Controller
{
    public function index() {
        $data['title'] = "Topik diskusi";
        return view('main.topik.index', $data);
    }

    public function create()
    {
        return view('main.forum.create', [
            'title' => 'Buat topik diskusi'
        ]);
    }

    public function store(Request $request)
    {
        dd($request->content);
        // $validate = $request->validate([
        //     'title'     => 'required|max:255',
        //     'content'   => 'required',
        //     'img'       => 'required|mimes:jpg,jpeg,png|max:2048'
        // ]);

        $img = $request->file('img')->store('informasi/img', 'public');
        Topic::create([
            'user_id'   => '1',
            'title'     => $request->title,
            'content'   => $request->content,
            'img'       => $img
        ]);
    }
}
