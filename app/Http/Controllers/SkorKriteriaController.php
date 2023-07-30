<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kriteria;
use App\Models\SkorKriteria;
use App\Models\Mustahik;
use App\Models\Factory;

class SkorKriteriaController extends Controller
{   
    public function indexAll(){
        // Ambil semua data mustahik
        $mustahik = Mustahik::all();

        // Ambil id_mosque dari user yang sedang login
        $idMosque = auth()->user()->mosque->id;

        // Ambil data skor_kriteria berdasarkan id_mosque yang sesuai
        $skorKriteria = SkorKriteria::whereHas('mustahik', function ($query) use ($idMosque) {
            $query->where('id_mosque', $idMosque);
        })->orderByDesc('HA')->get();

        return view('skor_kriterias.indexSPK', compact('mustahik', 'skorKriteria'));
    }


    public function show($id_mustahik)
    {
        $mustahik = Mustahik::findOrFail($id_mustahik);
        $kriteria = Kriteria::findOrFail($id_mustahik);
        
        $skorKriteria = SkorKriteria::where('id_mustahik', $id_mustahik)->first();

        return view('skor_kriterias.show', compact('mustahik','kriteria','skorKriteria'));
    }

}
