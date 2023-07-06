<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

use App\Models\Infaq;
use App\Models\Sedekah;
use App\Models\Zakat;



class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $infaq = Infaq::all();
        $sedekah = Sedekah::all();
        $zakat = Zakat::all();

        // Ambil bulan dari input pencarian
        $searchMonth = $request->input('searchMonth');

        $tglZakat = Zakat::pluck('created_at')->map(function ($date) {
            return Carbon::parse($date)->format('F');
        });

        $totalZakat = Zakat::where('status', 'Bayar')
            ->when($searchMonth, function ($query) use ($searchMonth) {
                return $query->whereMonth('created_at', Carbon::createFromFormat('!m', $searchMonth)->month);
            })
            ->sum('nominal');

        $totalInfaq = Infaq::where('status', 'Bayar')
            ->when($searchMonth, function ($query) use ($searchMonth) {
                return $query->whereMonth('created_at', Carbon::createFromFormat('!m', $searchMonth)->month);
            })
            ->sum('nominal');

        $totalSedekah = Sedekah::where('status', 'Bayar')
            ->when($searchMonth, function ($query) use ($searchMonth) {
                return $query->whereMonth('created_at', Carbon::createFromFormat('!m', $searchMonth)->month);
            })
            ->sum('nominal');

        $totalNominal = [];

        if ($totalZakat === null) {
            $totalNominal[] = 0;
        } else {
            $totalNominal[] = $totalZakat;
        }

        if ($totalInfaq === null) {
            $totalNominal[] = 0;
        } else {
            $totalNominal[] = $totalInfaq;
        }

        if ($totalSedekah === null) {
            $totalNominal[] = 0;
        } else {
            $totalNominal[] = $totalSedekah;
        }

        return view('dashboards.dashboard', compact('zakat', 'infaq', 'sedekah', 'tglZakat', 'totalNominal'));
    }

}
