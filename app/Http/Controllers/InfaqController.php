<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Infaq;
use App\Models\Mosque;
use App\Models\PenyaluranDana;
use PDF;

class InfaqController extends Controller
{
    public function index()
    {
        $infaq = Infaq::all();
        $totalInfaq = Infaq::where('status', '=', 'Bayar')->sum('nominal');
        
        return view('infaqs.index', ['infaq' => $infaq, 'totalInfaq' => $totalInfaq]);
         
    }

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

        // Simpan data infaq ke dalam tabel infaqs
        $infaq = new Infaq($data);
        $infaq->save();

        // Update totalInfaq pada tabel mosques
        $this->updateTotalInfaq($request->id_mosque);

        return redirect()->route('infaq')->with('success', 'Data Infaq berhasil ditambahkan.');
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

         // Get the Infaq by ID
        $infaq = Infaq::find($id);

        // Update the Infaq properties
        $infaq->id_mosque = $request->id_mosque;
        $infaq->nama_donatur = $request->nama_donatur;
        $infaq->phone = $request->phone;
        $infaq->nominal = $request->nominal;
        $infaq->status = $request->status;

        $infaq->save();

        // Update totalInfaq pada tabel mosques
        $this->updateTotalInfaq($request->id_mosque);

        return redirect()->route('infaq')->with('success', 'Data Infaq berhasil diperbarui.');
    }

    public function destroy($id)
    {
        // Cari data infaq berdasarkan ID
        $infaq = Infaq::find($id);

        // Hapus data infaq jika ditemukan
        if ($infaq) {
            $mosqueId = $infaq->id_mosque;
            $infaq->delete();

            // Update totalInfaq pada tabel mosques
            $this->updateTotalInfaq($mosqueId);

            return redirect()->route('infaq')->with('success', 'Data Infaq berhasil dihapus.');
        }

        return redirect()->route('infaq')->with('error', 'Data Infaq tidak ditemukan.');
    }

    private function updateTotalInfaq($mosqueId)
    {
        $mosque = Mosque::find($mosqueId);

        // Hitung total infaq dengan status 'Bayar'
        $totalInfaqBayar = Infaq::where('id_mosque', $mosqueId)
            ->where('status', 'Bayar')
            ->sum('nominal');

        // Hitung total infaq yang sudah disalurkan
        $totalPengeluaranInfaq = PenyaluranDana::where('id_mosque', $mosqueId)
            ->where('jenis_dana', 'infaq')
            ->sum('jumlah_penyaluran');

        // Hitung total infaq yang belum disalurkan
        $totalInfaqBelumDisalurkan = $totalInfaqBayar - $totalPengeluaranInfaq;

        $mosque->totalInfaq = $totalInfaqBayar;
        $mosque->totalPengeluaranInfaq = $totalPengeluaranInfaq;
        $mosque->totalInfaqBelumDisalurkan = $totalInfaqBelumDisalurkan;
        $mosque->save();
    }

    public function generatePDF()
    {
        $infaq = Infaq::where('status', 'Bayar')->get();
        $data = [
            'title' => 'Laporan Infaq',
            'date' => date('m/d/Y'),
            'infaq' => $infaq
        ];

        $pdf = PDF::loadView('infaqs.generatePDF', $data);
        return $pdf->download('laporanInfaq.pdf');
    }
}
