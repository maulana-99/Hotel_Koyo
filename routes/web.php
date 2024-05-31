<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ManagementFasilitasController;
use App\Http\Controllers\ManagementKamarController;
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

Route::get('/', [DashboardController::class, 'index']);

Route::get('/fasilitas', [DashboardController::class, 'indexFasilitas']);

Route::get('/logout', [AuthController::class, 'logout']);
// ----------------------------------------------|
Route::get('/deskripsi_kamar', function () {
    return view('deskripsi_kamar');
});

Route::get('/tamu_reservasi', [DashboardController::class, 'indexReservasi']);

Route::get('/404-not-found', function () {
    return view('peringatan');
});

Route::get('/admin', function () {
    return view('adminPage.admin.admin');
});

// menjadi mode tamu dan hanya bisa melihat saja
Route::middleware(['guest'])->group(function () {
    Route::get('/login', [AuthController::class, 'loginPage'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);

    Route::get('/register', [AuthController::class, 'registerPage'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
    Route::get('/', [DashboardController::class, 'avatarDs']);
});

Route::get('/home', function () {
    return redirect('/');
});

// user yang sudah login dan bisa meng akses halaman ini berdasarkan role
Route::middleware('userAkses:admin')->group(function () {
    // ///////////////////////// --> CRUD AKUN RESEPSIONIS
    Route::get('/admin/resepsionis', [ManagementResepsionisController::class, 'index'])->name('adminPage.backoffice');
    Route::post('/admin/resepsionis', [ManagementResepsionisController::class, 'create'])->name('createResepsionis');
    Route::post('/admin/resepsionis{id}', [ManagementResepsionisController::class, 'deactivate'])->name('deactivateResepsionis');
    Route::get('/admin', [DashboardController::class, 'indexAdmin']);
    // ///////////////////////// --> END CRUD AKUN RESEPSIONIS

    // ///////////////////////// --> CRUD FASILITAS
    Route::get('/admin/fasilitas', [ManagementFasilitasController::class, 'index'])->name('adminPage.crudFasilitas');
    Route::post('/admin/fasilitas', [ManagementFasilitasController::class, 'store'])->name('fasilitas.store');
    Route::delete('/admin/fasilitas/{id}', [ManagementFasilitasController::class, 'destroy'])->name('fasilitas.destroy');
    Route::put('/admin/fasilitas/{id}', [ManagementFasilitasController::class, 'update'])->name('fasilitas.update');
    // Route::resource('/admin/fasilitas', ManagementFasilitasController::class);

    // ///////////////////////// --> END CRUD FASILITAS

    // ///////////////////////// --> CRUD KAMAR
    Route::resource('/admin/kamar', ManagementKamarController::class);
    // ///////////////////////// --> END CRUD KAMAR
});

// user yang sudah login dan bisa meng akses halaman ini berdasarkan role
Route::middleware('userAkses:resepsionis')->group(function () {
    // Route::get('/resepsionis', [AdminController::class, 'resepsionis']); ---> UBAH MENJADI URL RESEPSIONIS
});

// user yang sudah login dan bisa meng akses halaman ini berdasarkan role
Route::middleware('userAkses:tamu')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index']);
});
