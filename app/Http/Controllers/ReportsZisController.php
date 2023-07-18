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

    // public function index(Request $request)
    // {
    //     // Untuk Informasi keseluruhan 
    //         $totalAllZakat = Zakat::where('status', '=', 'Bayar')->sum('nominal');
    //         $totalAllInfaq = Infaq::where('status', '=', 'Bayar')->sum('nominal');
    //         $totalAllSedekah = Sedekah::where('status', '=', 'Bayar')->sum('nominal');
    //         $totalAllMosque = Mosque::count();

    //     //Start Query pencarian 
    //         $infaq = Infaq::query();
    //         $sedekah = Sedekah::query();
    //         $zakat = Zakat::query();
    //         $mosques = Mosque::pluck('name_mosque', 'id');

    //         // Ambil masjid dari input pencarian
    //         $searchMosque = $request->input('id_mosque');

    //         // Ambil bulan dari input pencarian
    //         $searchMonth = $request->input('searchMonth');

    //         // Filter berdasarkan masjid
    //         if ($searchMosque) {
    //             $infaq->where('id_mosque', $searchMosque);
    //             $sedekah->where('id_mosque', $searchMosque);
    //             $zakat->where('id_mosque', $searchMosque);
    //         }

    //         // Filter berdasarkan bulan
    //         if ($searchMonth) {
    //             $infaq->whereMonth('created_at', Carbon::createFromFormat('m', $searchMonth)->month);
    //             $sedekah->whereMonth('created_at', Carbon::createFromFormat('m', $searchMonth)->month);
    //             $zakat->whereMonth('created_at', Carbon::createFromFormat('m', $searchMonth)->month);
    //         }

    //         $totalZakat = $zakat->where('status', 'Bayar')->sum('nominal');
    //         $totalInfaq = $infaq->where('status', 'Bayar')->sum('nominal');
    //         $totalSedekah = $sedekah->where('status', 'Bayar')->sum('nominal');

    //         $totalNominal = [
    //             $totalZakat ?? 0,
    //             $totalInfaq ?? 0,
    //             $totalSedekah ?? 0,
    //         ];

    //     return view('reports.index', compact('zakat', 'infaq', 'sedekah', 'mosques'
    //         , 'searchMosque', 'searchMonth', 'totalNominal', 'totalAllZakat'
    //         , 'totalAllInfaq', 'totalAllSedekah', 'totalAllMosque'));
    // }

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
                $totalZakat = Zakat::where('id_mosque', $searchMosque)
                    ->where('status', 'bayar')
                    ->whereMonth('created_at', $searchMonth)
                    ->sum('nominal');

                $totalInfaq = Infaq::where('id_mosque', $searchMosque)
                    ->where('status', 'bayar')
                    ->whereMonth('created_at', $searchMonth)
                    ->sum('nominal');

                $totalSedekah = Sedekah::where('id_mosque', $searchMosque)
                    ->where('status', 'bayar')
                    ->whereMonth('created_at', $searchMonth)
                    ->sum('nominal');

                $totalZakatBelumDisalurkan = PenyaluranDana::where('id_mosque', $searchMosque)
                    ->where('jenis_dana', 'zakat')
                    ->whereMonth('created_at', $searchMonth)
                    ->sum('jumlah_penyaluran');

                $totalInfaqBelumDisalurkan = PenyaluranDana::where('id_mosque', $searchMosque)
                    ->where('jenis_dana', 'infaq')
                    ->whereMonth('created_at', $searchMonth)
                    ->sum('jumlah_penyaluran');

                $totalSedekahBelumDisalurkan = PenyaluranDana::where('id_mosque', $searchMosque)
                    ->where('jenis_dana', 'sedekah')
                    ->whereMonth('created_at', $searchMonth)
                    ->sum('jumlah_penyaluran');

                // $totalZakatBelumDisalurkan = PenyaluranDana::where('id_mosque', $searchMosque)
                //     ->where('jenis_dana', 'zakat')
                //     ->whereMonth('created_at', $searchMonth)
                //     ->sum('jumlah_penyaluran');

                // $totalZakatBelumDisalurkan = $masjid->totalZakat - $totalZakatBelumDisalurkan - $totalPengeluaranZakat;
                // $totalInfaqBelumDisalurkan = $masjid->totalInfaq - $masjid->totalPengeluaranInfaq;
                // $totalSedekahBelumDisalurkan = $masjid->totalSedekah - $masjid->totalPengeluaranSedekah;

                $totalPengeluaranZakat = PenyaluranDana::where('id_mosque', $searchMosque)
                    ->where('jenis_dana', 'zakat')
                    ->whereMonth('created_at', $searchMonth)
                    ->sum('jumlah_penyaluran');

                $totalPengeluaranInfaq = PenyaluranDana::where('id_mosque', $searchMosque)
                    ->where('jenis_dana', 'infaq')
                    ->whereMonth('created_at', $searchMonth)
                    ->sum('jumlah_penyaluran');

                $totalPengeluaranSedekah = PenyaluranDana::where('id_mosque', $searchMosque)
                    ->where('jenis_dana', 'sedekah')
                    ->whereMonth('created_at', $searchMonth)
                    ->sum('jumlah_penyaluran');
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
