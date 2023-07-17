<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Zakat;
use App\Models\Mosque;
use App\Models\PenyaluranDana;

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

        // Simpan data zakat ke dalam tabel zakats
        $zakat = new Zakat($data);
        $zakat->save();

        // Update totalZakat pada tabel mosques
        $this->updateTotalZakat($request->id_mosque);

        return redirect()->route('zakat')->with('success', 'Data Zakat berhasil ditambahkan.');
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

        // Get the Zakat by ID
        $zakat = Zakat::find($id);

        // Update the Zakat properties
        $zakat->id_mosque = $request->id_mosque;
        $zakat->jenis_zakat = $request->jenis_zakat;
        $zakat->nama_donatur = $request->nama_donatur;
        $zakat->phone = $request->phone;
        $zakat->nominal = $request->nominal;
        $zakat->status = $request->status;

        $zakat->save();

        // Update totalZakat pada tabel mosques
        $this->updateTotalZakat($request->id_mosque);

        return redirect()->route('zakat')->with('success', 'Data Zakat berhasil diperbarui.');
    }

    public function destroy($id)
    {
        // Cari data zakat berdasarkan ID
        $zakat = Zakat::find($id);

        // Hapus data zakat jika ditemukan
        if ($zakat) {
            $mosqueId = $zakat->id_mosque;
            $zakat->delete();

            // Update totalZakat pada tabel mosques
            $this->updateTotalZakat($mosqueId);

            return redirect()->route('zakat')->with('success', 'Data Zakat berhasil dihapus.');
        }

        return redirect()->route('zakat')->with('error', 'Data Zakat tidak ditemukan.');
    }

    private function updateTotalZakat($mosqueId)
    {
        $mosque = Mosque::find($mosqueId);

        // Hitung total zakat dengan status 'Bayar'
        $totalZakatBayar = Zakat::where('id_mosque', $mosqueId)
            ->where('status', 'Bayar')
            ->sum('nominal');

        // Hitung total zakat yang sudah disalurkan
        $totalPengeluaranZakat = PenyaluranDana::where('id_mosque', $mosqueId)
            ->where('jenis_dana', 'zakat')
            ->sum('jumlah_penyaluran');

        // Hitung total zakat yang belum disalurkan
        $totalZakatBelumDisalurkan = $totalZakatBayar - $totalPengeluaranZakat;

        $mosque->totalZakat = $totalZakatBayar;
        $mosque->totalPengeluaranZakat = $totalPengeluaranZakat;
        $mosque->totalZakatBelumDisalurkan = $totalZakatBelumDisalurkan;
        $mosque->save();
    }

    // public function store(Request $request) 
    // {
    //     $request->validate([
    //         'id_mosque' => 'required',
    //         'jenis_zakat' => 'required',
    //         'nama_donatur' => 'required',
    //         'phone' => 'required',
    //         'nominal' => 'required',
    //         'status' => 'required'
    //     ]);

    //     $data = $request->except('_token');

    //     // Simpan data zakat ke dalam tabel zakats
    //     $zakat = new Zakat($data);
    //     $zakat->save();

    //     // Update totalZakat pada tabel mosques
    //     $mosque = Mosque::find($request->id_mosque);
    //     $totalZakat = Zakat::where('id_mosque', $request->id_mosque)
    //         ->where('status', 'Bayar')
    //         ->sum('nominal');
    //     $mosque->totalZakat = $totalZakat;
    //     $mosque->save();
        
    //     flash()
    //         ->options([
    //             'timeout' => 3000, // 3 seconds
    //             'position' => 'bottom-right',
    //         ])
    //         ->addSuccess('Data Zakat berhasil ditambahkan!!');
    //     return redirect()->route('zakat');
    // }

    // public function edit($id)
    // {
    //     $zakat = Zakat::find($id);
    //     $mosques = Mosque::all();

    //     return view('zakats.edit', compact('zakat', 'mosques'));
    // }

    // public function update(Request $request, $id)
    // {
    //     $request->validate([
    //         'id_mosque' => 'required',
    //         'jenis_zakat' => 'required',
    //         'nama_donatur' => 'required',
    //         'phone' => 'required',
    //         'nominal' => 'required',
    //         'status' => 'required'
    //     ]);

    //     $zakat = Zakat::find($id);

    //     $zakat->id_mosque = $request->id_mosque;
    //     $zakat->jenis_zakat = $request->jenis_zakat;
    //     $zakat->nama_donatur = $request->nama_donatur;
    //     $zakat->phone = $request->phone;
    //     $zakat->nominal = $request->nominal;
    //     $zakat->status = $request->status;

    //     $zakat->save();

    //     // Perbarui totalZakat pada tabel mosques
    //         $mosque = Mosque::find($request->id_mosque);
    //         $mosque->totalZakat = Zakat::where('id_mosque', $request->id_mosque)
    //             ->where('status', 'Bayar')
    //             ->sum('nominal');
    //         $mosque->save();


    //     flash()
    //         ->options([
    //             'timeout' => 3000, // 3 seconds
    //             'position' => 'bottom-right',
    //         ])
    //         ->addSuccess('Data Zakat berhasil diperbarui!!');
    //     return redirect()->route('zakat');
    // }

    // public function destroy($id)
    // {
    //     // Cari data zakat berdasarkan ID
    //     $zakat = Zakat::find($id);

    //     // Hapus data zakat jika ditemukan
    //     if ($zakat) {
    //         $mosqueId = $zakat->id_mosque;
    //         $zakat->delete();

    //         // Perbarui totalZakat pada tabel mosques
    //         $mosque = Mosque::find($mosqueId);
    //         $mosque->totalZakat = Zakat::where('id_mosque', $mosqueId)
    //             ->where('status', 'Bayar')
    //             ->sum('nominal');
    //         $mosque->save();

    //         flash()
    //             ->options([
    //                 'timeout' => 3000, // 3 seconds
    //                 'position' => 'bottom-right',
    //             ])
    //             ->addSuccess('Data Zakat berhasil dihapus!');

    //         return redirect()->route('zakat');
    //     }

    //     // Redirect atau berikan respon sesuai kebutuhan aplikasi Anda jika data zakat tidak ditemukan
    //     return redirect()->route('zakat')->with('error', 'Data Zakat tidak ditemukan!');
    // }

}
