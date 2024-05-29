<?php

namespace App\Http\Controllers;

use Laravolt\Avatar\Facade as Avatar;

class DashboardController extends Controller
{
    public function avatarDs()
    {
        if ($user = auth()->user()) {
            $avatar = Avatar::create($user->name)->toBase64();

            return view('dashboard_guest', compact('user', 'avatar'));
        }

        return view('dashboard_guest');
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
}
