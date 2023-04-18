<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TransaksiZISController extends Controller
{
    public function index()
    {
        return view('transaksi.formulir');
    }
}
