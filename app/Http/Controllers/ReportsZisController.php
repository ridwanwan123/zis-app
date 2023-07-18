<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

use App\Models\Infaq;
use App\Models\Sedekah;
use App\Models\Zakat;
use App\Models\Mosque;
use App\Models\PenyaluranDana;

class ReportsZisController extends Controller
{
    public function index(Request $request)
    {
        $searchMosque = $request->input('id_mosque');
        $searchMonth = $request->input('searchMonth');

        $mosques = Mosque::pluck('name_mosque', 'id');

        $totalZakat = null;
        $totalInfaq = null;
        $totalSedekah = null;
        $totalZakatBelumDisalurkan = null;
        $totalInfaqBelumDisalurkan = null;
        $totalSedekahBelumDisalurkan = null;
        $totalPengeluaranZakat = null;
        $totalPengeluaranInfaq = null;
        $totalPengeluaranSedekah = null;

        if ($searchMosque) {
            $masjid = Mosque::find($searchMosque);

            if ($masjid) {
                // Hitung total zakat, infaq, sedekah
                $totalZakat = Zakat::where('id_mosque', $searchMosque)
                    ->where('status', 'bayar')
                    ->when($searchMonth, function ($query, $searchMonth) {
                        return $query->whereMonth('created_at', $searchMonth);
                    })
                    ->sum('nominal');

                $totalInfaq = Infaq::where('id_mosque', $searchMosque)
                    ->where('status', 'bayar')
                    ->when($searchMonth, function ($query, $searchMonth) {
                        return $query->whereMonth('created_at', $searchMonth);
                    })
                    ->sum('nominal');

                $totalSedekah = Sedekah::where('id_mosque', $searchMosque)
                    ->where('status', 'bayar')
                    ->when($searchMonth, function ($query, $searchMonth) {
                        return $query->whereMonth('created_at', $searchMonth);
                    })
                    ->sum('nominal');

                // Hitung total zakat, infaq, sedekah yang sudah disalurkan
                $totalPengeluaranZakat = PenyaluranDana::where('id_mosque', $searchMosque)
                    ->where('jenis_dana', 'zakat')
                    ->when($searchMonth, function ($query, $searchMonth) {
                        return $query->whereMonth('created_at', $searchMonth);
                    })
                    ->sum('jumlah_penyaluran');

                $totalPengeluaranInfaq = PenyaluranDana::where('id_mosque', $searchMosque)
                    ->where('jenis_dana', 'infaq')
                    ->when($searchMonth, function ($query, $searchMonth) {
                        return $query->whereMonth('created_at', $searchMonth);
                    })
                    ->sum('jumlah_penyaluran');

                $totalPengeluaranSedekah = PenyaluranDana::where('id_mosque', $searchMosque)
                    ->where('jenis_dana', 'sedekah')
                    ->when($searchMonth, function ($query, $searchMonth) {
                        return $query->whereMonth('created_at', $searchMonth);
                    })
                    ->sum('jumlah_penyaluran');

                // Hitung total zakat, infaq, sedekah yang belum disalurkan
                $totalZakatBelumDisalurkan = $totalZakat - $totalPengeluaranZakat;
                $totalInfaqBelumDisalurkan = $totalInfaq - $totalPengeluaranInfaq;
                $totalSedekahBelumDisalurkan = $totalSedekah - $totalPengeluaranSedekah;
            }
        }

        $totalAllMosque = Mosque::count();

        return view('reports.index', compact(
            'mosques',
            'totalAllMosque',
            'searchMosque',
            'searchMonth',
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
