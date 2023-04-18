<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function authenticate(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $credentials = $request->only('email','password');

        if ($request->input('role') == 'Admin') {
            $credentials['id_role'] = 1;
        } elseif ($request->input('role') == 'Muzaki') {
            $credentials['id_role'] = 2;
        } elseif ($request->input('role') == 'DKM') {
            $credentials['id_role'] = 3;
        }

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            if(Auth::user()->id_role == 2) {
                //untuk muzaki akan di route ke halama pembayaran dan formulir, untuk sementara di redirect ke halaman formulir
                return redirect()->route('formulir');
            } else {
                return redirect()->route('dashboard');
            }
        }


        return back()->withErrors([
            'email' => 'Your email is wrong.',
        ])->withInput();
    }

    public function logout(Request $request)
    {
        
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
