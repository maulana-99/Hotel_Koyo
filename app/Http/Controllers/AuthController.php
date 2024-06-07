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
    /**
     * 
     * Menampilkan login dan verifikasi input
     * saat login, dan pergi ke page masing masing 
     * berdasatkan role
     * 
     */
    public function loginPage()
    {
        return view('login');// Menampilkan login
    }

    public function login(Request $request)
    {
        // Validasi input request
        $request->validate(
            [
                'email' => 'required',  // Email harus diisi
                'password' => 'required',  // Password harus diisi
            ],
            [
                'email.required' => 'Email wajib di isi',  // Pesan error jika email tidak diisi
                'password.required' => 'Password wajib di isi',  // Pesan error jika password tidak diisi
            ]
        );

        // Membuat array informasi login
        $infologin = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        // Mencoba login dengan informasi yang diberikan
        if (Auth::attempt($infologin)) {
            // Jika status user adalah 0 (non-aktif)
            if (Auth::user()->status == 0) {
                Auth::logout();  // Logout user
                return redirect('/login')->withErrors('Akun ini sudah di non aktifkan silakan membuat akun baru lagi!')->withInput();  // Redirect ke login dengan pesan error
            }

            // Redirect berdasarkan role user
            switch (Auth::user()->role) {
                case 'tamu':
                    return redirect('/dashboard');  // Redirect ke dashboard tamu
                case 'resepsionis':
                    return redirect('/resepsionis');  // Redirect ke dashboard resepsionis
                case 'admin':
                    return redirect('/admin');  // Redirect ke dashboard admin
                default:
                    return redirect()->route('login')->withErrors('Email dan Password tidak sesuai')->withInput();  // Redirect ke login dengan pesan error
            }
        } else {
            // Jika login gagal, redirect ke login dengan pesan error
            return redirect('/login')->withErrors('Email dan Password tidak sesuai')->withInput();
        }
    }


    public function logout()
    {
        Auth::logout();// Logout user
        return redirect('/login'); // Redirect ke login
    }

    /**
     * 
     * Menampilkan register dan register membuat akun user untuk reservasi
     * dan sekaligus login
     * 
     */
    public function registerPage()
    {
        return view('register');// Menampilkan register
    }

    public function register(Request $request)
    {
        // Validasi input request
        $validatedData = $request->validate(
            [
                'name' => 'required|string|max:255',  // Nama harus diisi, berupa string, maksimal 255 karakter
                'email' => 'required|string|email|max:255|unique:users|regex:/^[a-zA-Z0-9._%+-]+@gmail\.com$/',  // Email harus diisi, valid, unik, dan menggunakan alamat Gmail
                'password' => 'required|string|min:8|confirmed',  // Password harus diisi, minimal 8 karakter, dan terkonfirmasi
            ],
            [
                'name.required' => 'Username wajib di isi',  // Pesan error jika nama tidak diisi
                'email.required' => 'Email wajib di isi',  // Pesan error jika email tidak diisi
                'email.unique' => 'Email sudah terdaftar',  // Pesan error jika email sudah terdaftar
                'email.regex' => 'Email harus menggunakan alamat Gmail (@gmail.com)',  // Pesan error jika email bukan alamat Gmail
                'password.required' => 'Password wajib di isi',  // Pesan error jika password tidak diisi
                'password.min' => 'Password minimal 8 karakter',  // Pesan error jika password kurang dari 8 karakter
                'password.confirmed' => 'Konfirmasi password tidak cocok',  // Pesan error jika konfirmasi password tidak cocok
            ]
        );

        // Membuat user baru dengan data yang telah divalidasi
        $user = User::create([
            'name' => $request->input('name'),  // Mengambil nama dari input request
            'email' => $request->input('email'),  // Mengambil email dari input request
            'password' => Hash::make($request->input('password')),  // Menghash password
        ]);

        // Membuat avatar dengan nama pengguna
        $avatar = Avatar::create($user->name)->getImageObject()->encode('png');

        // Menyimpan avatar ke dalam storage
        $avatarPath = 'avatars/' . $user->id . '.png';
        Storage::put($avatarPath, (string) $avatar);

        // Menyimpan path avatar ke dalam tabel users
        $user->avatar = $avatarPath;
        $user->save();

        // Login user yang baru dibuat
        Auth::login($user);

        // Redirect ke dashboard
        return redirect('/dashboard');
    }
}
