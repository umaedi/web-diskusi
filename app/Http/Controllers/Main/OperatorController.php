<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class OperatorController extends Controller
{
    public function index()
    {
        $data['title'] = "Admin operator";
        $data['users'] = User::all();
        return view('main.operator.index', $data);
    }

    public function create()
    {
        $data['title'] = "Tambah Operator";
        return view('main.operator.create', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama'  => 'required',
            'email' => 'required|unique:users',
            'no_tlp'    => 'required',
            'role'  => 'required',
            'password'  => 'required',
        ]);

        $password = Hash::make($request->password);

        User::create([
            'nama'  => $request->nama,
            'nip'  => $request->no_tlp,
            'email' => $request->email,
            'no_tlp'    => $request->no_tlp,
            'role'  => $request->role,
            'password'  => $password,
        ]);

        return \redirect('/admin/operator')->with('success', 'Operator berhasil disimpan');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama'  => 'required',
            'email' => 'required|email|unique:users,email,' . $request->id,
            'no_tlp'    => 'required',
            'role'  => 'required',
        ]);

        if($request->password) {
            $password = Hash::make($request->password);
        }
        $user = User::find($id);
        $user->update([
            'nama'  => $request->nama,
            'nip'  => $request->no_tlp,
            'email' => $request->email,
            'no_tlp'    => $request->no_tlp,
            'role'  => $request->role,
            'password'  => $password ?? $user->password,
        ]);

        return \redirect('/admin/operator')->with('success', 'Operator berhasil diupadate');
    }

    public function destroy($id)
    {
        if($id == Auth::user()->id) {
            return back()->with('success', 'Anda tidak dapat mengahpus Anda sendiri');
        }
        $user = User::find($id);
        $user->delete();
        return back()->with('success', 'Data user berhasil dihapus!');
    }
}
