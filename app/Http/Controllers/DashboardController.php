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

    // ...

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
        'totalPengeluaranSedekah'
    ));
}



}
