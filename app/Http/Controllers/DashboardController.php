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

        $totalZakat = $masjid->totalZakat;
        $totalInfaq = $masjid->totalInfaq;
        $totalSedekah = $masjid->totalSedekah;
        $totalZakatBelumDisalurkan = $masjid->totalZakatBelumDisalurkan;
        $totalInfaqBelumDisalurkan = $masjid->totalInfaqBelumDisalurkan;
        $totalSedekahBelumDisalurkan = $masjid->totalSedekahBelumDisalurkan;
        $totalPengeluaranZakat = $masjid->totalPengeluaranZakat;
        $totalPengeluaranInfaq = $masjid->totalPengeluaranInfaq;
        $totalPengeluaranSedekah = $masjid->totalPengeluaranSedekah;

        // Filter berdasarkan searchMonth jika tersedia
        if ($searchMonth) {
            $totalZakat = Zakat::whereHas('mosque', function ($query) use ($idMosque) {
                $query->where('id', $idMosque);
            })
            ->where('status', 'bayar')
            ->whereMonth('created_at', $searchMonth)
            ->sum('nominal');

            $totalInfaq = Infaq::whereHas('mosque', function ($query) use ($idMosque) {
                $query->where('id', $idMosque);
            })
            ->where('status', 'bayar')
            ->whereMonth('created_at', $searchMonth)
            ->sum('nominal');

            $totalSedekah = Sedekah::whereHas('mosque', function ($query) use ($idMosque) {
                $query->where('id', $idMosque);
            })
            ->where('status', 'bayar')
            ->whereMonth('created_at', $searchMonth)
            ->sum('nominal');

            // Jika total nominal nol, kosongkan nilainya
            if ($totalZakat == 0) {
                $totalZakat = null;
            }

            if ($totalInfaq == 0) {
                $totalInfaq = null;
            }

            if ($totalSedekah == 0) {
                $totalSedekah = null;
            }
        }

        //Filter berdasarkan searchMonth untuk totalZakatBelumDisalurkan totalInfaqBelumDisalurkan totalSedekahBelumDisalurkan
        if ($searchMonth) {
            $totalZakatBelumDisalurkan = PenyaluranDana::where('id_mosque', $idMosque)
                ->where('jenis_dana', 'zakat')
                ->whereMonth('created_at', $searchMonth)
                ->sum('jumlah_penyaluran');

            $totalInfaqBelumDisalurkan = PenyaluranDana::where('id_mosque', $idMosque)
                ->where('jenis_dana', 'infaq')
                ->whereMonth('created_at', $searchMonth)
                ->sum('jumlah_penyaluran');

            $totalSedekahBelumDisalurkan = PenyaluranDana::where('id_mosque', $idMosque)
                ->where('jenis_dana', 'sedekah')
                ->whereMonth('created_at', $searchMonth)
                ->sum('jumlah_penyaluran');

            // Jika total nominal nol, kosongkan nilainya
            if ($totalZakatBelumDisalurkan == 0) {
                $totalZakatBelumDisalurkan = null;
            }

            if ($totalInfaqBelumDisalurkan == 0) {
                $totalInfaqBelumDisalurkan = null;
            }

            if ($totalSedekahBelumDisalurkan == 0) {
                $totalSedekahBelumDisalurkan = null;
            }
        }

        //Filter berdasarkan searchMonth untuk totalPengeluaranZakat totalPengeluaranInfaq totalPengeluaranSedekah
        if ($searchMonth) {
            $totalPengeluaranZakat = PenyaluranDana::where('id_mosque', $idMosque)
                ->where('jenis_dana', 'zakat')
                ->whereMonth('created_at', $searchMonth)
                ->sum('jumlah_penyaluran');

            $totalPengeluaranInfaq = PenyaluranDana::where('id_mosque', $idMosque)
                ->where('jenis_dana', 'infaq')
                ->whereMonth('created_at', $searchMonth)
                ->sum('jumlah_penyaluran');

            $totalPengeluaranSedekah = PenyaluranDana::where('id_mosque', $idMosque)
                ->where('jenis_dana', 'sedekah')
                ->whereMonth('created_at', $searchMonth)
                ->sum('jumlah_penyaluran');

            // Jika total nominal nol, kosongkan nilainya
            if ($totalPengeluaranZakat == 0) {
                $totalPengeluaranZakat = null;
            }

            if ($totalPengeluaranInfaq == 0) {
                $totalPengeluaranInfaq = null;
            }

            if ($totalPengeluaranSedekah == 0) {
                $totalPengeluaranSedekah = null;
            }
        }

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
