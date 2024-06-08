<?php

namespace App\Http\Controllers;

use App\Models\Kamar;
use App\Models\Reservasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravolt\Avatar\Facade as Avatar;

class ResepsionisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Mendapatkan informasi pengguna yang sedang terautentikasi
        $user = Auth::user(); // Mendapatkan informasi pengguna yang sedang terautentikasi
        // Membuat avatar dari nama pengguna dan mengonversinya ke base64
        $avatar = Avatar::create($user->name)->toBase64(); // Membuat avatar berdasarkan nama pengguna dan mengonversinya ke format base64

        // Menginisialisasi query untuk mendapatkan data reservasi dengan beberapa join dan select
        $query = Reservasi::query()
            ->join('kamar', 'reservasis.kamar_id', '=', 'kamar.id')
            ->select('reservasis.*', 'kamar.harga', 'kamar.tipe_kamar', 'kamar.jenis_kasur', 'kamar.kapasitas', 'kamar.nama_kamar');

        // Memeriksa apakah terdapat pencarian berdasarkan tanggal
        if ($request->has('src-date')) {
            $date = $request->input('src-date');
            $query->whereDate('check_in', $date)
                ->orWhereDate('check_out', $date);
        }

        // Memeriksa apakah terdapat pencarian berdasarkan nama depan
        if ($request->has('nama_depan')) {
            $namaDepan = $request->input('nama_depan');
            if (!empty($namaDepan)) {
                $query->where('nama_depan', 'like', '%' . $namaDepan . '%');
            }
        }

        // Memeriksa apakah terdapat pencarian berdasarkan nama belakang
        if ($request->has('nama_belakang')) {
            $namaBelakang = $request->input('nama_belakang');
            if (!empty($namaBelakang)) {
                $query->where('nama_belakang', 'like', '%' . $namaBelakang . '%');
            }
        }

        // Memeriksa apakah pengguna sudah terautentikasi
        if (!$user) {
            return redirect()->route('login'); // Jika tidak, redirect ke halaman login
        }

        // Menjalankan query dan mendapatkan hasilnya
        $reservasi = $query->get(); // Menjalankan query untuk mendapatkan data reservasi berdasarkan kondisi yang telah diberikan

        // Mengembalikan tampilan 'resepsionis.index' dengan data reservasi, pengguna, dan avatar
        return view('resepsionis.index', [
            'reservasi' => $reservasi,
            'user' => $user,
            'avatar' => $avatar,
        ]);
    }

    public function checkIn($id)
    {
        // Mencari data reservasi berdasarkan ID yang diberikan
        $reservasi = Reservasi::find($id); // Mencari data reservasi berdasarkan ID yang diberikan

        // Memeriksa apakah reservasi ditemukan
        if ($reservasi) {
            $reservasi->status = '2'; // Mengupdate status reservasi menjadi 'Sudah check in'
            $reservasi->save(); // Menyimpan perubahan status ke dalam database

            // Redirect kembali ke halaman sebelumnya dengan pesan sukses
            return redirect()->back()->with('success', 'Check-in berhasil.');
        }

        // Redirect kembali ke halaman sebelumnya dengan pesan error jika reservasi tidak ditemukan
        return redirect()->back()->with('error', 'Reservasi tidak ditemukan.');
    }


    public function checkout($id)
    {
        // Mendapatkan data reservasi berdasarkan ID
        $reservasi = Reservasi::find($id); // Mencari data reservasi berdasarkan ID yang diberikan
    
        // Memeriksa apakah reservasi ditemukan
        if ($reservasi) {
            // Mengubah status reservasi menjadi '0' (check out)
            $reservasi->status = '0';
    
            // Mendapatkan data kamar yang sesuai dengan reservasi
            $kamar = Kamar::where('id', $reservasi->kamar_id)->first(); // Mencari data kamar yang sesuai dengan ID kamar yang terdapat pada reservasi
    
            // Memeriksa apakah kamar ditemukan
            if ($kamar) {
                // Menambahkan kembali jumlah kamar yang tersedia dengan jumlah kamar yang telah dipesan saat reservasi
                $kamar->quantity += $reservasi->quantity; // Menambahkan kembali quantity kamar dengan quantity reservasi
                $kamar->save(); // Menyimpan perubahan jumlah kamar ke dalam database
            }
    
            // Menyimpan perubahan status reservasi ke dalam database
            $reservasi->save(); // Menyimpan perubahan status reservasi ke dalam database
        }
    
        // Redirect kembali ke halaman sebelumnya dengan pesan sukses
        return redirect()->back()->with('success', 'Check out berhasil!'); // Mengalihkan pengguna kembali ke halaman sebelumnya dengan pesan sukses
    }
    


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
