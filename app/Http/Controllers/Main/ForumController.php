<?php

namespace App\Http\Controllers\Main;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Forum;

class ForumController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $request->validate([
            'diskusi_id' => 'required',
            'komentar' => 'required|string|max:255'
        ]);
        
        Forum::create([
            'diskusi_id' => $request->diskusi_id,
            'nama_universitas' => 'as admin or operator',
            'nim'   => 'as admin or operator',
            'nama_mahasiswa'    => Auth::user()->nama,
            'email' => Auth::user()->email,
            'komentar' => $request->komentar
        ]);
        return back()->with('success', 'Komentar berhasil diposting');
    }
}
