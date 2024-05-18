<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\SesiController;
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

Route::get('/login_tamu', function () {
    return view('login_tamu');
});

Route::get('/dasboard_guest', function () {
    return view('dasboard_guest');
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

// menjadi mode tamu dan hanya bisa melihat saja
Route::middleware(['guest'])->group(function () {

    Route::get('/', [SesiController::class, 'index'])->name('login');
    Route::post('/', [SesiController::class, 'login']);

});

Route::get('/home', function () {
    return redirect('/admin');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->middleware('userAkses:admin');
    Route::get('/resepsionis', [AdminController::class, 'resepsionis'])->middleware('userAkses:resepsionis');
    Route::get('/tamu', [AdminController::class, 'tamu'])->middleware('userAkses:tamu');
    Route::get('/logout', [SesiController::class, 'logout']);

});

