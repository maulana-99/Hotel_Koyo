<?php

namespace App\Http\Controllers;

use App\Models\Kamar;
use App\Models\Reservasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Laravolt\Avatar\Facade as Avatar;

class ReservasiController extends Controller
{
    public function index()
    {
        // Mengambil semua data kamar
        $kamar = Kamar::all();

        // Memeriksa apakah ada pengguna yang sedang terautentikasi
        if ($user = auth()->user()) {
            // Membuat avatar dari nama pengguna dan mengonversinya ke base64
            $avatar = Avatar::create($user->name)->toBase64();

            // Mengembalikan tampilan 'reservasi.index' dengan data pengguna, avatar, dan kamar
            return view('reservasi.index', compact('user', 'avatar', 'kamar'));
        }

        // Mengembalikan tampilan 'reservasi.index' dengan data kamar saja
        return view('reservasi.index', compact('kamar'));
    }

    public function store(Request $request)
    {
        // Memvalidasi data yang diterima dengan aturan yang telah ditentukan
        $request->validate([
            'kamar_id' => 'required|exists:kamar,id', // ID kamar wajib diisi dan harus ada di tabel 'kamar'
            'quantity' => 'required|integer|min:1', // Jumlah wajib diisi, harus berupa integer, dan minimal 1
            'check_in' => 'required|date|after_or_equal:today', // Tanggal check-in wajib diisi dan harus sama dengan atau setelah hari ini
            'check_out' => 'required|date|after:check_in', // Tanggal check-out wajib diisi dan harus setelah tanggal check-in
            'nama_depan' => 'required|string', // Nama depan wajib diisi dan harus berupa string
            'nama_belakang' => 'required|string', // Nama belakang wajib diisi dan harus berupa string
            'alamat' => 'required|string', // Alamat wajib diisi dan harus berupa string
            'tlp' => 'required', // Nomor telepon wajib diisi (tanpa validasi khusus)
        ]);

        // Mendapatkan informasi kamar berdasarkan kamar_id yang diberikan
        $kamar = Kamar::findOrFail($request->kamar_id);

        // Memastikan bahwa jumlah yang diminta tidak melebihi jumlah kamar yang tersedia
        if ($request->quantity > $kamar->quantity) {
            return redirect()->back()->with('error', 'Requested quantity exceeds available quantity.'); // Mengarahkan kembali dengan pesan kesalahan jika jumlah melebihi yang tersedia
        }

        // Membuat reservasi baru dengan data yang sudah divalidasi
        $reservasi = Reservasi::create([
            'user_id' => Auth::id(), // Mendapatkan ID pengguna yang sedang terautentikasi
            'kamar_id' => $request->kamar_id, // ID kamar
            'quantity' => $request->quantity, // Jumlah kamar
            'check_in' => $request->check_in, // Tanggal check-in
            'check_out' => $request->check_out, // Tanggal check-out
            'nama_depan' => $request->nama_depan, // Nama depan
            'nama_belakang' => $request->nama_belakang, // Nama belakang
            'alamat' => $request->alamat, // Alamat
            'tlp' => $request->tlp, // Nomor telepon
        ]);

        // Mengurangi jumlah kamar yang tersedia sesuai dengan jumlah yang dipesan
        $kamar->quantity -= $request->quantity;
        $kamar->save(); // Menyimpan informasi kamar yang telah diperbarui

        // Mengarahkan ke route 'pesananReservasi' dengan pesan sukses
        return redirect()->route('reservasi.pesananReservasi')->with('success', 'Reservation created successfully.');
    }

    public function show()
    {
        // Mendapatkan informasi pengguna yang sedang terautentikasi
        $user = Auth::user(); // Mendapatkan informasi pengguna yang sedang terautentikasi

        // Membuat avatar dari nama pengguna dan mengonversinya ke base64
        $avatar = Avatar::create($user->name)->toBase64(); // Membuat avatar berdasarkan nama pengguna dan mengonversinya ke format base64

        // Memeriksa apakah pengguna terautentikasi
        if (!$user) {
            return redirect()->route('login'); // Jika tidak, redirect ke halaman login
        }

        // Mengambil data reservasi yang dimiliki oleh pengguna
        $reservasi = DB::table('reservasis') // Membuat query untuk mengambil data reservasi dari tabel reservasis
            ->join('kamar', 'reservasis.kamar_id', '=', 'kamar.id') // Melakukan join antara tabel reservasis dan kamar berdasarkan kamar_id
            ->where('reservasis.user_id', $user->id) // Mengambil data reservasi yang memiliki user_id sama dengan ID pengguna yang terautentikasi
            ->select('reservasis.*', 'kamar.tipe_kamar', 'kamar.harga', 'kamar.nama_kamar') // Memilih kolom yang akan ditampilkan dalam hasil query
            ->get(); // Menjalankan query dan mendapatkan hasilnya

        // Mengembalikan tampilan 'reservasi.pesananReservasi' dengan data reservasi, pengguna, dan avatar
        return view('reservasi.pesananReservasi', [
            'reservasi' => $reservasi,
            'user' => $user,
            'avatar' => $avatar,
        ]);
    }

}
