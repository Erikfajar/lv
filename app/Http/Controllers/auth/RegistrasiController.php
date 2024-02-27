<?php

namespace App\Http\Controllers\auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegistrasiController extends Controller
{
    public function registrasi()
    {
        return view('auth.registrasi');
    }

    public function registrasi_save(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8',
            'nama_lengkap' => 'required',
        ],[
            'username.required' => 'Username tidak boleh kosong',
            'email.required' => 'Email tidak boleh kosong',
            'password.required' => 'Password tidak boleh kosong',
            'password.min' => 'Password minimal 8 karakter',
            'nama_lengkap.required' => 'Nama Lengkap tidak boleh kosong',
        ]);

        if(Auth::check()){
            $role = $request->input('role');
        }else{
            $role = 'petugas';
        }

        $data = [
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'nama_lengkap' => $request->nama_lengkap,
            'remember_token' => $request->_token,
            'role' => $role
        ];
        // dd($data);
        User::create($data);
        return redirect()->route('login')->with('success','Registrasi berhasil');
    }
}
