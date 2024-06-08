<?php

namespace App\Http\Controllers;

use App\Models\Kamar;
use Illuminate\Http\Request;
use Laravolt\Avatar\Facade as Avatar;

class ManagementKamarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Mengambil semua data dari model Kamar
        $kamar = Kamar::all(); // Mengambil semua entri dari tabel 'kamar' menggunakan model Kamar

        // Memeriksa apakah pengguna sedang terautentikasi
        if ($user = auth()->user()) {
            // Membuat avatar dari nama pengguna dan mengonversinya ke base64
            $avatar = Avatar::create($user->name)->toBase64(); // Membuat avatar berdasarkan nama pengguna dan mengonversinya ke format base64

            // Mengembalikan tampilan 'adminPage.kamar.index' dengan data kamar, pengguna, dan avatar
            return view('adminPage.kamar.index', compact('kamar', 'user', 'avatar')); // Mengembalikan tampilan 'adminPage.kamar.index' dan mengirimkan data 'kamar', 'user', dan 'avatar' ke tampilan tersebut
        }

        // Mengembalikan tampilan 'adminPage.kamar.index' tanpa data pengguna dan avatar jika pengguna tidak terautentikasi
        return view('adminPage.kamar.index', compact('kamar')); // Mengembalikan tampilan 'adminPage.kamar.index' dengan data 'kamar'
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
        // Memvalidasi data yang diterima
        $validatedData = $request->validate([
            'nama_kamar' => 'required|string|max:255', // Nama kamar harus diisi, berupa string, dan maksimal 255 karakter
            'tipe_kamar' => 'required|in:regular,delux', // Tipe kamar harus diisi dan bernilai 'regular' atau 'delux'
            'deskripsi' => 'required|string', // Deskripsi kamar harus diisi dan berupa string
            'jenis_kasur' => 'required|in:twin,king', // Jenis kasur harus diisi dan bernilai 'twin' atau 'king'
            'kapasitas' => 'required|in:1,2', // Kapasitas kamar harus diisi dan bernilai 1 atau 2
            'harga' => 'required|integer', // Harga kamar harus diisi dan berupa bilangan bulat
            'quantity' => 'required|integer', // Quantity kamar harus diisi dan berupa bilangan bulat
            'foto_kamar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048', // Foto kamar bisa kosong, jika diisi harus berupa file gambar dengan format jpeg, png, atau jpg, dengan ukuran maksimal 2048 KB
        ]);

        // Menghandle upload gambar
        if ($request->hasFile('foto_kamar')) {
            $imageName = time() . '.' . $request->foto_kamar->extension(); // Nama file diubah menjadi timestamp untuk menghindari nama yang sama
            $request->foto_kamar->move(public_path('images'), $imageName); // Memindahkan file gambar ke direktori yang ditentukan
        } else {
            $imageName = null; // Mengatur menjadi null jika tidak ada gambar yang diunggah
        }

        // Membuat data baru untuk Kamar
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

        // Redirect dengan pesan sukses
        return redirect()->route('kamar.index')->with('success', 'Kamar sukses ditambah.');
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
        dd($id);
        $kamar = Kamar::findOrFail($id);

        return view('kamar.index', compact('kamar'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Mengambil data kamar berdasarkan ID yang diberikan dalam request
        $kamar = Kamar::findOrFail($request->input('id')); // Mencari data kamar berdasarkan ID yang diberikan dalam request

        // Mengupdate atribut-atribut kamar dengan nilai baru dari request
        $kamar->nama_kamar = $request->input('nama_kamar'); // Mengupdate nama kamar dengan nilai baru dari request
        $kamar->tipe_kamar = $request->input('tipe_kamar'); // Mengupdate tipe kamar dengan nilai baru dari request
        $kamar->deskripsi = $request->input('deskripsi'); // Mengupdate deskripsi kamar dengan nilai baru dari request
        $kamar->kapasitas = $request->input('kapasitas'); // Mengupdate kapasitas kamar dengan nilai baru dari request
        $kamar->jenis_kasur = $request->input('jenis_kasur'); // Mengupdate jenis kasur kamar dengan nilai baru dari request
        $kamar->quantity = $request->input('quantity'); // Mengupdate quantity kamar dengan nilai baru dari request
        $kamar->harga = $request->input('harga'); // Mengupdate harga kamar dengan nilai baru dari request

        // Menghandle update foto kamar jika ada file yang diupload dalam request
        if ($request->hasFile('foto_kamar')) {
            $file = $request->file('foto_kamar'); // Mengambil file gambar yang diupload dari request
            $filename = time() . '_' . $file->getClientOriginalName(); // Membuat nama file baru dengan timestamp untuk menghindari duplikasi nama
            $file->move(public_path('images'), $filename); // Memindahkan file gambar ke direktori yang ditentukan

            // Menghapus foto kamar lama jika ada dan mengupdate dengan yang baru
            if ($kamar->foto_kamar !== $filename) {
                $imagePath = public_path('images/' . $kamar->foto_kamar); // Mengonstruksi path foto kamar lama
                if (file_exists($imagePath)) { // Memeriksa apakah foto kamar lama ada
                    unlink($imagePath); // Menghapus foto kamar lama
                }
            }
            $kamar->foto_kamar = $filename; // Mengupdate atribut foto_kamar kamar dengan nama file baru
        }

        // Menyimpan perubahan ke dalam database
        $kamar->save(); // Menyimpan perubahan data kamar ke dalam database

        // Redirect ke halaman index kamar dengan pesan sukses
        return redirect()->route('kamar.index')->with('success', 'Kamar updated successfully'); // Mengalihkan pengguna kembali ke halaman index kamar dengan pesan sukses
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Mengambil data kamar berdasarkan ID yang diberikan
        $kamar = Kamar::findOrFail($id); // Mencari data kamar berdasarkan ID yang diberikan

        // Menghapus foto kamar jika ada
        if ($kamar->foto_kamar) { // Memeriksa apakah foto kamar ada
            $imagePath = public_path('images/' . $kamar->foto_kamar); // Mengonstruksi path foto kamar
            if (file_exists($imagePath)) { // Memeriksa apakah foto kamar ada di direktori
                unlink($imagePath); // Menghapus foto kamar dari direktori
            }
        }

        // Menghapus data kamar dari database
        $kamar->delete(); // Menghapus data kamar dari database

        // Redirect ke halaman index kamar dengan pesan sukses
        return redirect()->route('kamar.index')->with('success', 'Kamar sukses dihapus'); // Mengalihkan pengguna kembali ke halaman index kamar dengan pesan sukses
    }

}
