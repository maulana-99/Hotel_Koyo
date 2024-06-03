<?php
namespace App\Http\Controllers;

use App\Models\Kamar;
use Illuminate\Http\Request;

class ManagementKamarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kamar = Kamar::all();
        return view('adminPage.kamar.index', compact('kamar'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('kamar.index');
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
            'quantity' => 'required|integer',
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
            'quantity' => $validatedData['quantity'],
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
        return view('kamar.index', compact('kamar'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $kamar = Kamar::findOrFail($id);
        $kamar->nama_kamar = $request->input('nama_kamar');
        $kamar->tipe_kamar = $request->input('tipe_kamar');
        $kamar->kapasitas = $request->input('kapasitas');
        $kamar->jenis_kasur = $request->input('jenis_kasur');
        $kamar->harga = $request->input('harga');

        if ($request->hasFile('foto_kamar')) {
            $file = $request->file('foto_kamar');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('images'), $filename);
            if ($kamar->foto_kamar !== $filename) {
                $imagePath = public_path('images/' . $kamar->foto_kamar);
                if (file_exists($imagePath)) {
                    unlink($imagePath);
                }
            }
            $kamar->foto_kamar = $filename;

        }


        $kamar->save();

        return redirect()->route('kamar.index')->with('success', 'Kamar updated successfully');
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
