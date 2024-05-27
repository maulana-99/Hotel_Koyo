<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ManagementResepsionisController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KamarController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/fasilitas', function () {
    return view('fasilitas');
});

Route::get('/logout', [AuthController::class, 'logout']);
// ----------------------------------------------|
// Route::get('/deskripsi_kamar', function () {  |
//     return view('deskripsi_kamar');           |
// });                                           |
//                                               |--> BUKA AJA KALAU LAGI BUTUH
// Route::get('/tamu_reservasi', function () {   |
//     return view('tamu_reservasi');            |
// });                                           |
// ----------------------------------------------|

Route::get('/404-not-found', function () {
    return view('peringatan');
});

// menjadi mode tamu dan hanya bisa melihat saja
Route::middleware(['guest'])->group(function () {
    Route::get('/login', [AuthController::class, 'loginPage'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);

    Route::get('/register', [AuthController::class, 'registerPage'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
    Route::get('/', [DashboardController::class, 'index']);

});

Route::get('/home', function () {
    return redirect('/');
});

// user yang sudah login dan bisa meng akses halaman ini berdasarkan role
Route::middleware('userAkses:admin')->group(function () {
    Route::get('/admin', [ManagementResepsionisController::class, 'index']);
    // Route::post('/admin', [ManagementResepsionisController::class, 'search']);
    // Route::get('/admin', [ManagementResepsionisController::class, 'avatar']);

});

// user yang sudah login dan bisa meng akses halaman ini berdasarkan role
Route::middleware('userAkses:resepsionis')->group(function () {
    // Route::get('/resepsionis', [AdminController::class, 'resepsionis']); ---> UBAH MENJADI URL RESEPSIONIS
});

// user yang sudah login dan bisa meng akses halaman ini berdasarkan role
Route::middleware('userAkses:tamu')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index']);

});
// Route::get('/create', function () {
//     return view('kamar.create');
// });

// Route::resource('kamar', KamarController::class,);
Route::resource('kamar', KamarController::class);
Route::get('/kamar',[KamarController::class,'index'])->name('kamar.index');
Route::get('/kamar/create', [KamarController::class, 'create'])->name('kamar.create');
Route::post('/kamar', [KamarController::class, 'store'])->name('kamar.store');
Route::delete('/kamar/{id}', [KamarController::class, 'destroy'])->name('kamar.destroy');
