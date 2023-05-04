<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mosque;

use App\Models\Infaq;


class TransaksiInfaqController extends Controller
{
    public function createInfaq()
    {   
        $mosques = Mosque::all();
        return view('transaksi.infaq', ['mosques' => $mosques]);
    }
}
