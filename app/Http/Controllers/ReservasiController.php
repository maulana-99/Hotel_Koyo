<?php

namespace App\Http\Controllers;

use App\Models\Kamar;
use App\Models\Reservasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReservasiController extends Controller
{
    public function index()
    {
        $kamar = Kamar::all();
        return view('reservasi.index', compact('kamar'));
    }


    public function create()
    {

    }


    public function store(Request $request)
    {
        $request->validate([
            'kamar_id' => 'required|exists:kamar,id',
            'quantity' => 'required|integer|min:1',
            'check_in' => 'required|date|after_or_equal:today',
            'check_out' => 'required|date|after:check_in',
        ]);
    
        // Mendapatkan informasi kamar
        $kamar = Kamar::findOrFail($request->kamar_id);
    
        // Memastikan bahwa jumlah yang diminta tidak melebihi jumlah yang tersedia
        if ($request->quantity > $kamar->quantity) {
            return redirect()->back()->with('error', 'Requested quantity exceeds available quantity.');
        }
    
        // Membuat reservasi
        $reservsi = Reservasi::create([
            'user_id' => Auth::id(),
            'kamar_id' => $request->kamar_id,
            'quantity' => $request->quantity,
            'check_in' => $request->check_in,
            'check_out' => $request->check_out,
        ]);
    
        // Mengurangi jumlah kamar yang tersedia
        $kamar->quantity -= $request->quantity;
        $kamar->save();
    
        return redirect()->route('reservasi.create')->with('success', 'Reservation created successfully.');
    }

    public function show()
    {
        $reservasi = Reservasi::table('reservasi')
            ->join('kamar', 'reservasi.kamar_id', '=', 'kamar.id')
            ->select('reservasi.*', 'kamar.tipe_kamar', 'kamar.harga')
            ->get();

        return view('reservasi.pesananReservasi', ['reservasi' => $reservasi]);
    }


    public function edit()
    {

    }


    public function update()
    {

    }

    public function destroy()
    {

    }
}
