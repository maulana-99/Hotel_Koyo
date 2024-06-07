<?php

namespace App\Http\Controllers;

use App\Models\Kamar;
use App\Models\Reservasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ReservasiController extends Controller
{
    public function index()
    {
        $kamar = Kamar::all();
        return view('reservasi.index', compact('kamar'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kamar_id' => 'required|exists:kamar,id',
            'quantity' => 'required|integer|min:1',
            'check_in' => 'required|date|after_or_equal:today',
            'check_out' => 'required|date|after:check_in',
            'nama_depan' => 'required|string',
            'nama_belakang' => 'required|string',
            'alamat' => 'required|string',
            'tlp' => 'required',
        ]);

        // Mendapatkan informasi kamar
        $kamar = Kamar::findOrFail($request->kamar_id);

        // Memastikan bahwa jumlah yang diminta tidak melebihi jumlah yang tersedia
        if ($request->quantity > $kamar->quantity) {
            return redirect()->back()->with('error', 'Requested quantity exceeds available quantity.');
        }

        // Membuat reservasi
        $reservasi = Reservasi::create([
            'user_id' => Auth::id(),
            'kamar_id' => $request->kamar_id,
            'quantity' => $request->quantity,
            'check_in' => $request->check_in,
            'check_out' => $request->check_out,
            'nama_depan' => $request->nama_depan,
            'nama_belakang' => $request->nama_belakang,
            'alamat' => $request->alamat,
            'tlp' => $request->tlp,
        ]);

        // Mengurangi jumlah kamar yang tersedia
        $kamar->quantity -= $request->quantity;
        $kamar->save();

        return redirect()->route('reservasi.pesananReservasi')->with('success', 'Reservation created successfully.');
    }

    public function show()
    {
        $user = Auth::user();
        if (!$user) {
            return redirect()->route('login');
        }
        $reservasi = DB::table('reservasis')
            ->join('kamar', 'reservasis.kamar_id', '=', 'kamar.id')
            ->where('reservasis.user_id', $user->id)
            ->select('reservasis.*', 'kamar.tipe_kamar', 'kamar.harga', 'kamar.nama_kamar')
            ->get();



        return view('reservasi.pesananReservasi', ['reservasi' => $reservasi,'user'=> $user]);
    }

}
