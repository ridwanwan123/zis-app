<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
        $totalInfaq = Infaq::where('status', '=', 'Bayar')->sum('nominal');
        $totalSedekah = Sedekah::where('status', '=', 'Bayar')->sum('nominal');
        $totalZakat = Zakat::where('status', '=', 'Bayar')->sum('nominal');
        return view('dashboards.dashboard',  compact('infaq', 'sedekah', 'zakat', 'totalInfaq', 'totalSedekah', 'totalZakat'));
    }

}
