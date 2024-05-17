<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
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

// menjadi mode tamu dan hanya bisa melihat saja
Route::middleware(['guest'])->group(function () {

    Route::get('/login', [AuthController::class, 'loginPage'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);

    Route::get('/register', [AuthController::class, 'registerPage'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);

});

// Route::get('/home', function () {
//     return redirect('/admin');
// });

// user yang sudah login dan bisa meng akses halaman ini berdasarkan role
Route::middleware(['auth'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->middleware('userAkses:admin');
    Route::get('/resepsionis', [AdminController::class, 'resepsionis'])->middleware('userAkses:resepsionis');
    Route::get('/tamu', [AdminController::class, 'tamu'])->middleware('userAkses:tamu');
    Route::get('/logout', [AuthController::class, 'logout']);
});