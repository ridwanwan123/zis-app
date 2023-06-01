<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Infaq;
use App\Models\Sedekah;

class DashboardController extends Controller
{
    public function index()
    {   
        $infaq = Infaq::all();
        $sedekah = Sedekah::all();
        $totalInfaq = Infaq::where('status', '=', 'Bayar')->sum('nominal');
        $totalSedekah = Sedekah::where('status', '=', 'Bayar')->sum('nominal');
        return view('dashboards.dashboard',  compact('infaq', 'sedekah', 'totalInfaq', 'totalSedekah'));
    }

}
