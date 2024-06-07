<?php

namespace App\Http\Controllers;

use App\Models\Fasilitas;

class FasilitasDashboard extends Controller
{
    public function index()
    {
        // Mengambil semua data dari model Fasilitas
        $fasilitas = Fasilitas::all();

        // Mengembalikan tampilan 'fasilitas' dengan data yang telah diambil
        return view('fasilitas', compact('fasilitas'));
    }
}
