<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Laravolt\Avatar\Facade as Avatar;

class AuthController extends Controller
{
    public function loginPage()
    {
        return view('login');
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
            ]
        );

        $infologin = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if (Auth::attempt($infologin)) {
            if (Auth::user()->status == 0) {
                Auth::logout();
                return redirect('/login')->withErrors('Akun ini sudah di non aktifkan silakan membuat akun baru lagi!')->withInput();
            }

            switch (Auth::user()->role) {
                case 'tamu':
                    return redirect('/dashboard');
                case 'resepsionis':
                    return redirect('/resepsionis');
                case 'admin':
                    return redirect('/admin');
                default:
                    return redirect()->route('login')->withErrors('Email dan Password tidak sesuai')->withInput();
            }
        } else {
            return redirect('/login')->withErrors('Email dan Password tidak sesuai')->withInput();
        }
    }


    public function logout()
    {
        Auth::logout();

        return redirect('/login');
    }

    public function registerPage()
    {
        return view('register');
    }

    public function register(Request $request)
    {
        $validatedData = $request->validate(
            [
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users|regex:/^[a-zA-Z0-9._%+-]+@gmail\.com$/',
                'password' => 'required|string|min:8|confirmed',
            ],
            [
                'name.required' => 'Username wajib di isi',
                'email.required' => 'Email wajib di isi',
                'email.unique' => 'Email sudah terdaftar',
                'email.regex' => 'Email harus menggunakan alamat Gmail (@gmail.com)',
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

        // Membuat avatar dengan nama pengguna
        $avatar = Avatar::create($user->name)->getImageObject()->encode('png');

        // Menyimpan avatar ke dalam storage
        $avatarPath = 'avatars/' . $user->id . '.png';
        Storage::put($avatarPath, (string) $avatar);

        // menyimpan path avatar ke dalam tabel users
        $user->avatar = $avatarPath;
        $user->save();

        Auth::login($user);

        return redirect('/dashboard');
    }
}
