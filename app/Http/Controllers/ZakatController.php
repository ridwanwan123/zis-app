<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ZakatController extends Controller
{
    public function index()
    {
        return view('zakats.zakat');
    }
}
