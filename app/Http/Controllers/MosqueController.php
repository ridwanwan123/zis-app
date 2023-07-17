<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mosque;
use App\Models\Zakat;
use App\Models\Infaq;
use App\Models\Sedekah;

class MosqueController extends Controller
{
    public function index()
    {
        $mosque = Mosque::all();
        return view('mosques.index', ['mosque' => $mosque]);
    }

    public function create()
    {
        return view('mosques.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name_mosque' => 'required',
            'address_mosque' => 'required'
        ]);

        $data = $request->except('_token');

        Mosque::create($data);
        flash()
            ->options([
                'timeout' => 3000, // 3 seconds
                'position' => 'bottom-right',
            ])
            ->addSuccess('Data Masjid berhasil ditambahkan!!');
        return redirect()->route('mosque');
    }

    public function edit($id)
    {
        $mosque = Mosque::find($id);

        return view('mosques.edit', compact('mosque'));
    }
    
    public function update(Request $request, $id)
    {
        $request->validate([
            'name_mosque' => 'required',
            'address_mosque' => 'required'
        ]);

        // Get the Mosque by ID
        $mosque = Mosque::find($id);

        // Update the Mosque properties
        $mosque->name_mosque = $request->name_mosque;
        $mosque->address_mosque = $request->address_mosque;

        $mosque->save();
        flash()
            ->options([
                'timeout' => 3000, // 3 seconds
                'position' => 'bottom-right',
            ])
            ->addSuccess('Data Masjid berhasil diperbarui!!');
        // Redirect back to the mosque list page
        return redirect()->route('mosque');
    }
    
    public function destroy()
    {
        //
    }

    // public function updateTotalDana($mosqueId)
    // {
    //     $mosque = Mosque::find($mosqueId);

    //     // Hitung total zakat
    //     $totalZakat = Zakat::where('id_mosque', $mosqueId)
    //         ->where('status', 'Bayar')
    //         ->sum('nominal');

    //     // Hitung total infaq
    //     $totalInfaq = Infaq::where('id_mosque', $mosqueId)
    //         ->where('status', 'Bayar')
    //         ->sum('nominal');

    //     // Hitung total sedekah
    //     $totalSedekah = Sedekah::where('id_mosque', $mosqueId)
    //         ->where('status', 'Bayar')
    //         ->sum('nominal');

    //     // Simpan nilai total dana ke dalam tabel mosques
    //     $mosque->totalZakat = $totalZakat;
    //     $mosque->totalInfaq = $totalInfaq;
    //     $mosque->totalSedekah = $totalSedekah;
    //     $mosque->save();

    // }

    public function updateTotalDana($mosqueId)
    {
        $mosque = Mosque::find($mosqueId);

        // Hitung total zakat
        $totalZakat = $mosque->zakats()->where('status', 'Bayar')->sum('nominal');

        // Hitung total infaq
        $totalInfaq = $mosque->infaqs()->where('status', 'Bayar')->sum('nominal');

        // Hitung total sedekah
        $totalSedekah = $mosque->sedekahs()->where('status', 'Bayar')->sum('nominal');

        // Simpan nilai total dana ke dalam tabel mosques
        $mosque->totalZakat = $totalZakat;
        $mosque->totalInfaq = $totalInfaq;
        $mosque->totalSedekah = $totalSedekah;
        $mosque->save();

    }
}
