<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

use App\Models\Infaq;
use App\Models\Sedekah;
use App\Models\Zakat;



class DashboardController extends Controller
{
    public function index()
    {   
        $infaq = Infaq::all();
        $sedekah = Sedekah::all();
        $zakat = Zakat::all();

        $tglZakat = Zakat::pluck('created_at')->map(function ($date) {
            return Carbon::parse($date)->format('F');
        });

        
        $totalZakat = Zakat::where('status', '=', 'Bayar')->sum('nominal');
        $totalInfaq = Infaq::where('status', '=', 'Bayar')->sum('nominal');
        $totalSedekah = Sedekah::where('status', '=', 'Bayar')->sum('nominal');
        return view('dashboards.dashboard',  compact('zakat', 'infaq', 'sedekah', 'tglZakat', 'totalZakat', 'totalInfaq', 'totalSedekah'));
    }

}
