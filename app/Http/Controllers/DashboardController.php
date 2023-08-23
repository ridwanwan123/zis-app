<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

use App\Models\Infaq;
use App\Models\Sedekah;
use App\Models\Zakat;
use App\Models\Mosque;
use App\Models\PenyaluranDana;
use Illuminate\Support\Facades\DB;


class DashboardController extends Controller
{  

    public function index(Request $request)
    {
        $user = Auth::user();
        $idMosque = $user->id_mosque;
        $masjid = Mosque::find($idMosque);

        $searchMonth = $request->input('searchMonth');

        // Hitung total zakat, infaq, sedekah
        $totalZakat = Zakat::where('id_mosque', $idMosque)
            ->where('status', 'bayar')
            ->when($searchMonth, function ($query, $searchMonth) {
                return $query->whereMonth('created_at', $searchMonth);
            })
            ->sum('nominal');

        $totalInfaq = Infaq::where('id_mosque', $idMosque)
            ->where('status', 'bayar')
            ->when($searchMonth, function ($query, $searchMonth) {
                return $query->whereMonth('created_at', $searchMonth);
            })
            ->sum('nominal');

        $totalSedekah = Sedekah::where('id_mosque', $idMosque)
            ->where('status', 'bayar')
            ->when($searchMonth, function ($query, $searchMonth) {
                return $query->whereMonth('created_at', $searchMonth);
            })
            ->sum('nominal');

        // Hitung total zakat, infaq, sedekah yang sudah disalurkan
        $totalPengeluaranZakat = PenyaluranDana::where('id_mosque', $idMosque)
            ->where('jenis_dana', 'zakat')
            ->when($searchMonth, function ($query, $searchMonth) {
                return $query->whereMonth('created_at', $searchMonth);
            })
            ->sum('jumlah_penyaluran');

        $totalPengeluaranInfaq = PenyaluranDana::where('id_mosque', $idMosque)
            ->where('jenis_dana', 'infaq')
            ->when($searchMonth, function ($query, $searchMonth) {
                return $query->whereMonth('created_at', $searchMonth);
            })
            ->sum('jumlah_penyaluran');

        $totalPengeluaranSedekah = PenyaluranDana::where('id_mosque', $idMosque)
            ->where('jenis_dana', 'sedekah')
            ->when($searchMonth, function ($query, $searchMonth) {
                return $query->whereMonth('created_at', $searchMonth);
            })
            ->sum('jumlah_penyaluran');

            // Hitung total zakat, infaq, sedekah yang belum disalurkan
        $totalZakatBelumDisalurkan = $totalZakat - $totalPengeluaranZakat;
        $totalInfaqBelumDisalurkan = $totalInfaq - $totalPengeluaranInfaq;
        $totalSedekahBelumDisalurkan = $totalSedekah - $totalPengeluaranSedekah;

            // tampilan data mustahik penerima danaa
            $idMosque = auth()->user()->mosque->id;

            $zakatDana = DB::table('penyaluran_danas')
                ->join('mustahiks', 'penyaluran_danas.id_mustahik', '=', 'mustahiks.id')
                ->join('skor_kriterias', 'penyaluran_danas.id_mustahik', '=', 'skor_kriterias.id_mustahik')
                ->join('mosques', 'penyaluran_danas.id_mosque', '=', 'mosques.id')
                ->select('mustahiks.nama_mustahik', 'skor_kriterias.HA', 'penyaluran_danas.jumlah_penyaluran', 'penyaluran_danas.tanggal_penyaluran', 'mosques.name_mosque', 'penyaluran_danas.jenis_dana')
                ->where('penyaluran_danas.jenis_dana', 'zakat')
                ->where('penyaluran_danas.id_mosque', $idMosque)
                ->get();

            $infaqDana = DB::table('penyaluran_danas')
                ->join('mustahiks', 'penyaluran_danas.id_mustahik', '=', 'mustahiks.id')
                ->join('skor_kriterias', 'penyaluran_danas.id_mustahik', '=', 'skor_kriterias.id_mustahik')
                ->join('mosques', 'penyaluran_danas.id_mosque', '=', 'mosques.id')
                ->select('mustahiks.nama_mustahik', 'skor_kriterias.HA', 'penyaluran_danas.jumlah_penyaluran', 'penyaluran_danas.tanggal_penyaluran', 'mosques.name_mosque', 'penyaluran_danas.jenis_dana')
                ->where('penyaluran_danas.jenis_dana', 'infaq')
                ->where('penyaluran_danas.id_mosque', $idMosque)
                ->get();

            $sedekahDana = DB::table('penyaluran_danas')
                ->join('mustahiks', 'penyaluran_danas.id_mustahik', '=', 'mustahiks.id')
                ->join('skor_kriterias', 'penyaluran_danas.id_mustahik', '=', 'skor_kriterias.id_mustahik')
                ->join('mosques', 'penyaluran_danas.id_mosque', '=', 'mosques.id')
                ->select('mustahiks.nama_mustahik', 'skor_kriterias.HA', 'penyaluran_danas.jumlah_penyaluran', 'penyaluran_danas.tanggal_penyaluran', 'mosques.name_mosque', 'penyaluran_danas.jenis_dana')
                ->where('penyaluran_danas.jenis_dana', 'sedekah')
                ->where('penyaluran_danas.id_mosque', $idMosque)
                ->get();

        return view('dashboards.dashboard', compact(
            'masjid',
            'totalZakat',
            'totalInfaq',
            'totalSedekah',
            'totalZakatBelumDisalurkan',
            'totalInfaqBelumDisalurkan',
            'totalSedekahBelumDisalurkan',
            'totalPengeluaranZakat',
            'totalPengeluaranInfaq',
            'totalPengeluaranSedekah','zakatDana', 'infaqDana', 'sedekahDana'
        ));
    }



}
