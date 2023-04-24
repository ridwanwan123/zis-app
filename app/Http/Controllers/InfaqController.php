<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Infaq;
use App\Models\User;
use PDF;

class InfaqController extends Controller
{
    public function index()
    {
        // $user = User::all();
        $infaq = Infaq::all();
        return view('infaqs.index', ['infaq' => $infaq]);
    }

    public function create()
    {   
        $user = User::all();
        return view('infaqs.create', ['user' => $user]);
    }

    public function generatePDF()
    {
        $infaq = Infaq::all();
        $data = [
            'title' => 'Laporan Infaq',
            'date' => date('m/d/Y'),
            'infaq' => $infaq
        ];

        $pdf = PDF::loadView('infaqs.generatePDF', $data);
        return $pdf->download('laporanInfaq.pdf');
    }
}
