<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Infaq;
use App\Models\Mosque;
use PDF;

class InfaqController extends Controller
{
    public function index()
    {
        $infaq = Infaq::all();
        $totalInfaq = Infaq::where('status', '=', 'Bayar')->sum('nominal');
        
        return view('infaqs.index', ['infaq' => $infaq, 'totalInfaq' => $totalInfaq]);
         
    }
    
    // public function getTotalInfaq($id_mosque = null)
    // {
    //     $infaq = Infaq::where('status', 'Bayar');

    //     if ($id_mosque) {
    //         $infaq->where('id_mosque', $id_mosque);
    //     }

    //     return $infaq->sum('nominal');
    // }


    public function create()
    {   
        $mosques = Mosque::all();
        return view('infaqs.create', ['mosques' => $mosques]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_mosque' => 'required',
            'nama_donatur' => 'required',
            'phone' => 'required',
            'nominal' => 'required',
            'status' => 'required'
        ]);

        $data = $request->except('_token');

        Infaq::create($data);
        
        flash()
            ->options([
                'timeout' => 3000, // 3 seconds
                'position' => 'bottom-right',
            ])
            ->addSuccess('Data Infaq berhasil ditambahkan!!');
        return redirect()->route('infaq');
    }

    public function edit($id)
    {
        $infaq = Infaq::find($id);
        $mosques = Mosque::all();

        return view('infaqs.edit', compact('infaq', 'mosques'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'id_mosque' => 'required',
            'nama_donatur' => 'required',
            'phone' => 'required',
            'nominal' => 'required',
            'status' => 'required'
        ]);

        $infaq = Infaq::find($id);

        $infaq->id_mosque = $request->id_mosque;
        $infaq->nama_donatur = $request->nama_donatur;
        $infaq->phone = $request->phone;
        $infaq->nominal = $request->nominal;
        $infaq->status = $request->status;

        $infaq->save();

        flash()
            ->options([
                'timeout' => 3000, // 3 seconds
                'position' => 'bottom-right',
            ])
            ->addSuccess('Data Infaq berhasil diperbarui!!');
        return redirect()->route('infaq');
        
    }

    public function destroy($id)
    {
        Infaq::find($id)->delete();
        flash()
            ->options([
                'timeout' => 3000, // 3 seconds
                'position' => 'bottom-right',
            ])
            ->addSuccess('Data Infaq berhasil dihapus !!');
        return redirect()->route('infaq');
    }

    public function generatePDF()
    {
        $infaq = Infaq::all();
        $data = [
            'title' => 'Laporan Infaq',
            'date' => date('m/d/Y'),
            'infaq' => $infaq
        ];

        $pdf = PDF::loadView('infaqs.generatePDF', $data);
        return $pdf->download('laporanInfaq.pdf');
    }
}
