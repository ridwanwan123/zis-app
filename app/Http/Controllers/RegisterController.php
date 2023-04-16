<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\Mosque;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {   
        $roles = Role::all();
        $mosques = Mosque::all();
        return view('auth.register', ['roles' => $roles], ['mosques' => $mosques]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:5',
            'id_role' => 'required',
            'id_mosque' => 'nullable'
        ]);

        $data = $request->except('_token');

        $isEmailExist = User::where('email', $request->email)->exists();

        if ($isEmailExist) {
            return back()
                ->withErrors([
                    'email' => 'This email already exists'
                ])
                ->withInput();
        }

        $data['password'] = Hash::make($request->password);

        User::create($data);

        return redirect()->route('login');
    }

}
