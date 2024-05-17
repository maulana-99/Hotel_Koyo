<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Redirect;

class AuthController extends Controller
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

    public function register(Request $request)
    {
        $validatedData = $request->validate(
            [
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:8|confirmed',
            ],
            [
                'name.required' => 'Username wajib di isi',
                'email.required' => 'Email wajib di isi',
                'email.unique' => 'Email sudah terdaftar',
                'password.required' => 'Password wajib di isi',
                'password.min' => 'Password minimal 8 karakter',
                'password.confirmed' => 'Konfirmasi password tidak cocok',
            ]
        );

        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
        ]);

        return response()->json(['message' => 'User successfully registered', 'user' => $user], 201);
    }
}
