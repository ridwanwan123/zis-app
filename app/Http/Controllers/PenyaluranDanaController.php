<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Kriteria;
use App\Models\SkorKriteria;
use App\Models\Mustahik;
use App\Models\Factory;

use App\Models\Infaq;
use App\Models\Sedekah;
use App\Models\Zakat;
use App\Models\Mosque;
use App\Models\PenyaluranDana;

class PenyaluranDanaController extends Controller
{
    //PenyaluranDana
    public function index()
    {
        $mustahik = Mustahik::all();
        // Ambil id_mosque dari user yang sedang login
        $idMosque = auth()->user()->mosque->id;
        
        // Ambil data skor_kriteria berdasarkan id_mosque yang sesuai
        $skorKriteria = SkorKriteria::whereHas('mustahik', function ($query) use ($idMosque) {
            $query->where('id_mosque', $idMosque);
        })->orderByDesc('HA')->get();

        return view('penyaluranDana.index', compact('mustahik', 'skorKriteria'));
    }

    public function indexHasil()
    {
        // Ambil id_mosque dari user yang sedang login
        $idMosque = auth()->user()->mosque->id;

        // Ambil data mustahik berdasarkan id_mosque yang sesuai
        $mustahik = Mustahik::where('id_mosque', $idMosque)->get();

        // Ambil data skor_kriteria berdasarkan id_mosque yang sesuai
        $skorKriteria = SkorKriteria::whereHas('mustahik', function ($query) use ($idMosque) {
            $query->where('id_mosque', $idMosque);
        })->orderByDesc('HA')->get();

        // Ambil data penyaluranDana berdasarkan id_mosque yang sesuai
        $penyaluranDana = PenyaluranDana::whereHas('mustahik', function ($query) use ($idMosque) {
            $query->where('id_mosque', $idMosque);
        })->get();

        return view('penyaluranDana.indexHasilPenyaluran', compact('mustahik', 'skorKriteria', 'penyaluranDana'));
    }


    public function create($id_mustahik){
        //Menampilkan data dana zis belum disalurkan
            $user = Auth::user();
            $idMosque = $user->id_mosque;

            $masjid = Mosque::find($idMosque);
            $totalZakatBelumDisalurkan = $masjid->totalZakatBelumDisalurkan;
            $totalInfaqBelumDisalurkan = $masjid->totalInfaqBelumDisalurkan;
            $totalSedekahBelumDisalurkan = $masjid->totalSedekahBelumDisalurkan;
            
        $mustahik = Mustahik::findOrFail($id_mustahik);
        $kriteria = Kriteria::findOrFail($id_mustahik);
        
        $skorKriteria = SkorKriteria::where('id_mustahik', $id_mustahik)->first();
        
        return view('penyaluranDana.create', compact('mustahik','kriteria', 'totalZakatBelumDisalurkan',
            'totalInfaqBelumDisalurkan',
            'totalSedekahBelumDisalurkan','skorKriteria',));
    }


    public function store(Request $request)
    {
        $request->validate([
            'id_mustahik' => 'required',
            'jenis_dana' => 'required|in:zakat,infaq,sedekah',
            'tanggal_penyaluran' => 'required|date',
            'jumlah_penyaluran' => 'required|integer|min:0',
        ]);

        $id_mustahik = $request->input('id_mustahik');
        $jenis_dana = $request->input('jenis_dana');
        $tanggal_penyaluran = $request->input('tanggal_penyaluran');
        $jumlah_penyaluran = $request->input('jumlah_penyaluran');

        // Cek apakah mustahik sudah pernah menerima penyaluran dana sebelumnya (UNTUK SELURUH)
        // $existingPenyaluran = PenyaluranDana::where('id_mustahik', $id_mustahik)->first();
        // if ($existingPenyaluran) {
        //     return redirect()->back()->with('error', 'Mustahik sudah pernah menerima penyaluran dana sebelumnya.');
        // }

        // VERSI JENIS DANA 
        // Cek apakah mustahik sudah pernah menerima penyaluran dana untuk jenis dana yang sama
            $existingPenyaluran = PenyaluranDana::where('id_mustahik', $id_mustahik)
                ->where('jenis_dana', $jenis_dana)
                ->first();

            if ($existingPenyaluran) {
                return redirect()->back()->with('error', 'Mustahik sudah pernah menerima penyaluran dana ' . $jenis_dana . ' sebelumnya.');
            }
        
        // Ambil entitas Mosque
        $mosque = Mosque::find(Auth::user()->id_mosque);

        // Ambil totalZakatBelumDisalurkan
        $totalZakatBelumDisalurkan = $mosque->totalZakatBelumDisalurkan;

        // Ambil totalInfaqBelumDisalurkan
        $totalInfaqBelumDisalurkan = $mosque->totalInfaqBelumDisalurkan;

        // Ambil totalSedekahBelumDisalurkan
        $totalSedekahBelumDisalurkan = $mosque->totalSedekahBelumDisalurkan;

        // Lakukan validasi jumlah dana mencukupi berdasarkan jenis dana
        if ($jenis_dana === 'zakat') {
            if ($totalZakatBelumDisalurkan < $jumlah_penyaluran) {
                return redirect()->back()->with('error', 'Dana zakat belum disalurkan tidak mencukupi.');
            }

            $mosque->totalZakatBelumDisalurkan -= $jumlah_penyaluran;
            $mosque->totalPengeluaranZakat += $jumlah_penyaluran;
        } elseif ($jenis_dana === 'infaq') {
            if ($totalInfaqBelumDisalurkan < $jumlah_penyaluran) {
                return redirect()->back()->with('error', 'Dana infaq belum disalurkan tidak mencukupi.');
            }

            $mosque->totalInfaqBelumDisalurkan -= $jumlah_penyaluran;
            $mosque->totalPengeluaranInfaq += $jumlah_penyaluran;
        } elseif ($jenis_dana === 'sedekah') {
            if ($totalSedekahBelumDisalurkan < $jumlah_penyaluran) {
                return redirect()->back()->with('error', 'Dana sedekah belum disalurkan tidak mencukupi.');
            }

            $mosque->totalSedekahBelumDisalurkan -= $jumlah_penyaluran;
            $mosque->totalPengeluaranSedekah += $jumlah_penyaluran;
        }

        $mosque->save();

        // Simpan penyaluran dana ke dalam tabel penyaluran_danas
        $penyaluranDana = new PenyaluranDana();
        $penyaluranDana->id_mosque = Auth::user()->id_mosque;
        $penyaluranDana->id_mustahik = $id_mustahik;
        $penyaluranDana->jenis_dana = $jenis_dana;
        $penyaluranDana->tanggal_penyaluran = $tanggal_penyaluran;
        $penyaluranDana->jumlah_penyaluran = $jumlah_penyaluran;
        $penyaluranDana->save();

        return redirect()->back()->with('success', 'Dana berhasil disalurkan.');
    }

}
