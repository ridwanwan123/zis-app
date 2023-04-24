<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Infaq;
use App\Models\User;

class InfaqController extends Controller
{
    public function index()
    {
        // $user = User::all();
        $infaq = Infaq::all();
        return view('infaqs.index', ['infaq' => $infaq]);
    }

    public function create()
    {   
        $user = User::all();
        return view('infaqs.create', ['user' => $user]);
    }
}
