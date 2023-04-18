<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\Mosque;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index()
    {
        $adminZIS = User::all();
        return view('admins.index', ['adminZIS' => $adminZIS]);
    }

    public function create()
    {   
        $roles = Role::all();
        $mosques = Mosque::all();
        return view('admins.create', ['roles' => $roles], ['mosques' => $mosques]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:5',
            'id_role' => 'required',
            'id_mosque' => 'nullable',
            'address' => 'required',
            'no_telepon' => 'required'
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

        return redirect()->route('adminZIS');
    }

    public function edit($id)
    {
        $adminZIS = User::find($id);

        $roles = Role::all();
        $mosques = Mosque::all();

        return view('admins.edit', compact('adminZIS', 'roles', 'mosques'));
    }

    public function update(Request $request, $id)
    {
        // Validate the request
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
            'id_role' => 'required',
            'id_mosque' => 'nullable',
            'address' => 'required',
            'no_telepon' => 'required'
        ]);

        // Get the Admin ZIS by ID
        $adminZIS = User::find($id);

        // Update the Admin ZIS properties
        $adminZIS->name = $request->name;
        $adminZIS->email = $request->email;
        $adminZIS->id_role = $request->id_role;
        $adminZIS->id_mosque = $request->id_mosque;
        $adminZIS->address = $request->address;
        $adminZIS->no_telepon = $request->no_telepon;

        // Hash the password if it is provided
        if ($request->has('password')) {
            $adminZIS->password = Hash::make($request->password);
        }

        // Save the updated Admin ZIS
        $adminZIS->save();

        // Redirect back to the Admin ZIS list page
        return redirect()->route('adminZIS');
    }

    public function destroy($id)
    {
        User::find($id)->delete();
        return redirect()->route('adminZIS');
    }
}
