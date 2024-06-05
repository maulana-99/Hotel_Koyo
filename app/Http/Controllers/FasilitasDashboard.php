<?php

namespace App\Http\Controllers;

use App\Models\Fasilitas;

class FasilitasDashboard extends Controller
{
    public function index()
    {
        $fasilitas = Fasilitas::all();

        return view('fasilitas', compact('fasilitas'));
    }
}
