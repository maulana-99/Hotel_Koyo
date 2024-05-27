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
        // Validate the request data
        $validatedData = $request->validate([
            'nama_kamar' => 'required|string|max:255',
            'tipe_kamar' => 'required|string|max:255',
            'harga' => 'required|numeric',
            'foto_kamar' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);
    
        // Handle the image upload
        if ($request->hasFile('foto_kamar')) {
            $imageName = time() . '.' . $request->foto_kamar->extension();
            $request->foto_kamar->move(public_path('images'), $imageName);
        } else {
            return redirect()->route('kamar.index')->with('error', 'Image upload failed.');
        }
    
        // Create the new Kamar record
        Kamar::create([
            'nama_kamar' => $validatedData['nama_kamar'],
            'tipe_kamar' => $validatedData['tipe_kamar'],
            'harga' => $validatedData['harga'],
            'foto_kamar' => $imageName,
        ]);
    
        // Redirect with success message
        return redirect()->route('kamar.index')->with('sukses', 'Kamar sukses ditambah.');
    }
    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $kamar = Kamar::Cari($id);
        return view('kamar.edit', compact('kamar'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama_kamar' => 'required',
            'tipe_kamar' => 'required',
            'harga' => 'required',
            'foto_kamar' => 'required|image|mimes:jpeg,png,jpg|max:255',
        ]);
        $kamar = Kamar::Cari($id);
        if($request->File('foto_kamar')){
            $imageName = time().'.'.$request->foto_kamar->extension();
            $request->foto_kamar->move(public_path('images'), $imageName);
            $kamar->foto_kamar = $imageName;
        }
        $kamar->nama_kamar = $request->nama_kamar;
        $kamar->tipe_kamar = $request->tipe_kamar;
        $kamar->harga = $request->harga;
        $kamar->save();

        return redirect()->route('kamar.index')->with('sukses', 'kamar sukses diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $kamar = Kamar::Cari($id);
        $kamar->delete();
        return redirect()->route('kamar.index')->with('sukses', 'kamar sukses dihapus');
    }
}
