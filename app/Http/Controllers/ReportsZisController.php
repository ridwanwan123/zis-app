<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

use App\Models\Infaq;
use App\Models\Sedekah;
use App\Models\Zakat;
use App\Models\Mosque;

class ReportsZisController extends Controller
{

    public function index(Request $request)
    {
        // Untuk Informasi keseluruhan 
            $totalAllZakat = Zakat::where('status', '=', 'Bayar')->sum('nominal');
            $totalAllInfaq = Infaq::where('status', '=', 'Bayar')->sum('nominal');
            $totalAllSedekah = Sedekah::where('status', '=', 'Bayar')->sum('nominal');
            $totalAllMosque = Mosque::count();

        //Start Query pencarian 
            $infaq = Infaq::query();
            $sedekah = Sedekah::query();
            $zakat = Zakat::query();
            $mosques = Mosque::pluck('name_mosque', 'id');

            // Ambil masjid dari input pencarian
            $searchMosque = $request->input('id_mosque');

            // Ambil bulan dari input pencarian
            $searchMonth = $request->input('searchMonth');

            // Filter berdasarkan masjid
            if ($searchMosque) {
                $infaq->where('id_mosque', $searchMosque);
                $sedekah->where('id_mosque', $searchMosque);
                $zakat->where('id_mosque', $searchMosque);
            }

            // Filter berdasarkan bulan
            if ($searchMonth) {
                $infaq->whereMonth('created_at', Carbon::createFromFormat('m', $searchMonth)->month);
                $sedekah->whereMonth('created_at', Carbon::createFromFormat('m', $searchMonth)->month);
                $zakat->whereMonth('created_at', Carbon::createFromFormat('m', $searchMonth)->month);
            }

            $totalZakat = $zakat->where('status', 'Bayar')->sum('nominal');
            $totalInfaq = $infaq->where('status', 'Bayar')->sum('nominal');
            $totalSedekah = $sedekah->where('status', 'Bayar')->sum('nominal');

            $totalNominal = [
                $totalZakat ?? 0,
                $totalInfaq ?? 0,
                $totalSedekah ?? 0,
            ];

        return view('reports.index', compact('zakat', 'infaq', 'sedekah', 'mosques'
            , 'searchMosque', 'searchMonth', 'totalNominal', 'totalAllZakat'
            , 'totalAllInfaq', 'totalAllSedekah', 'totalAllMosque'));
    }
}
