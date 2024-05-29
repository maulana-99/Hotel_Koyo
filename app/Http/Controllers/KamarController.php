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
        return view('kamar.createKam');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    // Validate the request data
    $validatedData = $request->validate([
        'nama_kamar' => 'required|string|max:255',
        'tipe_kamar' => 'required|in:regular,delux',
        'deskripsi' => 'required|string|max:255',
        'jenis_kasur' => 'required|in:twin,king',
        'kapasitas' => 'required|in:1,2',
        'foto_kamar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
    ]);

    // Handle the image upload
    if ($request->hasFile('foto_kamar')) {
        $imageName = time() . '.' . $request->foto_kamar->extension();
        $request->foto_kamar->move(public_path('images'), $imageName);
    } else {
        $imageName = null; // Set to null if no image is uploaded
    }

    // Create the new Kamar record
    Kamar::create([
        'nama_kamar' => $validatedData['nama_kamar'],
        'tipe_kamar' => $validatedData['tipe_kamar'],
        'deskripsi' => $validatedData['deskripsi'],
        'jenis_kasur' => $validatedData['jenis_kasur'],
        'kapasitas' => $validatedData['kapasitas'],
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
        $kamar = Kamar::findOrFail($id);
        return view('kamar.show', compact('kamar'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $kamar = Kamar::findOrFail($id);
        return view('kamar.editKam', compact('kamar'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'nama_kamar' => 'required|string|max:255',
            'tipe_kamar' => 'required|string|max:255',
            'harga' => 'required|numeric',
            'deskripsi' => 'required|string|max:255',
            'jenis_kasur' => 'required|enum|max:25',
            'kamar_mandi' => 'required|int|max:11',
            'kapasitas' => 'required|int|max:11',
            'foto_kamar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $kamar = Kamar::findOrFail($id);
        
        if ($request->hasFile('foto_kamar')) {
            $imageName = time() . '.' . $request->foto_kamar->extension();
            $request->foto_kamar->move(public_path('images'), $imageName);
            $kamar->foto_kamar = $imageName;
        }

        $kamar->nama_kamar = $validatedData['nama_kamar'];
        $kamar->tipe_kamar = $validatedData['tipe_kamar'];
        $kamar->deskripsi = $validatedData['deskripsi'];
        $kamar->jenis_kasur = $validatedData['jenis_kasur'];
        $kamar->kamar_mandi = $validatedData['kamar_mandi'];
        $kamar->kapasitas = $validatedData['kapasitas'];
        $kamar->save();

        return redirect()->route('kamar.index')->with('sukses', 'Kamar sukses diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $kamar = Kamar::findOrFail($id);
        $kamar->delete();
        return redirect()->route('kamar.index')->with('sukses', 'Kamar sukses dihapus');
    }
}
