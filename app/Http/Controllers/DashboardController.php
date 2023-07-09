<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

use App\Models\Infaq;
use App\Models\Sedekah;
use App\Models\Zakat;
use App\Models\Mosque;



class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();
        $idMosque = $user->id_mosque;

        $infaq = Infaq::whereHas('mosque', function ($query) use ($idMosque) {
            $query->where('id', $idMosque);
        })
        ->when($request->has('searchMonth'), function ($query) use ($request) {
            return $query->whereMonth('created_at', Carbon::createFromFormat('!m', $request->input('searchMonth'))->month);
        })
        ->get();

        $sedekah = Sedekah::whereHas('mosque', function ($query) use ($idMosque) {
            $query->where('id', $idMosque);
        })
        ->when($request->has('searchMonth'), function ($query) use ($request) {
            return $query->whereMonth('created_at', Carbon::createFromFormat('!m', $request->input('searchMonth'))->month);
        })
        ->get();

        $zakat = Zakat::whereHas('mosque', function ($query) use ($idMosque) {
            $query->where('id', $idMosque);
        })
        ->when($request->has('searchMonth'), function ($query) use ($request) {
            return $query->whereMonth('created_at', Carbon::createFromFormat('!m', $request->input('searchMonth'))->month);
        })
        ->get();

        $masjid = Mosque::find($idMosque);

        $tglZakat = Zakat::whereHas('mosque', function ($query) use ($idMosque) {
            $query->where('id', $idMosque);
        })
        ->pluck('created_at')
        ->map(function ($date) {
            return Carbon::parse($date)->format('F');
        });

        $totalZakat = $zakat->where('status', 'Bayar')->sum('nominal');
        $totalInfaq = $infaq->where('status', 'Bayar')->sum('nominal');
        $totalSedekah = $sedekah->where('status', 'Bayar')->sum('nominal');

        $totalNominal = [
            $totalZakat ?? 0,
            $totalInfaq ?? 0,
            $totalSedekah ?? 0,
        ];

        return view('dashboards.dashboard', compact('zakat', 'infaq', 'sedekah', 'tglZakat', 'totalNominal', 'masjid'));
    }
}
