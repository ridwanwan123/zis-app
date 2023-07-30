<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mustahik;
use App\Models\Kriteria;

class MustahikController extends Controller
{
    public function index()
    {   
        $mustahik = Mustahik::all();
        return view('mustahik.index', ['mustahik' => $mustahik]);
    }

     public function create()
    {   
        // $mosques = Mosque::all();
        return view('mustahik.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_mosque' => 'required',
            'nama_mustahik' => 'required',
            'jenis_kelamin' => 'required',
            'phone' => 'required',
            'address' => 'required'
        ]);

        $data = $request->except('_token'); 

        $mustahik = Mustahik::create($data);
        
        return redirect()->route('kriteria.create', ['id_mustahik' => $mustahik->id]);
    }


    public function show($id_mustahik)
    {
        $mustahik = Mustahik::findOrFail($id_mustahik);
        $kriteria = Kriteria::all();
        return view('mustahik.show', compact('mustahik','kriteria'));
    }

    
    
}