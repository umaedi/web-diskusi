<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Comment;

class KomentarController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $request->validate([
            'komentar' => 'required|string|max:255'
        ]);
        
        $comment = Comment::create([
            'informasi_id' => $request->informasi_id,
            'nama_universitas' => 'as admin or operator',
            'nim'   => 'as admin or operator',
            'nama_mahasiswa'    => Auth::user()->nama,
            'email' => 'as admin or operator',
            'komentar' => $request->komentar
        ]);
        return back()->with('success', 'Komentar berhasil diposting');
    }
}
