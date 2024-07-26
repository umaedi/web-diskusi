<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login', [
            'title' => "Login dashboard"
        ]);
    }

    public function login(Request $request)
    {
        if(Auth::attempt(['email' => $request->email, 'password'=> $request->password])) {
            return redirect('/admin/dashboard');
          } else {
            return back()->with('error', 'Alamat Email atau Password Anda salah!.');
          }
    }
}
