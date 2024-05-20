<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravolt\Avatar\Facade as Avatar;
use Illuminate\Support\Facades\Storage;
use Redirect;

class ManagementResepsionisController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $users = User::query()
            ->where('role', 'resepsionis')
            ->when($search, function ($query, $search) {
                return $query->where(function ($q) use ($search) {
                    $q->where('name', 'like', "%{$search}%")
                        ->orWhere('email', 'like', "%{$search}%");
                });
            })
            ->paginate(10);

        return view('adminPage.mr', compact('users'));
    }
    // function create(Request $request)
    // {
    //     $validatedData = $request->validate(
    //         [
    //             'name' => 'required|string|max:255',
    //             'email' => 'required|string|email|max:255|unique:users|regex:/^[a-zA-Z0-9._%+-]+@tch\.com$/',
    //             'password' => 'required|string|min:8|confirmed',
    //         ],
    //         [
    //             'name.required' => 'Username wajib di isi',
    //             'email.required' => 'Email wajib di isi',
    //             'email.unique' => 'Email sudah terdaftar',
    //             'email.regex' => 'Email harus menggunakan alamat tch (@tch.com)',
    //             'password.required' => 'Password wajib di isi',
    //             'password.min' => 'Password minimal 8 karakter',
    //             'password.confirmed' => 'Konfirmasi password tidak cocok',
    //         ]
    //     );

    //     $user = User::create([
    //         'name' => $request->input('name'),
    //         'email' => $request->input('email'),
    //         'password' => Hash::make($request->input('password')),
    //     ]);

    //     // Membuat avatar dengan nama pengguna
    //     $avatar = Avatar::create($user->name)->getImageObject()->encode('png');

    //     // Menyimpan avatar ke dalam storage
    //     $avatarPath = 'avatars/' . $user->id . '.png';
    //     Storage::put($avatarPath, (string) $avatar);

    //     // menyimpan path avatar ke dalam tabel users
    //     $user->avatar = $avatarPath;
    //     $user->save();

    //     return 'success: create.Resepsionis';
    // }

}
