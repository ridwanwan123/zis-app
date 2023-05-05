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

    public function storeInfaq(Request $request)
    {
        $request->validate([
            'id_mosque' => 'required',
            'nama_donatur' => 'required',
            'phone' => 'required',
            'nominalInfaq' => 'required',
            'status' => 'required'
        ]);

        $data = $request->except('_token');

        Infaq::create($data);
        

        return redirect()->route('success');
    }
}
