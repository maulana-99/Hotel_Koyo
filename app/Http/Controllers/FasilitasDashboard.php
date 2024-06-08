<?php

namespace App\Http\Controllers;

use App\Models\Fasilitas;
use Illuminate\Support\Facades\Auth;
use Laravolt\Avatar\Facade as Avatar;

class FasilitasDashboard extends Controller
{
    public function index()
    {
        // Mengambil semua data dari model Fasilitas
        $fasilitas = Fasilitas::all(); // Mengambil semua entri dari tabel 'fasilitas' menggunakan model Fasilitas
    
        // Mendapatkan pengguna yang sedang terautentikasi
        $user = Auth::user(); // Mendapatkan informasi pengguna yang sedang login
    
        // Membuat avatar dari nama pengguna dan mengonversinya ke base64
        $avatar = Avatar::create($user->name)->toBase64(); // Membuat avatar berdasarkan nama pengguna dan mengonversinya ke format base64
    
        // Mengembalikan tampilan 'fasilitas' dengan data yang telah diambil
        return view('fasilitas', compact('fasilitas', 'avatar', 'user')); // Mengembalikan tampilan 'fasilitas' dan mengirimkan data 'fasilitas', 'avatar', dan 'user' ke tampilan tersebut
    }    
}
