<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

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
        }  elseif ($request->input('role') == 'DKM') {
            $credentials['id_role'] = 2;
        }

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            flash()
                    ->options([
                        'timeout' => 3500, // 3 seconds
                        'position' => 'bottom-right',
                    ])
                    ->addSuccess('Login Berhasill, Selamat Datang!!');
                return redirect()->route('dashboard');
            // if(Auth::user()->id_role == 2) {
            //     untuk muzaki akan di route ke halama pembayaran dan formulir, untuk sementara di redirect ke halaman formulir
            //     return redirect()->route('formulir');
            // } else {
            //     flash()
            //         ->options([
            //             'timeout' => 3500, // 3 seconds
            //             'position' => 'bottom-right',
            //         ])
            //         ->addSuccess('Login Berhasill, Selamat Datang!!');
            //     return redirect()->route('dashboard');
            // }
        }


        return back()->withErrors([
            'email' => 'Your email is wrong.',
        ])->withInput();
    }

    public function password()
    {
        return view('auth.changePassword');
    }

    public function changePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:5|different:current_password'
            // 'new_password_confirmation' => 'required|same:new_password'
        ]);

        $user = Auth::user();

        if (Hash::check($request->current_password, $user->password)) {
            $user->password = Hash::make($request->new_password);
            $user->save();

            flash()
            ->options([
                'timeout' => 3500, // 3 seconds
                'position' => 'bottom-right',
            ])
            ->addSuccess('Password berhasil diubah!!');
            return redirect()->back();
        } else {
            flash()
            ->options([
                'timeout' => 3500, // 3 seconds
                'position' => 'bottom-right',
            ])
            ->addError('Password gagal diubah!!');
            return redirect()->back();
        }
    }

    public function logout(Request $request)
    {
        
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        flash()
            ->options([
                'timeout' => 3000, // 3 seconds
                'position' => 'bottom-right',
            ])
            ->addSuccess('Anda berhasil Logout, Terimakasih!!');
        return redirect()->route('login');
    }
}
