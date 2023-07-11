<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kriteria;
use App\Models\SkorKriteria;
use App\Models\Mustahik;
use App\Models\Factory;


class KriteriaController extends Controller
{
    public function create($id_mustahik)
    {
        $mustahik = Mustahik::findOrFail($id_mustahik);
        $kriteria = Kriteria::all();

        return view('skor_kriterias.createKriteria', compact('mustahik', 'kriteria'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_mustahik' => 'required',
            'A1' => 'required',
            'A2' => 'required',
            'A3' => 'required',
            'A4' => 'required',
            'A5' => 'required',
            'A6' => 'required'
        ]);

        $data = $request->except('_token'); 

        $kriteria = Kriteria::create($data);
        $id_mustahik = $kriteria->id_mustahik; // Ambil ID mustahik dari kriteria yang baru dibuat

        $A1 = $kriteria->A1 - 3;
        $A2 = $kriteria->A2 - 3;
        $A3 = $kriteria->A3 - 5;
        $A4 = $kriteria->A4 - 2;
        $A5 = $kriteria->A5 - 3;
        $A6 = $kriteria->A6 - 4;

        // Ubah nilai A1
        if ($A1 == 0) {
            $A1 = 5;
        } elseif ($A1 == 1) {
            $A1 = 4.5;
        } elseif ($A1 == -1) {
            $A1 = 4;
        } elseif ($A1 == 2) {
            $A1 = 3.5;
        } elseif ($A1 == -2) {
            $A1 = 3;
        } elseif ($A1 == 3) {
            $A1 = 2.5;
        } elseif ($A1 == -3) {
            $A1 = 2;
        } elseif ($A1 == 4) {
            $A1 = 5;
        } else {
            $A1 = 1;
        }

        // Ubah nilai A2
        if ($A2 == 0) {
            $A2 = 5;
        } elseif ($A2 == 1) {
            $A2 = 4.5;
        } elseif ($A2 == -1) {
            $A2 = 4;
        } elseif ($A2 == 2) {
            $A2 = 3.5;
        } elseif ($A2 == -2) {
            $A2 = 3;
        } elseif ($A2 == 3) {
            $A2 = 2.5;
        } elseif ($A2 == -3) {
            $A2 = 2;
        } elseif ($A2 == 4) {
            $A2 = 5;
        } else {
            $A2 = 1;
        }

        // Ubah nilai A3
        if ($A3 == 0) {
            $A3 = 5;
        } elseif ($A3 == 1) {
            $A3 = 4.5;
        } elseif ($A3 == -1) {
            $A3 = 4;
        } elseif ($A3 == 2) {
            $A3 = 3.5;
        } elseif ($A3 == -2) {
            $A3 = 3;
        } elseif ($A3 == 3) {
            $A3 = 2.5;
        } elseif ($A3 == -3) {
            $A3 = 2;
        } elseif ($A3 == 4) {
            $A3 = 5;
        } else {
            $A3 = 1;
        }

        // Ubah nilai A4
        if ($A4 == 0) {
            $A4 = 5;
        } elseif ($A4 == 1) {
            $A4 = 4.5;
        } elseif ($A4 == -1) {
            $A4 = 4;
        } elseif ($A4 == 2) {
            $A4 = 3.5;
        } elseif ($A4 == -2) {
            $A4 = 3;
        } elseif ($A4 == 3) {
            $A4 = 2.5;
        } elseif ($A4 == -3) {
            $A4 = 2;
        } elseif ($A4 == 4) {
            $A4 = 5;
        } else {
            $A4 = 1;
        }

        // Ubah nilai A5
        if ($A5 == 0) {
            $A5 = 5;
        } elseif ($A5 == 1) {
            $A5 = 4.5;
        } elseif ($A5 == -1) {
            $A5 = 4;
        } elseif ($A5 == 2) {
            $A5 = 3.5;
        } elseif ($A5 == -2) {
            $A5 = 3;
        } elseif ($A5 == 3) {
            $A5 = 2.5;
        } elseif ($A5 == -3) {
            $A5 = 2;
        } elseif ($A5 == 4) {
            $A5 = 5;
        } else {
            $A5 = 1;
        }

        // Ubah nilai A6
        if ($A6 == 0) {
            $A6 = 5;
        } elseif ($A6 == 1) {
            $A6 = 4.5;
        } elseif ($A6 == -1) {
            $A6 = 4;
        } elseif ($A6 == 2) {
            $A6 = 3.5;
        } elseif ($A6 == -2) {
            $A6 = 3;
        } elseif ($A6 == 3) {
            $A6 = 2.5;
        } elseif ($A6 == -3) {
            $A6 = 2;
        } elseif ($A6 == 4) {
            $A6 = 5;
        } else {
            $A6 = 1;
        }

        // Menghitung nilai NR, NH, NK, dan HA
        $NR = (0.6 * $A1) + (0.4 * $A2);
        $NH = (0.6 * $A3) + (0.4 * $A4);
        $NK = (0.6 * $A6) + (0.4 * $A5);
        $HA = (0.2 * $NR) + (0.5 * $NH) + (0.3 * $NK);

        // Simpan nilai NR, NH, NK, dan HA ke dalam entitas SkorKriteria
        $skorKriteria = new SkorKriteria;
        $skorKriteria->id_kriteria = $kriteria->id;
        $skorKriteria->id_mustahik = $id_mustahik;
        $skorKriteria->NR = $NR;
        $skorKriteria->NH = $NH;
        $skorKriteria->NK = $NK;
        $skorKriteria->HA = $HA;
        $skorKriteria->save();

        return redirect()->route('mustahik');
    }
}
