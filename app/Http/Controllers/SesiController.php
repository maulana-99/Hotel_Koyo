<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Redirect;

class SesiController extends Controller
{
    public function index()
    {
        return view("login");
    }

    public function login(Request $request)
    {
        $request->validate(
            [
                'email' => 'required',
                'password' => 'required',
            ],
            [
                'email.required' => 'Email wajib di isi',
                'password.required' => 'Password wajib di isi',
            ],
        );

        $infologin = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if (Auth::attempt($infologin)) {
            if (Auth::user()->role == 'tamu') {
                return redirect('tamu');
            } elseif (Auth::user()->role == 'resepsionis') {
                return redirect('resepsionis');
            } elseif (Auth::user()->role == 'admin') {
                return redirect('admin');
            } else {
                return redirect('')->withErrors('Email dan Password tidak sesuai')->withInput();
            }
        } else {
            return redirect('')->withErrors('Email dan Password tidak sesuai')->withInput();
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/home');
    }
}
