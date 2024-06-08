<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FasilitasDashboard;
use App\Http\Controllers\ManagementFasilitasController;
use App\Http\Controllers\ManagementKamarController;
use App\Http\Controllers\ManagementResepsionisController;
use App\Http\Controllers\ResepsionisController;
use App\Http\Controllers\ReservasiController;
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

Route::get('/fasilitas', [FasilitasDashboard::class, 'index']);

Route::get('/logout', [AuthController::class, 'logout']);

Route::get('/deskripsi_kamar', function () {
    return view('deskripsi_kamar');
});

Route::resource('/reservasi', ReservasiController::class);


Route::get('/404-not-found', function () {
    return view('peringatan');
});//----> Hanya user yang ingin memasuki page resepsionis dan admin dan akan di tampilkan ini

Route::get('/admin', function () {
    return view('adminPage.admin.admin');
});


Route::get('/resepsionis', [DashboardController::class, 'indexResepsionis']);
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

// user yang sudah login dan bisa meng akses halaman ini dengan role admin
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
    // ///////////////////////// --> END CRUD FASILITAS

    // ///////////////////////// --> CRUD KAMAR
    Route::resource('/admin/kamar', ManagementKamarController::class);
    // ///////////////////////// --> END CRUD KAMAR
});

// user yang sudah login dan bisa meng akses halaman ini dengan role Resepsionis
Route::middleware('userAkses:resepsionis')->group(function () {
    Route::resource('/resepsionis', ResepsionisController::class);
    Route::post('/resepsionis/check-in/{id}', [ResepsionisController::class, 'checkIn'])->name('resepsionis.checkin');
    Route::post('/resepsionis/check-out/{id}', [ResepsionisController::class, 'checkOut'])->name('resepsionis.checkout');
});

// user yang sudah login dan bisa meng akses halaman ini dengan role tamu
Route::middleware('userAkses:tamu')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index']);
});
