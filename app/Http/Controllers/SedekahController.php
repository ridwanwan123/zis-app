<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sedekah;
use App\Models\Mosque;
use App\Models\PenyaluranDana;
use PDF;

class SedekahController extends Controller
{
    public function index()
    {
        $sedekah = Sedekah::all();
        $totalSedekah = Sedekah::where('status', '=', 'Bayar')->sum('nominal');
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
            'nominal' => 'required',
            'status' => 'required'
        ]);

        $data = $request->except('_token');

        // Simpan data sedekah ke dalam tabel sedekahs
        $sedekah = new Sedekah($data);
        $sedekah->save();

        // Update totalSedekah pada tabel mosques
        $this->updateTotalSedekah($request->id_mosque);

        return redirect()->route('sedekah')->with('success', 'Data Sedekah berhasil ditambahkan.');

        // flash()
        //     ->options([
        //         'timeout' => 3000, // 3 seconds
        //         'position' => 'bottom-right',
        //     ])
        //     ->addSuccess('Data Sedekah berhasil ditambahkan!!');
        // return redirect()->route('sedekah');
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
            'nominal' => 'required',
            'status' => 'required'
        ]);

        $sedekah = Sedekah::find($id);

        $sedekah->id_mosque = $request->id_mosque;
        $sedekah->nama_donatur = $request->nama_donatur;
        $sedekah->phone = $request->phone;
        $sedekah->nominal = $request->nominal;
        $sedekah->status = $request->status;

        $sedekah->save();
        // Update totalSedekah pada tabel mosques
        $this->updateTotalSedekah($request->id_mosque);

        return redirect()->route('sedekah')->with('success', 'Data Sedekah berhasil diperbarui.');
    }

    public function destroy($id)
    {
        // Cari data sedekah berdasarkan ID
        $sedekah = Sedekah::find($id);

        // Hapus data sedekah jika ditemukan
        if ($sedekah) {
            $mosqueId = $sedekah->id_mosque;
            $sedekah->delete();

            // Update totalSedekah pada tabel mosques
            $this->updateTotalSedekah($mosqueId);

            return redirect()->route('sedekah')->with('success', 'Data Sedekah berhasil dihapus.');
        }

        return redirect()->route('sedekah')->with('error', 'Data Sedekah tidak ditemukan.');
    }

    private function updateTotalSedekah($mosqueId)
    {
        $mosque = Mosque::find($mosqueId);

        // Hitung total sedekah dengan status 'Bayar'
        $totalSedekahBayar = Sedekah::where('id_mosque', $mosqueId)
            ->where('status', 'Bayar')
            ->sum('nominal');

        // Hitung total sedekah yang sudah disalurkan
        $totalPengeluaranSedekah = PenyaluranDana::where('id_mosque', $mosqueId)
            ->where('jenis_dana', 'sedekah')
            ->sum('jumlah_penyaluran');

        // Hitung total sedekah yang belum disalurkan
        $totalSedekahBelumDisalurkan = $totalSedekahBayar - $totalPengeluaranSedekah;

        $mosque->totalSedekah = $totalSedekahBayar;
        $mosque->totalPengeluaranSedekah = $totalPengeluaranSedekah;
        $mosque->totalSedekahBelumDisalurkan = $totalSedekahBelumDisalurkan;
        $mosque->save();
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
