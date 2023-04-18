<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
    public function index()
    {
        $adminZIS = User::all();
        return view('admins.index', ['adminZIS' => $adminZIS]);
    }
}
