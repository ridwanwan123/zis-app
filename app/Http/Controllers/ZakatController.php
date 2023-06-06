<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Zakat;
use App\Models\Mosque;

class ZakatController extends Controller
{
    public function index()
    {
        $zakat = Zakat::all();
        $totalZakat = Zakat::where('status', '=', 'Bayar')->sum('nominal');
        
        return view('zakats.index', ['zakat' => $zakat, 'totalZakat' => $totalZakat]);
    }

     public function create()
    {   
        $mosques = Mosque::all();
        return view('zakats.create', ['mosques' => $mosques]);
    }

    public function store(Request $request) 
    {
        $request->validate([
            'id_mosque' => 'required',
            'jenis_zakat' => 'required',
            'nama_donatur' => 'required',
            'phone' => 'required',
            'nominal' => 'required',
            'status' => 'required'
        ]);

        $data = $request->except('_token');

        Zakat::create($data);
        
        flash()
            ->options([
                'timeout' => 3000, // 3 seconds
                'position' => 'bottom-right',
            ])
            ->addSuccess('Data Zakat berhasil ditambahkan!!');
        return redirect()->route('zakat');
    }

    public function edit($id)
    {
        $zakat = Zakat::find($id);
        $mosques = Mosque::all();

        return view('zakats.edit', compact('zakat', 'mosques'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'id_mosque' => 'required',
            'jenis_zakat' => 'required',
            'nama_donatur' => 'required',
            'phone' => 'required',
            'nominal' => 'required',
            'status' => 'required'
        ]);

        $zakat = Zakat::find($id);

        $zakat->id_mosque = $request->id_mosque;
        $zakat->jenis_zakat = $request->jenis_zakat;
        $zakat->nama_donatur = $request->nama_donatur;
        $zakat->phone = $request->phone;
        $zakat->nominal = $request->nominal;
        $zakat->status = $request->status;

        $zakat->save();

        flash()
            ->options([
                'timeout' => 3000, // 3 seconds
                'position' => 'bottom-right',
            ])
            ->addSuccess('Data Zakat berhasil diperbarui!!');
        return redirect()->route('zakat');
    }

    public function destroy($id)
    {
       Zakat::find($id)->delete();
        flash()
            ->options([
                'timeout' => 3000, // 3 seconds
                'position' => 'bottom-right',
            ])
            ->addSuccess('Data Zakat berhasil dihapus !!');
        return redirect()->route('zakat');
    }
}
