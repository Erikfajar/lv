<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        return view('auth.login');
    }

    public function authentication(Request $request)
    {
        $validasi = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8'
        ],[
            'email.required' => 'Email harus di isi',
            'password.required' => 'Password harus di isi',
        ]);

        $simpanPw = $request->input('password');
        $request->session()->put('simpanPw', $simpanPw);

        if (Auth::attempt($validasi)) {
            $request->session()->regenerate();
            return redirect()->route('dashboard')->with('success','Berhasil Login');
        }

        return back()->with('failed','Gagal Login');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login')->with('success','Berhasil Logout!!');
    }
}
