<?php

namespace App\Http\Controllers;

use App\Models\Fasilitas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Laravolt\Avatar\Facade as Avatar;

class ManagementFasilitasController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $avatar = Avatar::create($user->name)->toBase64();
        $fasilitas = Fasilitas::all();

        return view('adminPage.crudFasilitas', [
            'fasilitas' => $fasilitas,
            'user' => $user,
            'avatar' => $avatar,
        ]);
    }

    public function create(Request $request)
    {
        $request->validate([
            'nama_fasilitas' => 'required',
            'deskripsi_fasilitas' => 'required',
            'foto_fasilitas' => 'required|image|max:2048',
        ], [
            'nama_fasilitas.required' => 'Harus menambahkan nama fasilitas.',
            'deskripsi_fasilitas.required' => 'Harus menambahkan deskripsi fasilitas.',
            'foto_fasilitas.required' => 'Harus menambahkan foto fasilitas.',
            'foto_fasilitas.image' => 'Foto fasilitas harus berupa gambar bukan video.',
            'foto_fasilitas.max' => 'Ukuran foto fasilitas tidak boleh lebih dari 2MB.',
        ]);

        $path = null;
        if ($request->hasFile('foto_fasilitas')) {
            $path = $request->file('foto_fasilitas')->store('fasilitas_images', 'public');
        }

        Fasilitas::create([
            'nama_fasilitas' => $request->nama_fasilitas,
            'deskripsi_fasilitas' => $request->deskripsi_fasilitas,
            'foto_fasilitas' => $path,
        ]);

        return redirect()->route('adminPage.crudFasilitas')->with('success', 'Fasilitas berhasil ditambahkan');
    }

    public function delete($id)
    {
        $fasilitas = Fasilitas::findOrFail($id);

        // Delete the image from storage if it exists
        if ($fasilitas->foto_fasilitas) {
            Storage::disk('public')->delete($fasilitas->foto_fasilitas);
        }

        // Delete the fasilitas
        $fasilitas->delete();

        return redirect()->route('adminPage.crudFasilitas')->with('success', 'Fasilitas berhasil dihapus');
    }
}
