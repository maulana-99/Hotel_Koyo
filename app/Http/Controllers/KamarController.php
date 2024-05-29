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
            'harga' => 'required|integer',
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
        // Show details for a specific Kamar - implement as needed
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
    public function update(Request $request, $id)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'nama_kamar' => 'required|string|max:255',
            'tipe_kamar' => 'required|in:regular,delux',
            'harga' => 'required|numeric',
            'deskripsi' => 'required|string|max:255',
            'jenis_kasur' => 'required|in:twin,king',
            'kapasitas' => 'required|in:1,2',
            'foto_kamar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $kamar = Kamar::findOrFail($id);

        // Check if a new image file is uploaded
        if ($request->hasFile('foto_kamar')) {
            // Delete the old image if exists
            if ($kamar->foto_kamar) {
                $oldImagePath = public_path('images/' . $kamar->foto_kamar);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }
            // Upload the new image
            $imageName = time() . '.' . $request->foto_kamar->extension();
            $request->foto_kamar->move(public_path('images'), $imageName);
            $kamar->foto_kamar = $imageName;
        }

        // Update the Kamar fields
        $kamar->nama_kamar = $validatedData['nama_kamar'];
        $kamar->harga = $validatedData['harga'];
        $kamar->tipe_kamar = $validatedData['tipe_kamar'];
        $kamar->deskripsi = $validatedData['deskripsi'];
        $kamar->jenis_kasur = $validatedData['jenis_kasur'];
        $kamar->kapasitas = $validatedData['kapasitas'];
        
        // Save the updated Kamar data
        $kamar->save();

        // Redirect with success message
        return redirect()->route('kamar.index')->with('sukses', 'Kamar sukses diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $kamar = Kamar::findOrFail($id);
    
        if ($kamar->foto_kamar) {
            $imagePath = public_path('images/' . $kamar->foto_kamar);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }
    
        $kamar->delete();    
        return redirect()->route('kamar.index')->with('sukses', 'Kamar sukses dihapus');
    }
}
