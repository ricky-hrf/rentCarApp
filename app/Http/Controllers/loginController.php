<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class loginController extends Controller
{
    public function index()
    {
        return view('login.index');
    }

    public function proses(Request $request)
    {
        $credential = $request->validate(
            [
                'email' => 'required|email',
                'password' => 'required'
            ],
            [
                'email.required' => 'email tidak boleh kososng',
                'email.email' => 'format email tidak benar',
                'password' => 'masukkan password'
            ]
        );
        if (Auth::attempt($credential)) {
            $request->session()->regenerate();
            return redirect()->route('home');
        }
        return back()->withErrors([
            'email' => 'Autentikasi gagal!',
        ])->onlyInput('email');
    }

    public function keluar(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('home');
    }
}
