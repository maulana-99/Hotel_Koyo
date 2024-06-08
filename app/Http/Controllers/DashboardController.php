<?php

namespace App\Http\Controllers;

use Laravolt\Avatar\Facade as Avatar;

class DashboardController extends Controller
{
    public function indexAdmin()
    {
        // Memeriksa apakah ada pengguna yang sedang terautentikasi
        if ($user = auth()->user()) {
            // Membuat avatar dari nama pengguna dan mengonversinya ke base64
            $avatar = Avatar::create($user->name)->toBase64(); // Membuat avatar berdasarkan nama pengguna dan mengonversinya ke format base64
    
            // Mengembalikan tampilan 'adminPage.admin.admin' dengan data penakwgguna dan avatar
            return view('adminPage.admin.admin', compact('user', 'avatar')); // Mengembalikan tampilan 'adminPage.admin.admin' dan mengirimkan data 'user' dan 'avatar' ke tampilan tersebut
        }
    
        // Mengembalikan tampilan 'adminPage.admin.admin' tanpa data pengguna dan avatar jika tidak ada pengguna yang terautentikasi
        return view('adminPage.admin.admin'); // Mengembalikan tampilan 'adminPage.admin.admin'
    }
}
