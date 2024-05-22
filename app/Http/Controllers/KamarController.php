<?php

namespace App\Http\Controllers;
use App\Models\Kamar;
use Illuminate\Http\Request;

class KamarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kamar = Kamar::all();
        return view('kamar.index', compact('kamar'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('kamar.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
      $request->validate([  
        'nama_kamar' => 'required',
        'tipe_kamar' => 'required',
        'harga' => 'required',
        'foto_kamar' => 'required|image|mimes:jpeg,png,jpg|max:255',
      ]);
      $imageName = time().'.'.$request->foto_kamar->extension();
      $request->foto_kamar->move(public_path('images'), $imageName);

      Kamar::create([
        'nama_kamar' => $request->nama_kamar,
        'tipe_kamar' => $request->tipe_kamar,
        'harga' => $request->harga,
        'foto_kamar' => $imageName,
      ]);
      return redirect()->route('kamar.index')->with('success', 'Kamar sukses ditambah.');
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
