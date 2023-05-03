<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sedekah;
use App\Models\Mosque;
use PDF;

class SedekahController extends Controller
{
    public function index()
    {
        $sedekah = Sedekah::all();
        $totalSedekah = Sedekah::where('status', '=', 'Bayar')->sum('nominalSedekah');
        return view('sedekahs.index', ['sedekah' => $sedekah, 'totalSedekah' => $totalSedekah]);
    }
    
    public function create()
    {   
        $mosques = Mosque::all();
        return view('sedekahs.create', ['mosques' => $mosques]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_mosque' => 'required',
            'nama_donatur' => 'required',
            'phone' => 'required',
            'nominalSedekah' => 'required',
            'status' => 'required'
        ]);

        $data = $request->except('_token');

        Sedekah::create($data);
        

        return redirect()->route('sedekah');
    }

    public function edit($id)
    {
        $sedekah = Sedekah::find($id);
        $mosques = Mosque::all();

        return view('sedekahs.edit', compact('sedekah', 'mosques'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'id_mosque' => 'required',
            'nama_donatur' => 'required',
            'phone' => 'required',
            'nominalSedekah' => 'required',
            'status' => 'required'
        ]);

        $sedekah = Sedekah::find($id);

        $sedekah->id_mosque = $request->id_mosque;
        $sedekah->nama_donatur = $request->nama_donatur;
        $sedekah->phone = $request->phone;
        $sedekah->nominalSedekah = $request->nominalSedekah;
        $sedekah->status = $request->status;

        $sedekah->save();

        return redirect()->route('sedekah');
    }

    public function destroy($id)
    {
        Sedekah::find($id)->delete();
        return redirect()->route('sedekah');
    }

    public function generatePDF()
    {
        $sedekah = Sedekah::all();
        $data = [
            'title' => 'Laporan Sedekah',
            'date' => date('m/d/Y'),
            'sedekah' => $sedekah
        ];

        $pdf = PDF::loadView('sedekahs.generatePDF', $data);
        return $pdf->download('laporanSedekah.pdf');
    }
}
