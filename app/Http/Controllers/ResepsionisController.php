<?php

namespace App\Http\Controllers;

use App\Models\Kamar;
use App\Models\Reservasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravolt\Avatar\Facade as Avatar;

class ResepsionisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $avatar = Avatar::create($user->name)->toBase64();
        $reservasi = Reservasi::all();

        return view('resepsionis.index', [
            'reservasi' => $reservasi,
            'user' => $user,
            'avatar' => $avatar,
        ]);
    }

    public function checkIn($id)
    {
        $reservasi = Reservasi::find($id);
        if ($reservasi) {
            $reservasi->status = '2'; // Update status to 'Sudah check in'
            $reservasi->save();
            return redirect()->back()->with('success', 'Check-in berhasil.');
        }
        return redirect()->back()->with('error', 'Reservasi tidak ditemukan.');
    }

    public function checkout($id)
    {
        // Mendapatkan reservasi berdasarkan ID
        $reservasi = Reservasi::find($id);

        if ($reservasi) {
            // Ubah status reservasi menjadi 0
            $reservasi->status = '0';

            // Mendapatkan kamar yang sesuai dengan reservasi
            $kamar = Kamar::where('id', $reservasi->kamar_id)->first();

            if ($kamar) {
                // Tambahkan quantity reservasi ke quantity kamar
                $kamar->quantity += $reservasi->quantity;
                $kamar->save();
            }

            // Simpan perubahan reservasi
            $reservasi->save();
        }

        // Redirect ke halaman yang diinginkan dengan pesan sukses
        return redirect()->back()->with('success', 'Check out berhasil!');
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
