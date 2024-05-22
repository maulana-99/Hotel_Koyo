<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ManagementResepsionisController;
use Illuminate\Support\Facades\Route;

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

Route::get('/register', function () {
    return view('register');
});

Route::get('/', [DashboardController::class, 'index']);
Route::get('/', [DashboardController::class, 'show'])->middleware('auth');


Route::get('/deskripsi_kamar', function () {
    return view('deskripsi_kamar');
});
Route::get('/tamu_login', function () {
    return view('tamu_login');
});

Route::get('/tamu_reservasi', function () {
    return view('tamu_reservasi');
});

Route::get('/peringatan', function () {
    return view('peringatan');
});

Route::get('/backoffice', function () {
    return view('backoffice');
});

// menjadi mode tamu dan hanya bisa melihat saja
Route::middleware(['guest'])->group(function () {
    Route::get('/login', [AuthController::class, 'loginPage'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);

    Route::get('/register', [AuthController::class, 'registerPage'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
});

Route::get('/home', function () {
    return redirect('/');
});

// user yang sudah login dan bisa meng akses halaman ini berdasarkan role
Route::middleware('userAkses:admin')->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->middleware('userAkses:admin');
    Route::get('/logout', [AuthController::class, 'logout']);
    Route::get('/admin/resepsionis', [ManagementResepsionisController::class, 'index']);
});

Route::middleware('userAkses:resepsionis')->group(function () {
    Route::get('/resepsionis', [AdminController::class, 'resepsionis'])->middleware('userAkses:resepsionis');
    Route::get('/logout', [AuthController::class, 'logout']);
});

Route::middleware('userAkses:tamu')->group(function () {
    Route::get('/tamu', [AdminController::class, 'tamu']);
    Route::get('/logout', [AuthController::class, 'logout']);
});

Route::get('/profil', function () {return view('profil'); })->middleware('auth')->name('profil');
Route::get('/profil', [AuthController::class, 'show'])->middleware('auth');
