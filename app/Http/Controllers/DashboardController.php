<?php

namespace App\Http\Controllers;

use Laravolt\Avatar\Facade as Avatar;

class DashboardController extends Controller
{
    public function avatarDs()
    {
        // Memeriksa apakah ada pengguna yang sedang terautentikasi
        if ($user = auth()->user()) {
            // Membuat avatar dari nama pengguna dan mengonversinya ke base64
            $avatar = Avatar::create($user->name)->toBase64(); // Membuat avatar berdasarkan nama pengguna dan mengonversinya ke format base64
    
            // Mengembalikan tampilan 'dashboard_guest' dengan data pengguna dan avatar
            return view('dashboard_guest', compact('user', 'avatar')); // Mengembalikan tampilan 'dashboard_guest' dan mengirimkan data 'user' dan 'avatar' ke tampilan tersebut
        }
    
        // Mengembalikan tampilan 'dashboard_guest' tanpa data pengguna dan avatar jika tidak ada pengguna yang terautentikasi
        return view('dashboard_guest'); // Mengembalikan tampilan 'dashboard_guest'
    }
    

    public function indexAdmin()
    {
        if ($user = auth()->user()) {
            $avatar = Avatar::create($user->name)->toBase64();

            return view('adminPage.admin.admin', compact('user', 'avatar'));
        }

        return view('adminPage.admin.admin');
    }

    public function index()
    {
        if ($user = auth()->user()) {
            $avatar = Avatar::create($user->name)->toBase64();

            return view('dashboard_guest', compact('user', 'avatar'));
        }

        return view('dashboard_guest');
    }

    public function indexFasilitas()
    {
        if ($user = auth()->user()) {
            $avatar = Avatar::create($user->name)->toBase64();

            return view('fasilitas', compact('user', 'avatar'));
        }

        return view('fasilitas');
    }

    public function indexReservasi()
    {
        if ($user = auth()->user()) {
            $avatar = Avatar::create($user->name)->toBase64();

            return view('tamu_reservasi', compact('user', 'avatar'));
        }

        return view('tamu_reservasi');
    }

    public function indexResepsionis()
    {
        if ($user = auth()->user()) {
            $avatar = Avatar::create($user->name)->toBase64();

            return view('resepsionis.index', compact('user', 'avatar'));
        }

        return view('resepsionis.index');
    }
}
