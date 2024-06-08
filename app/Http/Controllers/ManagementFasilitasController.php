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
        // Mendapatkan data pengguna yang sedang login.
        $user = Auth::user();

        // Membuat avatar berdasarkan nama pengguna dan mengubahnya ke format base64.
        $avatar = Avatar::create($user->name)->toBase64();

        // Mengambil semua data fasilitas dari database.
        $fasilitas = Fasilitas::all();

        // Mengembalikan view 'adminPage.fasilitas.index' dengan data fasilitas, pengguna, dan avatar.
        return view('adminPage.fasilitas.index', [
            'fasilitas' => $fasilitas,
            'user' => $user,
            'avatar' => $avatar,
        ]);
    }

    public function store(Request $request)
    {
        // Validasi input request
        $request->validate([
            'nama_fasilitas' => 'required',  // Nama fasilitas harus diisi
            'deskripsi_fasilitas' => 'required',  // Deskripsi fasilitas harus diisi
            'foto_fasilitas' => 'required|image|max:2048',  // Foto fasilitas harus diisi, berupa gambar, maksimal 2MB
        ], [
            'nama_fasilitas.required' => 'Harus menambahkan nama fasilitas.',  // Pesan error jika nama fasilitas tidak diisi
            'deskripsi_fasilitas.required' => 'Harus menambahkan deskripsi fasilitas.',  // Pesan error jika deskripsi fasilitas tidak diisi
            'foto_fasilitas.required' => 'Harus menambahkan foto fasilitas.',  // Pesan error jika foto fasilitas tidak diisi
            'foto_fasilitas.image' => 'Foto fasilitas harus berupa gambar bukan video.',  // Pesan error jika file bukan gambar
            'foto_fasilitas.max' => 'Ukuran foto fasilitas tidak boleh lebih dari 2MB.',  // Pesan error jika file lebih dari 2MB
        ]);

        // Menghandle upload file foto fasilitas
        if ($request->hasFile('foto_fasilitas')) {
            $imageName = time() . '.' . $request->foto_fasilitas->extension();  // Membuat nama file unik
            $request->foto_fasilitas->move(public_path('images'), $imageName);  // Memindahkan file ke direktori public/image
        } else {
            $imageName = null;  // Jika tidak ada file yang diupload
        }

        // Membuat record fasilitas baru di database
        Fasilitas::create([
            'nama_fasilitas' => $request->nama_fasilitas,  // Mengambil nama fasilitas dari input request
            'deskripsi_fasilitas' => $request->deskripsi_fasilitas,  // Mengambil deskripsi fasilitas dari input request
            'foto_fasilitas' => $imageName,  // Menyimpan nama file foto fasilitas
        ]);

        // Redirect ke halaman CRUD fasilitas dengan pesan sukses
        return redirect()->route('adminPage.crudFasilitas')->with('success', 'Fasilitas berhasil ditambahkan');
    }

    public function update(Request $request, $id)
    {
        // Mencari fasilitas berdasarkan ID
        $fasilitas = Fasilitas::findOrFail($id);

        // Mengupdate nama dan deskripsi fasilitas
        $fasilitas->nama_fasilitas = $request->input('nama_fasilitas');
        $fasilitas->deskripsi_fasilitas = $request->input('deskripsi_fasilitas');

        // Menghandle upload file foto fasilitas
        if ($request->hasFile('foto_fasilitas')) {
            $file = $request->file('foto_fasilitas');
            $filename = time() . '_' . $file->getClientOriginalName();  // Membuat nama file unik
            $file->move(public_path('images'), $filename);  // Memindahkan file ke direktori public/images

            if ($fasilitas->foto_fasilitas !== $filename) {
                $imagePath = public_path('images/' . $fasilitas->foto_fasilitas);
                if (file_exists($imagePath)) {
                    unlink($imagePath);  // Menghapus file foto lama
                }
            }

            // Menyimpan nama file foto baru
            $fasilitas->foto_fasilitas = $filename;
        }

        // Menyimpan perubahan pada fasilitas
        $fasilitas->save();

        // Redirect ke halaman CRUD fasilitas dengan pesan sukses
        return redirect()->route('adminPage.crudFasilitas')->with('success', 'Fasilitas berhasil diperbarui');
    }


    public function destroy($id)
    {
        // Mencari data fasilitas berdasarkan ID yang diberikan
        $fasilitas = Fasilitas::findOrFail($id); // Mencari data fasilitas berdasarkan ID yang diberikan

        // Memeriksa apakah fasilitas ditemukan
        if ($fasilitas) {
            // Memeriksa apakah ada foto fasilitas yang terkait
            if ($fasilitas->foto_fasilitas) {
                // Menghapus foto fasilitas dari penyimpanan
                Storage::disk('public')->delete($fasilitas->foto_fasilitas); // Menghapus foto fasilitas dari penyimpanan publik
            }

            // Menghapus data fasilitas dari database
            $fasilitas->delete(); // Menghapus data fasilitas dari database
        }

        // Redirect ke halaman CRUD fasilitas dengan pesan sukses
        return redirect()->route('adminPage.crudFasilitas')->with('success', 'Fasilitas berhasil dihapus'); // Mengalihkan pengguna kembali ke halaman CRUD fasilitas dengan pesan sukses
    }
}
