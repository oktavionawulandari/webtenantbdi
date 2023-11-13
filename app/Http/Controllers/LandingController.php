<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use PDF;


class LandingController extends Controller
{

    public function landing()
    {
        return view('landing-page.landing');
    }

    public function cetak_pdf()
    {
        $data = PDF::loadview('landing-page.cetak-syarat');
        return $data->download('Syarat-Pendaftaran.pdf');
    }
}
